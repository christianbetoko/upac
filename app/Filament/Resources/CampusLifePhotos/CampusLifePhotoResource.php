<?php

namespace App\Filament\Resources\CampusLifePhotos; // Calqué sur ton architecture par sous-dossiers

use App\Filament\Resources\CampusLifePhotoResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Schemas\Components\Section;
use Filament\Tables;

use App\Filament\Resources\CampusLifePhotos\Pages\CreateCampusLifePhoto;
use App\Filament\Resources\CampusLifePhotos\Pages\EditCampusLifePhoto;
use App\Filament\Resources\CampusLifePhotos\Pages\ListCampusLifePhotos;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\CampusLifePhoto;

class CampusLifePhotoResource extends Resource
{
    protected static ?string $model = CampusLifePhoto::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-camera';
  
    protected static string | UnitEnum | null $navigationGroup = 'Gestion du Site';
    
    protected static ?string $pluralModelLabel = 'Photos Vie du Campus';
    protected static ?string $modelLabel = 'Photo Campus';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Ajouter une Photo de la Vie au Campus')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Titre / Légende de la photo')
                        ->placeholder('Ex: Remise des diplômes, Match de football...')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\FileUpload::make('image_path')
                        ->label('Sélectionner l\'image')
                        ->image()
                        ->disk('public')
                        ->directory('campus-life')
                        ->imageEditor()
                        ->required(),
                                       Forms\Components\Toggle::make('status')
    ->label('Statut')
    ->default(true)
    ->required(),
                ])->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Photo')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre / Légende')
                    ->searchable()
                    ->sortable(),
                   
     

                // Affiche le nom de l'utilisateur qui a ajouté la photo grâce à la relation Eloquent
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Ajouté par')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date d\'ajout')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                    Tables\Columns\IconColumn::make('status')->label('Statut')->boolean()->sortable(),
            ])
            ->filters([
                //
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
            'index' => ListCampusLifePhotos::route('/'),
            'create' => CreateCampusLifePhoto::route('/create'),
            'edit' => EditCampusLifePhoto::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}