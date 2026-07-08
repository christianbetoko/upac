<?php

namespace App\Filament\Resources\Departments;

use App\Filament\Resources\Departments\Pages\CreateDepartment;
use App\Filament\Resources\Departments\Pages\EditDepartment;
use App\Filament\Resources\Departments\Pages\ListDepartments;
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
use App\Models\Department;
use Illuminate\Support\Str;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';
    
    protected static ?string $pluralModelLabel = 'Départements';
    protected static ?string $modelLabel = 'Département';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Détails du Département')
                ->schema([
                    Forms\Components\Select::make('faculty_id')
                        ->label('Faculté d\'appartenance')
                        ->relationship('faculty', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\TextInput::make('name')
                        ->label('Nom du département')
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

            Section::make('Médias & Style')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Image de couverture / Bannière')
                        ->image()
                        ->disk('public')
                        ->directory('departments/covers')
                        ->imageEditor(),

                    Forms\Components\TextInput::make('icon')
                        ->label('Icône (Classe CSS ou Nom)')
                        ->maxLength(255)
                        ->nullable()
                        ->hint('Ex: ri-computer-line ou heroicon-o-cpu'),
                ])->columns(2),

            Section::make('Statut & Paramètres')
                ->schema([
                    Forms\Components\Toggle::make('status')
                        ->label('Rendre ce département actif et visible')
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

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom du Département')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('faculty.name')
                    ->label('Faculté')
                    ->badge()
                    ->color('success')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('icon')
                    ->label('Code Icône')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

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
                Tables\Filters\SelectFilter::make('faculty_id')
                    ->label('Filtrer par Faculté')
                    ->relationship('faculty', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\TernaryFilter::make('status')
                    ->label('Statut du département')
                    ->trueLabel('Uniquement les départements actifs')
                    ->falseLabel('Uniquement les départements inactifs'),
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
            'index' => ListDepartments::route('/'),
            'create' => CreateDepartment::route('/create'),
            'edit' => EditDepartment::route('/{record}/edit'),
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