<?php

namespace App\Filament\Resources\ZiswafTransactionResource\Pages;

use App\Filament\Resources\ZiswafTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZiswafTransaction extends EditRecord
{
    protected static string $resource = ZiswafTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
