<?php

namespace App\Filament\Resources\CampusLifePhotos\Pages;

use App\Filament\Resources\CampusLifePhotos\CampusLifePhotoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCampusLifePhotos extends ListRecords
{
    protected static string $resource = CampusLifePhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
