<?php

namespace App\Filament\Resources\EquipementResource\Pages;

use App\Filament\Resources\EquipementResource;
use App\Filament\Resources\EquipementResource\Widgets\EquipementChart;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEquipements extends ListRecords
{
    protected static string $resource = EquipementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            //
            EquipementChart::class
        ];
    }
}
