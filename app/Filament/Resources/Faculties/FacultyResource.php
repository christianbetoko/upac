<?php

namespace App\Filament\Resources\Faculties; // <-- Modifiez cette ligne ainsi

use App\Filament\Resources\Faculties\Pages\CreateFaculty;
use App\Filament\Resources\Faculties\Pages\EditFaculty;
use App\Filament\Resources\Faculties\Pages\ListFaculties;
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
use App\Models\Faculty;
use Illuminate\Support\Str;

class FacultyResource extends Resource
{
    protected static ?string $model = Faculty::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?string $pluralModelLabel = 'Facultés';
    protected static ?string $modelLabel = 'Faculté';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Détails de la Faculté')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nom de la faculté')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                    Forms\Components\TextInput::make('slug')
                        ->label('Slug / URL unique')
                        ->required()
                        ->maxLength(191)
                        ->unique(ignoreRecord: true)
                        ->hint('Généré automatiquement depuis le nom.'),

                    Forms\Components\Textarea::make('description')
                        ->label('Description / Présentation')
                        ->rows(4)
                        ->maxLength(65535)
                        ->columnSpanFull(),
                ])->columns(2),

            Section::make('Médias & Illustrations')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Image de couverture / Bannière')
                        ->image()
                        ->disk('public')
                        ->directory('faculties/covers')
                        ->imageEditor(),
 Forms\Components\TextInput::make('icon')
                        ->label('Icône de la faculté')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    
                ])->columns(2),

            Section::make('Statut & Paramètres')
                ->schema([
                    Forms\Components\Toggle::make('status')
                        ->label('Rendre la faculté active et visible sur le site')
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
                    ->label('Couverture')
                    ->disk('public')
                    ->square(),

                Tables\Columns\ImageColumn::make('icon')
                    ->label('Icône')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom de la Faculté')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('status')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date Création')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Statut de la faculté')
                    ->trueLabel('Uniquement les facultés actives')
                    ->falseLabel('Uniquement les facultés inactives'),
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
            'index' => ListFaculties::route('/'),
            'create' => CreateFaculty::route('/create'),
            'edit' => EditFaculty::route('/{record}/edit'),
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