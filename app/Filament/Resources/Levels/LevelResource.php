<?php

namespace App\Filament\Resources\Levels;

use App\Filament\Resources\Levels\Pages\CreateLevel;
use App\Filament\Resources\Levels\Pages\EditLevel;
use App\Filament\Resources\Levels\Pages\ListLevels;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Level;
use Illuminate\Support\Str;

class LevelResource extends Resource
{
    protected static ?string $model = Level::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap'; // Idéal pour les niveaux / promotions
    
    protected static ?string $pluralModelLabel = 'Niveaux d\'études';
    protected static ?string $modelLabel = 'Niveau d\'études';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Détails du Niveau d\'études')
                ->schema([
                    Forms\Components\Select::make('department_id')
                        ->label('Département affecté')
                        ->relationship('department', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\TextInput::make('name')
                        ->label('Nom du niveau d\'études')
                        ->placeholder('Ex: Licences 1, Master 2, etc.')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                    Forms\Components\TextInput::make('code')
                        ->label('Code abrégé')
                        ->placeholder('Ex: L1, M2, G3')
                        ->required()
                        ->maxLength(50),

                    Forms\Components\TextInput::make('slug')
                        ->label('Slug / URL unique')
                        ->required()
                        ->maxLength(191)
                        ->unique(ignoreRecord: true)
                        ->hint('Généré automatiquement depuis le nom.'),

                    Forms\Components\Textarea::make('description')
                        ->label('Description / Spécifications')
                        ->rows(4)
                        ->maxLength(65535)
                        ->columnSpanFull(),
                ])->columns(2),

            Section::make('Médias & Style')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Image d\'illustration (Bannière ou groupe)')
                        ->image()
                        ->disk('public')
                        ->directory('levels/covers')
                        ->imageEditor(),

                    Forms\Components\TextInput::make('icon')
                        ->label('Icône (Classe CSS ou Nom)')
                        ->maxLength(255)
                        ->nullable()
                        ->hint('Ex: ri-shield-flash-line ou heroicon-o-bookmark'),
                ])->columns(2),

            Section::make('Statut & Paramètres')
                ->schema([
                    Forms\Components\Toggle::make('status')
                        ->label('Rendre ce niveau actif et ouvert aux inscriptions / affichages')
                        ->default(true)
                        ->required(),
                ])->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Illustration')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('code')
                    ->label('Code')
                    ->badge()
                    ->color('gray')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Niveau d\'études')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('department.name')
                    ->label('Département')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('icon')
                    ->label('Icône')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('status')
                    ->label('Actif')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date Création')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('department_id')
                    ->label('Filtrer par Département')
                    ->relationship('department', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\TernaryFilter::make('status')
                    ->label('Statut du niveau')
                    ->trueLabel('Uniquement les niveaux actifs')
                    ->falseLabel('Uniquement les niveaux inactifs'),
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
            'index' => ListLevels::route('/'),
            'create' => CreateLevel::route('/create'),
            'edit' => EditLevel::route('/{record}/edit'),
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