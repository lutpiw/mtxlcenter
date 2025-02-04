<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZiswafTransactionResource\Pages;
use App\Filament\Resources\ZiswafTransactionResource\RelationManagers;
use App\Models\ZiswafTransaction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Notifications\Notification;
use Filament\Panel as FilamentPanel;
use Filament\Tables\Actions\Action as ActionsAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ZiswafTransactionResource extends Resource
{
    protected static ?string $model = ZiswafTransaction::class;

    protected static ?string $navigationGroup = 'ZISWAF';

    protected static ?string $label = 'Transactions';

    protected static ?string $navigationLabel = 'Transactions';

    protected static ?int $navigationSort = 23;

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Customer Detail')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('phone'),
                        TextEntry::make('email'),
                    ])->columns(3),
                Section::make('Transaction Detail')
                    ->schema([
                        TextEntry::make('transaction_id')->label('Transaction ID'),
                        TextEntry::make('transaction_date')->label('Transaction Date')->dateTime(),
                        TextEntry::make('ziswafCampaign.name')->label('Product'),
                        TextEntry::make('amount')->numeric()->money('IDR', locale: 'id'),
                        TextEntry::make('payment_method'),
                        TextEntry::make('is_paid')
                            ->label('Payment Status')
                            ->badge()
                            ->color(fn ($record) => $record->is_paid ? 'success' : 'danger')
                            ->getStateUsing(fn ($record) => $record->is_paid ? 'Paid' : 'Not Paid'),
                        TextEntry::make('Approved by ' . Auth::user()->name)
                            ->visible(fn ($record) => $record->is_paid)
                    ])->columns(2),
                Section::make('Payment')
                        ->schema([
                            ImageEntry::make('proof')->label('Receipt')
                            ->columnSpanFull(),
                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('transaction_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('transaction_date')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ziswafCampaign.name')
                    ->label('Product')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_paid')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('ziswaf_campaign_id')
                    ->label('Filter by Campaign')
                    ->relationship('ziswafCampaign', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('approvePayment')
                    ->label('Approve')
                    ->icon('heroicon-m-hand-thumb-up')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update(['is_paid' => true, 'updated_by' => Auth::id()]);
                        Notification::make()
                            ->title('Success')
                            ->body('Payment Approved')
                            ->success()
                            ->send();
                    })
                    ->hidden(fn ($record) => $record->is_paid)
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
            'index' => Pages\ListZiswafTransactions::route('/'),
            //'create' => Pages\CreateZiswafTransaction::route('/create'),
            'view' => Pages\ViewZiswafTransaction::route('/{record}'),
            //'edit' => Pages\EditZiswafTransaction::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }
}
