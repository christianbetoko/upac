<?php

namespace App\Filament\Resources\Enterprises; // Calqué sur ton architecture par sous-dossiers

use App\Filament\Resources\EnterpriseResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Schemas\Components\Section;
use Filament\Tables;

use App\Filament\Resources\Enterprises\Pages\CreateEnterprise;
use App\Filament\Resources\Enterprises\Pages\EditEnterprise;
use App\Filament\Resources\Enterprises\Pages\ListEnterprises;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Enterprise;

class EnterpriseResource extends Resource
{
    protected static ?string $model = Enterprise::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';
  
    protected static string | UnitEnum | null $navigationGroup = 'Gestion du Site';
    
    protected static ?string $pluralModelLabel = 'Informations Entreprise';
    protected static ?string $modelLabel = 'Entreprise';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Identité & Présentation')
                ->schema([
                    Forms\Components\Toggle::make('is_maintenance')
            ->label('Mode Maintenance')
            ->helperText('Activez cette option pour afficher le bandeau de maintenance sur le site vitrine.')
            ->default(false)
            ->columnSpanFull(),
                    Forms\Components\TextInput::make('name')
                        ->label('Nom de l\'université / entreprise')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('slogan')
                        ->label('Slogan')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('about')
                        ->label('En bref (Courte intro)')
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('description')
                        ->label('Description complète / Historique')
                        ->columnSpanFull(),
                ])->columns(2),

            Section::make('Vision & Mission')
                ->schema([
                    Forms\Components\Textarea::make('mission')
                        ->label('Notre Mission')
                        ->maxLength(255),

                    Forms\Components\Textarea::make('vision')
                        ->label('Notre Vision')
                        ->maxLength(255),
                ])->columns(2),

            Section::make('Contacts & Localisation')
                ->schema([
                    Forms\Components\TextInput::make('address')
                        ->label('Adresse physique')
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('phone')
                        ->label('Téléphone')
                        ->tel()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('email')
                        ->label('Adresse Email')
                        ->email()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('website')
                        ->label('Site Web externe')
                        ->url()
                        ->maxLength(255)
                        ->columnSpanFull(),
                         Forms\Components\TextInput::make('longitude')
                        ->label('Longitude')
                        ->numeric()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('latitude')
                        ->label('Latitude')
                        ->numeric()
                        ->maxLength(255),
                ])->columns(2),

            Section::make('Logos & Identité Visuelle')
                ->schema([
                    Forms\Components\FileUpload::make('logo_with_bg')
                        ->label('Logo avec fond')
                        ->image()
                        ->disk('public')
                        ->directory('enterprises')
                        ->imageEditor(),

                    Forms\Components\FileUpload::make('logo_without_bg')
                        ->label('Logo transparent (Sans fond)')
                        ->image()
                        ->disk('public')
                        ->directory('enterprises')
                        ->imageEditor(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo_without_bg')
                    ->label('Logo')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Téléphone'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Mis à jour le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ;
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
            'index' => ListEnterprises::route('/'),
            'create' => CreateEnterprise::route('/create'),
            'edit' => EditEnterprise::route('/{record}/edit'),
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