<?php

namespace App\Filament\Resources\VendorEventResource\Pages;

use App\Filament\Resources\VendorEventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVendorEvent extends EditRecord
{
    protected static string $resource = VendorEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
