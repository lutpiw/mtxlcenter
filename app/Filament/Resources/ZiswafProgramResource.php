<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZiswafProgramResource\Pages;
use App\Filament\Resources\ZiswafProgramResource\RelationManagers;
use App\Models\ZiswafProgram;
use App\Traits\FilamentTableColumns;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ZiswafProgramResource extends Resource
{
    use FilamentTableColumns;

    protected static ?string $model = ZiswafProgram::class;

    protected static ?string $navigationGroup = 'ZISWAF';

    protected static ?string $label = 'Programs';

    protected static ?string $navigationLabel = 'Programs';

    protected static ?int $navigationSort = 21;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('ziswaf_categories_id')
                    ->label('Categories')
                    ->placeholder('Select a Group')
                    ->relationship('ziswafCategories', 'name')
                    ->multiple()
                    ->preload()
                    ->required(),
                FileUpload::make('icon')
                        ->label('Icon')
                        ->disk('public')
                        ->directory('upload/icon')
                        ->visibility('private')
                        ->image()
                        ->acceptedFileTypes(['image/png'])
                        ->maxSize(1024)
                        ->helperText('Max size is 1 MB'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(array_merge([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ziswafCategories.name')
                    ->label('Categories')
                    ->separator(', ')
                    ->searchable(),
            ],
            self::auditColumns()
            ))
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListZiswafPrograms::route('/'),
            'create' => Pages\CreateZiswafProgram::route('/create'),
            'edit' => Pages\EditZiswafProgram::route('/{record}/edit'),
        ];
    }
}
