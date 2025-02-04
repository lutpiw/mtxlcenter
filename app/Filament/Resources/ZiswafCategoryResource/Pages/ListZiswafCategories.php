<?php

namespace App\Filament\Resources\ZiswafCategoryResource\Pages;

use App\Filament\Resources\ZiswafCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZiswafCategories extends ListRecords
{
    protected static string $resource = ZiswafCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
