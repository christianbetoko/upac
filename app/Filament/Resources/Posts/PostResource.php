<?php

namespace App\Filament\Resources\Posts;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\Posts\Pages\CreatePost;
use App\Filament\Resources\Posts\Pages\EditPost;
use App\Filament\Resources\Posts\Pages\ListPosts;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Post;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $pluralModelLabel = 'Articles';
    protected static ?string $modelLabel = 'Article';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Contenu de l\'Article')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Titre de l\'article')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                    Forms\Components\TextInput::make('slug')
                        ->label('Slug / URL unique')
                        ->required()
                        ->maxLength(191)
                        ->unique(ignoreRecord: true)
                        ->hint('Généré automatiquement depuis le titre.'),

                    Forms\Components\RichEditor::make('content')
                        ->label('Corps de l\'article')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),

            Section::make('Classifications & Liaisons')
                ->schema([
                    

                    Forms\Components\Select::make('sub_category_id')
                        ->label('Sous-catégorie')
                        ->relationship('subCategory', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                ])->columns(1),

            Section::make('Médias & Pièces Jointes')
                ->schema([
                    Forms\Components\FileUpload::make('image_cover')
                        ->label('Image de couverture')
                        ->image()
                        ->disk('public')
                        ->directory('posts/covers')
                        ->imageEditor()
                        ->required(),

                    Forms\Components\FileUpload::make('file_path')
                        ->label('Fichier joint / Document (Optionnel)')
                        ->disk('public')
                        ->directory('posts/files')
                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                        ->maxSize(10240), // Limite à 10 Mo
                ])->columns(2),

            Section::make('Statut & Planification')
                ->schema([
                   Forms\Components\Select::make('status')
                                    ->label('Statut')
                                    ->options([
                                        'draft' => 'Brouillon',
                                        'published' => 'Publié',
                                        'archived' => 'Archivé',
                                    ])->default('draft')->required(),

                    Forms\Components\Toggle::make('is_featured')
                        ->label('Mettre à la une (A la Une)')
                        ->default(false)
                        ->required(),

                    Forms\Components\DateTimePicker::make('published_at')
                        ->label('Date de publication')
                        ->default(now())
                        ->required(),
                ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_cover')
                    ->label('Couverture')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable()
                    ->wrap(), // Permet de passer à la ligne proprement si le titre est long

                Tables\Columns\TextColumn::make('author.name')
                    ->label('Auteur')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('subCategory.name')
                    ->label('Sous-catégorie')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('status')
                    ->label('En ligne')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('À la une')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Date Pub.')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('sub_category_id')
                    ->label('Sous-catégorie')
                    ->relationship('subCategory', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\TernaryFilter::make('status')
                    ->label('Statut de publication')
                    ->trueLabel('Uniquement en ligne')
                    ->falseLabel('Uniquement hors-ligne'),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Articles à la une')
                    ->trueLabel('Uniquement à la une')
                    ->falseLabel('Masquer ceux à la une'),
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
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            'edit' => EditPost::route('/{record}/edit'),
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