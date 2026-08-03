<?php

namespace App\Filament\Resources\PublicationRevues\Pages;

use App\Filament\Resources\PublicationRevues\PublicationRevueResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPublicationRevue extends EditRecord
{
    protected static string $resource = PublicationRevueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
