<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZiswafCampaignResource\Pages;
use App\Filament\Resources\ZiswafCampaignResource\RelationManagers;
use App\Models\ZiswafCampaign;
use App\Traits\FilamentTableColumns;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ZiswafCampaignResource extends Resource
{

    use FilamentTableColumns;

    protected static ?string $model = ZiswafCampaign::class;

    protected static ?string $navigationGroup = 'ZISWAF';

    protected static ?string $label = 'Campaigns';

    protected static ?string $navigationLabel = 'Campaigns';

    protected static ?int $navigationSort = 22;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('is_open')
                    ->label('Open?')
                    ->default(true)
                    ->onColor('success')
                    ->offColor('danger')
                    ->helperText('Toggle to activate or deactivate this campaign')
                    ->required(),
                Fieldset::make('campaign')
                    ->label('Campaign Detail')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Select::make('ziswaf_program_id')
                            ->label('Program')
                            ->placeholder('Select a Program')
                            ->relationship('ziswafProgram', 'name')
                            ->reactive()
                            ->required(),
                        Select::make('ziswaf_category_id')
                            ->label('Category')
                            ->placeholder('Select a Category')
                            ->options(function (callable $get) {
                                $modelZiswafProgram = $get('ziswaf_program_id');
                                if (!$modelZiswafProgram) {
                                    return [];
                                }
                                return \App\Models\ZiswafProgram::find($modelZiswafProgram)
                                    ?->ziswafCategories()
                                    ->pluck('name', 'ziswaf_category_id')
                                    ->toArray() ?? [];
                            })
                            ->reactive()
                            ->required(),
                        TextInput::make('cost')
                            ->numeric()
                            ->prefix('Rp'),
                        // TextInput::make('transfer_code')
                        //     ->numeric()
                        //     ->maxLength(20),
                        DatePicker::make('close_at'),
                        RichEditor::make('about')
                            ->required()
                            ->columnSpanFull(),
                        ])->columns(3),
                Fieldset::make('photo')
                ->label('Image')
                ->schema([
                    FileUpload::make('thumbnail')
                        ->label('Thumbnail')
                        ->disk('public')
                        ->directory('upload/campaign/thumbnails')
                        ->visibility('private')
                        ->image()
                        ->maxSize(2048)
                        ->helperText('Max size is 2 MB')
                        ->required(),
                    Repeater::make('photo')
                        ->label('Preview Photos')
                        ->relationship(name: 'ziswafCampaignPhotos')
                        ->schema([
                            FileUpload::make('photo')
                            ->disk('public')
                            ->directory('upload/campaign/photos')
                            ->visibility('private')
                            ->image()
                            ->maxSize(2048)
                            ->helperText('Max size is 2 MB')
                            ->required()
                        ])->columns(1)
                ]),
                Toggle::make('is_trending')
                    ->label('Trending?')
                    ->default(false)
                    ->onColor('success')
                    ->offColor('danger'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(array_merge([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ziswafProgram.name')
                    ->label('Program')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ziswafCategory.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cost')
                    ->money('idr')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_open')
                    ->boolean(),
                Tables\Columns\TextColumn::make('close_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('transfer_code')
                    ->toggleable(isToggledHiddenByDefault: true),

            ],
            self::auditColumns()
            ))
            ->filters([
                SelectFilter::make('ziswaf_program_id')
                    ->label('Filter by Program')
                    ->relationship('ziswafProgram', 'name'),
                SelectFilter::make('ziswaf_category_id')
                    ->label('Filter by Category')
                    ->relationship('ziswafCategory', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('toggleActive')
                    ->label(fn ($record) => $record->is_open ? 'Close' : 'Open')
                    ->action(function ($record) {
                        $record->update(['is_open' => !$record->is_open]);
                    })
                    ->color(fn ($record) => $record->is_open ? 'danger' : 'success')
                    ->icon(fn ($record) => $record->is_open ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->requiresConfirmation(fn ($record) => $record->is_open ? 'Are you sure you want to deactivate this item?' : 'Are you sure you want to activate this item?')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListZiswafCampaigns::route('/'),
            'create' => Pages\CreateZiswafCampaign::route('/create'),
            'edit' => Pages\EditZiswafCampaign::route('/{record}/edit'),
        ];
    }
}
