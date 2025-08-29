<?php

namespace App\Filament\Resources\Homes\Pages;

use App\Filament\Resources\Homes\HomeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHome extends ViewRecord
{
    protected static string $resource = HomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
