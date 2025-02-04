<?php

namespace App\Filament\Resources\ZiswafCategoryResource\Pages;

use App\Filament\Resources\ZiswafCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZiswafCategory extends EditRecord
{
    protected static string $resource = ZiswafCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
