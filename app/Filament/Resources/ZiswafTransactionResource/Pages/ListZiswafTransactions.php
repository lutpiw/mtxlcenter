<?php

namespace App\Filament\Resources\ZiswafTransactionResource\Pages;

use App\Filament\Resources\ZiswafTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZiswafTransactions extends ListRecords
{
    protected static string $resource = ZiswafTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
