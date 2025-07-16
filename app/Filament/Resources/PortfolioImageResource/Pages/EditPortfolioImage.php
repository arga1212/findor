<?php

namespace App\Filament\Resources\PortfolioImageResource\Pages;

use App\Filament\Resources\PortfolioImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioImage extends EditRecord
{
    protected static string $resource = PortfolioImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
