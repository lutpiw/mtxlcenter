<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BankAccountResource\Pages;
use App\Models\BankAccount;
use App\Traits\FilamentTableColumns;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BankAccountResource extends Resource
{
    use FilamentTableColumns;

    protected static ?string $model = BankAccount::class;

    protected static ?string $navigationGroup = 'Finance';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('name')
                    ->required()
                    ->label('Bank Name')
                    ->placeholder('Select Bank')
                    ->relationship('bank', 'name'),
                Forms\Components\TextInput::make('account_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('account_number')
                    ->required()
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\Textarea::make('qris')
                    ->label('QRIS Text')
                    ->columnSpanFull(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(array_merge([
                Tables\Columns\TextColumn::make('bank.name')
                    ->label('Bank')
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('qris')
                    ->label('QRIS')
                    ->getStateUsing(fn ($record) => !empty($record->qris) ? 'Available' : 'Not Available')
                    ->color(fn ($record) => empty($record->qris) ? 'danger' : 'success')
                    ->icon(fn ($record) => empty($record->qris) ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle'),
                Tables\Columns\ImageColumn::make('bank.logo')
                    ->label('Logo'),
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
            'index' => Pages\ListBankAccounts::route('/'),
            'create' => Pages\CreateBankAccount::route('/create'),
            'edit' => Pages\EditBankAccount::route('/{record}/edit'),
        ];
    }
}
