<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
    // Cette fonction intercepte les données juste avant la création en BDD
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // On force l'ID de l'utilisateur connecté dans le champ user_id
        $data['user_id'] = auth()->id();

        return $data;
    }
}
