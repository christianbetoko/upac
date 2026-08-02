<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\CategoryFaq;
use App\Models\Faq;

#[Title('Foire aux Questions (FAQ)')]
class FaqPage extends Component
{
   public ?int $activeCategoryId = null;

    public function mount(): void
    {
        // Définit la première catégorie active par défaut
        $firstCategory = CategoryFaq::where('status', true)->first();
        if ($firstCategory) {
            $this->activeCategoryId = $firstCategory->id;
        }
    }

    public function selectCategory(int $categoryId): void
    {
        $this->activeCategoryId = $categoryId;
    }

    public function render()
    {
        // Charge les catégories actives avec uniquement leurs FAQs actives
        $categories = CategoryFaq::with(['faqs' => function ($query) {
            $query->where('status', true);
        }])
        ->where('status', true)
        ->get();

        return view('livewire.faq-page', [
            'categories' => $categories,
        ]);
    }
}
