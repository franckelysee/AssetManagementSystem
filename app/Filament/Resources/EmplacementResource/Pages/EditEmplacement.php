<?php

namespace App\Filament\Resources\EmplacementResource\Pages;

use App\Filament\Resources\EmplacementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmplacement extends EditRecord
{
    protected static string $resource = EmplacementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
