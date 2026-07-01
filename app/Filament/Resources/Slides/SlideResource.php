<?php

namespace App\Filament\Resources\Slides;

use App\Filament\Resources\SlideResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Schemas\Components\Section;
use Filament\Tables;



use App\Filament\Resources\Slides\Pages\CreateSlide;
use App\Filament\Resources\Slides\Pages\EditSlide;
use App\Filament\Resources\Slides\Pages\ListSlides;
use App\Filament\Resources\Slides\Schemas\SlideForm;
use App\Filament\Resources\Slides\Tables\SlidesTable;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Slide;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';
  
    
    
/*     protected static string | UnitEnum | null $navigationGroup = 'Gestion du Site'; */
    
    protected static ?string $pluralModelLabel = 'Sliders / Bannières';
    protected static ?string $modelLabel = 'Slide';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
                Section::make('Détails du Slide')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nom / Titre du slide')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('link')
                            ->label('Lien d’action (URL)')
                            ->url()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Description short')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Médias & Statut')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Image du Slide')
                            ->image()
                            ->disk('public')
                            ->directory('slides')
                            ->imageEditor() // Optionnel : permet de recadrer l'image directement
                            ->required(),

                        Forms\Components\Toggle::make('status')
                            ->label('Actif')
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
                    ->label('Aperçu')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('link')
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
            'index' => ListSlides::route('/'),
            'create' => CreateSlide::route('/create'),
            'edit' => EditSlide::route('/{record}/edit'),
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
