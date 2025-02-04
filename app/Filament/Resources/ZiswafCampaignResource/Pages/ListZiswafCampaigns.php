<?php

namespace App\Filament\Resources\ZiswafCampaignResource\Pages;

use App\Filament\Resources\ZiswafCampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZiswafCampaigns extends ListRecords
{
    protected static string $resource = ZiswafCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
