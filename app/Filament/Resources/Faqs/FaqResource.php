<?php

namespace App\Filament\Resources\Faqs;

use App\Filament\Resources\Faqs\Pages\CreateFaq;
use App\Filament\Resources\Faqs\Pages\EditFaq;
use App\Filament\Resources\Faqs\Pages\ListFaqs;
use App\Models\Faq;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;
class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-question-mark-circle';

    // Définition explicite du slug
    protected static ?string $slug = 'faqs';

      protected static string | UnitEnum | null $navigationGroup = 'Foire Aux Questions (FAQ)';

    protected static ?string $pluralModelLabel = 'Questions Fréquentes (FAQ)';
    protected static ?string $modelLabel = 'Question FAQ';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Détails de la question')
                ->schema([
                    Forms\Components\Select::make('category_id')
                        ->label('Catégorie')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\Toggle::make('status')
                        ->label('Actif / Visible')
                        ->default(true)
                        ->required(),

                    Forms\Components\TextInput::make('question')
                        ->label('Question')
                        ->placeholder('Ex: Comment s\'inscrire à l\'université ?')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('answer')
                        ->label('Réponse')
                        ->placeholder('Saisissez la réponse détaillée ici...')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label('Question')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Catégorie')
                    ->badge()
                    ->sortable()
                    ->searchable(),

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
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Filtrer par catégorie')
                    ->relationship('category', 'name')
                    ->preload(),

                Tables\Filters\TernaryFilter::make('status')
                    ->label('Statut')
                    ->placeholder('Toutes les questions')
                    ->trueLabel('Actives uniquement')
                    ->falseLabel('Inactives uniquement'),
            ])
            ;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFaqs::route('/'),
            'create' => CreateFaq::route('/create'),
            'edit' => EditFaq::route('/{record}/edit'),
        ];
    }
}