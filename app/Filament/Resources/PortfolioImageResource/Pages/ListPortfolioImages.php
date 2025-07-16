<?php

namespace App\Filament\Resources\PortfolioImageResource\Pages;

use App\Filament\Resources\PortfolioImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioImages extends ListRecords
{
    protected static string $resource = PortfolioImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
