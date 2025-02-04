<?php

namespace App\Filament\Resources\ZiswafProgramResource\Pages;

use App\Filament\Resources\ZiswafProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZiswafPrograms extends ListRecords
{
    protected static string $resource = ZiswafProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
