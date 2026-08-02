<?php

namespace App\Filament\Resources\CategoryFaqs\Pages;

use App\Filament\Resources\CategoryFaqs\CategoryFaqResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCategoryFaqs extends ListRecords
{
    protected static string $resource = CategoryFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
