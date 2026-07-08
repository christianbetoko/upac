<?php

namespace App\Filament\Resources\CompteBancaires;

use App\Filament\Resources\CompteBancaires\Pages\CreateCompteBancaire;
use App\Filament\Resources\CompteBancaires\Pages\EditCompteBancaire;
use App\Filament\Resources\CompteBancaires\Pages\ListCompteBancaires;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\CompteBancaire;

class CompteBancaireResource extends Resource
{
    protected static ?string $model = CompteBancaire::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-credit-card'; // Icône idéale pour les comptes bancaires
    
    protected static ?string $pluralModelLabel = 'Comptes Bancaires';
    protected static ?string $modelLabel = 'Compte Bancaire';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informations du Compte Bancaire')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nom de la banque / Libellé')
                        ->placeholder('Ex: Rawbank, Equity BCDC, Ecobank...')
                        ->maxLength(255)
                        ->nullable(),

                    Forms\Components\TextInput::make('number')
                        ->label('Numéro de compte')
                        ->placeholder('Ex: 00010-XXXXXXXXXXX-XX')
                        ->maxLength(255)
                        ->nullable(),
                ])->columns(2),

            Section::make('Statut & Disponibilité')
                ->schema([
                    Forms\Components\Toggle::make('status')
                        ->label('Rendre ce compte actif pour les transactions / affichages')
                        ->default(true)
                        ->required(),
                ])->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Banque / Intitulé')
                    ->searchable()
                    ->sortable()
                    ->default('Non spécifié'),

                Tables\Columns\TextColumn::make('number')
                    ->label('Numéro de Compte')
                    ->searchable()
                    ->sortable()
                    ->copyable() // Permet de copier le numéro de compte en un clic
                    ->copyMessage('Numéro de compte copié !')
                    ->default('Non spécifié'),

                Tables\Columns\IconColumn::make('status')
                    ->label('Actif')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date d\'ajout')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Statut du compte')
                    ->trueLabel('Comptes actifs')
                    ->falseLabel('Comptes inactifs'),
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
            'index' => ListCompteBancaires::route('/'),
            'create' => CreateCompteBancaire::route('/create'),
            'edit' => EditCompteBancaire::route('/{record}/edit'),
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