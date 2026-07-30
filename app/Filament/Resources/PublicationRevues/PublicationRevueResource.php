<?php

namespace App\Filament\Resources\PublicationRevues;

use App\Filament\Resources\PublicationRevues\Pages\CreatePublicationRevue;
use App\Filament\Resources\PublicationRevues\Pages\EditPublicationRevue;
use App\Filament\Resources\PublicationRevues\Pages\ListPublicationRevues;

use App\Models\PublicationRevue;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PublicationRevueResource extends Resource
{
    protected static ?string $model = PublicationRevue::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $slug = 'publication-revues';

    protected static ?string $pluralModelLabel = 'Publications & Revues';
    protected static ?string $modelLabel = 'Publication / Revue';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            // SECTION 1 : INFORMATIONS GÉNÉRALES
            Section::make('Informations de la publication')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Titre')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                       ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(PublicationRevue::class, 'slug', ignoreRecord: true)
                        ->maxLength(255),

                    Forms\Components\TextInput::make('author')
                        ->label('Auteur / Éditeur')
                        ->maxLength(255)
                        ->placeholder('Ex: Prof. Jean Dupont ou Direction de la Recherche'),

                    Forms\Components\DatePicker::make('publication_date')
                        ->label('Date de publication')
                        ->native(false)
                        ->displayFormat('d/m/Y'),

                    Forms\Components\Toggle::make('status')
                        ->label('Publié / Visible')
                        ->default(true)
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('description')
                        ->label('Description / Résumé')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),
                ])->columns(2),

            // SECTION 2 : FICHIERS ET MÉDIAS
            Section::make('Fichiers & Couverture')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Image de couverture')
                        ->image()
                             ->imageEditor()
                        ->disk('public')
                        ->directory('publications/covers')
                        ->required()
                        ->columnSpan(1),

                    Forms\Components\FileUpload::make('file')
                        ->label('Document (PDF / Revue)')
                        ->disk('public')
                        ->directory('publications/files')
                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                        ->openable()
                        ->downloadable()
                        ->required()
                        ->columnSpan(1),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Couverture')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('author')
                    ->label('Auteur')
                    ->searchable()
                    ->placeholder('Non spécifié'),

                Tables\Columns\TextColumn::make('publication_date')
                    ->label('Date de pub.')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('status')
                    ->label('Statut')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ajouté le')
                    ->dateTime('d/m/Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Statut de publication')
                    ->placeholder('Toutes les publications')
                    ->trueLabel('Publiées uniquement')
                    ->falseLabel('Masquées uniquement'),
            ]);
           
            
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPublicationRevues::route('/'),
            'create' => CreatePublicationRevue::route('/create'),
            
            'edit' => EditPublicationRevue::route('/{record}/edit'),
        ];
    }
}