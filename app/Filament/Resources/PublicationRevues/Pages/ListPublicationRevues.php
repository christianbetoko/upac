<?php

namespace App\Filament\Resources\PublicationRevues\Pages;

use App\Filament\Resources\PublicationRevues\PublicationRevueResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPublicationRevues extends ListRecords
{
    protected static string $resource = PublicationRevueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
