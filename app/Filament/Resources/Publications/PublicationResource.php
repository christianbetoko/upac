<?php

namespace App\Filament\Resources\Publications;

use App\Filament\Resources\Publications\Pages\CreatePublication;
use App\Filament\Resources\Publications\Pages\EditPublication;
use App\Filament\Resources\Publications\Pages\ListPublications;
use App\Filament\Resources\Publications\Schemas\PublicationForm;
use App\Filament\Resources\Publications\Tables\PublicationsTable;
use App\Models\Publication;
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
use UnitEnum;
class PublicationResource extends Resource
{
    protected static ?string $model = Publication::class;


    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $pluralModelLabel = 'Publications';
    protected static ?string $modelLabel = 'Publication';
    

  protected static string | UnitEnum | null $navigationGroup = 'Gestion du blog & des contenus';
    public static function form(Schema $schema): Schema
    {
       return $schema->components([
            Section::make('Contenu de la Publication / Revue')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Titre de la publication / revue')
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

                    Forms\Components\RichEditor::make('description')
                        ->label('Description de la publication / revue')
                        ->required()
                        ->columnSpanFull(),
                        
                    Forms\Components\TextInput::make('author')
                        ->label('Auteur de la publication / revue')
                        ->nullable()
                        ,
                    
                ])->columns(2),

           

            Section::make('Images & Fichiers')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Image de couverture')
                        ->image()
                        ->disk('public')
                        ->directory('publications/covers')
                        ->imageEditor()
                        ->required(),

                    Forms\Components\FileUpload::make('file')
                        ->label('Fichier joint / Document (Optionnel)')
                        ->disk('public')
                        ->directory('publications/files')
                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                        ->maxSize(102400), // Limite à 100 Mo
                ])->columns(2),

            Section::make('Statut & Planification')
                ->schema([
                    Forms\Components\Toggle::make('status')
                            ->label('Actif')
                            ->default(true)
                            ->required(),
Forms\Components\DatePicker::make('publication_date')
                        ->label('Date de publication')
                        ->nullable()
                        ->displayFormat('d/m/Y')
                        ->firstDayOfWeek(1)
                        ->placeholder('jj/mm/aaaa')
                        ->hint('Format: jj/mm/aaaa'),
                   
                ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return PublicationRevuesTable::configure($table);
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
            'index' => ListPublications::route('/'),
            'create' => CreatePublication::route('/create'),
            'edit' => EditPublication::route('/{record}/edit'),
        ];
    }
}
