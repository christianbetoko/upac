<?php

namespace App\Filament\Resources\CategoryFaqs;

use App\Filament\Resources\CategoryFaqs\Pages\CreateCategoryFaq;
use App\Filament\Resources\CategoryFaqs\Pages\EditCategoryFaq;
use App\Filament\Resources\CategoryFaqs\Pages\ListCategoryFaqs;
use App\Models\CategoryFaq;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

use UnitEnum;
class CategoryFaqResource extends Resource
{
    protected static ?string $model = CategoryFaq::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder';

    // Définition explicite du slug pour éviter toute erreur 404
    protected static ?string $slug = 'category-faqs';

    protected static string | UnitEnum | null $navigationGroup = 'Foire Aux Questions (FAQ)';

    protected static ?string $pluralModelLabel = 'Catégories FAQ';
    protected static ?string $modelLabel = 'Catégorie FAQ';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Détails de la catégorie')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nom de la catégorie')
                        ->placeholder('Ex: Inscriptions, Paiments, Admission...')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('icon')
                        ->label('Icône (Heroicon / Classe CSS)')
                        ->placeholder('Ex: heroicon-o-question-mark-circle')
                        ->maxLength(255)
                        ->helperText('Nom de l\'icône Heroicons ou classe CSS d\'icône'),

                    Forms\Components\Toggle::make('status')
                        ->label('Actif / Visible')
                        ->default(true)
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('icon')
                    ->label('Icône')
                    ->placeholder('Aucune')
                    ->badge(),

                Tables\Columns\IconColumn::make('status')
                    ->label('Statut')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Statut')
                    ->placeholder('Toutes les catégories')
                    ->trueLabel('Actives uniquement')
                    ->falseLabel('Inactives uniquement'),
            ])
           ;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCategoryFaqs::route('/'),
            'create' => CreateCategoryFaq::route('/create'),
            'edit' => EditCategoryFaq::route('/{record}/edit'),
        ];
    }
}