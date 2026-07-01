<?php

namespace App\Filament\Resources\CampusLifePhotos\Pages;

use App\Filament\Resources\CampusLifePhotos\CampusLifePhotoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCampusLifePhoto extends CreateRecord
{
    protected static string $resource = CampusLifePhotoResource::class;
    // Cette fonction intercepte les données juste avant la création en BDD
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // On force l'ID de l'utilisateur connecté dans le champ user_id
        $data['user_id'] = auth()->id();

        return $data;
    }
}
