<?php

namespace App\Filament\Resources\Socials; // Adapté à ton arborescence par sous-dossiers

use App\Filament\Resources\SocialResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Schemas\Components\Section;
use Filament\Tables;

use App\Filament\Resources\Socials\Pages\CreateSocial;
use App\Filament\Resources\Socials\Pages\EditSocial;
use App\Filament\Resources\Socials\Pages\ListSocials;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Social;

class SocialResource extends Resource
{
    protected static ?string $model = Social::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-share';
  
   /*  protected static string | UnitEnum | null $navigationGroup = 'Gestion du Site'; */
    
    protected static ?string $pluralModelLabel = 'Réseaux Sociaux';
    protected static ?string $modelLabel = 'Réseau Social';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Configuration du Réseau Social')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nom du réseau')
                        ->placeholder('Ex: Facebook, LinkedIn...')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('url')
                        ->label('Lien du profil (URL)')
                        ->placeholder('https://...')
                        ->url()
                        ->maxLength(255),

                   Forms\Components\TextInput::make('icon')
                        ->label('Icône')
                        ->placeholder('Ex: facebook, linkedin...')
                        ->maxLength(255),

                    Forms\Components\Toggle::make('status')
                        ->label('Actif')
                        ->default(true)
                        ->required(),
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

                Tables\Columns\TextColumn::make('url')
                    ->label('Lien')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),

                
                Tables\Columns\IconColumn::make('status')
                    ->label('Statut')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        1 => 'Actif',
                        0 => 'Inactif',
                    ]),
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
            'index' => ListSocials::route('/'),
            'create' => CreateSocial::route('/create'),
            'edit' => EditSocial::route('/{record}/edit'),
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