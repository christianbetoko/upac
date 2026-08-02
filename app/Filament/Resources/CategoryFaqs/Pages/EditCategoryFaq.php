<?php

namespace App\Filament\Resources\CategoryFaqs\Pages;

use App\Filament\Resources\CategoryFaqs\CategoryFaqResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCategoryFaq extends EditRecord
{
    protected static string $resource = CategoryFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
