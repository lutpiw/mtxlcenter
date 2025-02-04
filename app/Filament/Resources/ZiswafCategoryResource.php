<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZiswafCategoryResource\Pages;
use App\Filament\Resources\ZiswafCategoryResource\RelationManagers;
use App\Models\BankAccount;
use App\Models\ZiswafCategory;
use App\Traits\FilamentTableColumns;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ZiswafCategoryResource extends Resource
{

    use FilamentTableColumns;

    protected static ?string $model = ZiswafCategory::class;

    protected static ?string $navigationGroup = 'ZISWAF';

    protected static ?string $label = 'Categories';

    protected static ?string $navigationLabel = 'Categories';

    protected static ?int $navigationSort = 20;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('bank_account_id')
                    ->required()
                    ->label('Bank Account')
                    ->placeholder('Select a Bank Account')
                    ->options(\App\Models\BankAccount::with('bank')
                        ->get()
                        ->mapWithKeys(fn ($item) => [
                            $item->id => ($item->bank?->name ?? 'No Department') . ' - ' . $item->account_number . ' (a.n. ' . $item->account_name . ')',
                        ])
                    )
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(array_merge([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bankAccount.account_number')
                    ->label('Account Number')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bankAccount.account_name')
                    ->label('Account Name')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('bankAccount.bank.name')
                    ->label('Bank Name')
                    ->sortable(),
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
            'index' => Pages\ListZiswafCategories::route('/'),
            'create' => Pages\CreateZiswafCategory::route('/create'),
            'edit' => Pages\EditZiswafCategory::route('/{record}/edit'),
        ];
    }
}
