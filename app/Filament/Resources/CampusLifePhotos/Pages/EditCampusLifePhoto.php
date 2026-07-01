<?php

namespace App\Filament\Resources\CampusLifePhotos\Pages;

use App\Filament\Resources\CampusLifePhotos\CampusLifePhotoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCampusLifePhoto extends EditRecord
{
    protected static string $resource = CampusLifePhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
