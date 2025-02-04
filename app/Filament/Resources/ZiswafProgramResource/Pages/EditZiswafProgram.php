<?php

namespace App\Filament\Resources\ZiswafProgramResource\Pages;

use App\Filament\Resources\ZiswafProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZiswafProgram extends EditRecord
{
    protected static string $resource = ZiswafProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
