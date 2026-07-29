<?php

namespace App\Filament\Resources\Events;

use App\Filament\Resources\Events\Pages\CreateEvent;
use App\Filament\Resources\Events\Pages\EditEvent;
use App\Filament\Resources\Events\Pages\ListEvents;
use App\Filament\Resources\Events\Pages\ViewEvent;
use App\Models\Event;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $pluralModelLabel = 'Événements';
    protected static ?string $modelLabel = 'Événement';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            // SECTION 1 : INFORMATIONS GÉNÉRALES
            Section::make('Informations générales')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Titre')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                        ),

                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(Event::class, 'slug', ignoreRecord: true)
                        ->maxLength(191),

                    Forms\Components\Select::make('user_id')
                        ->label('Auteur')
                        ->relationship('user', 'name')
                        ->default(auth()->id())
                        ->required()
                        ->searchable(),

                    Forms\Components\Select::make('status')
                        ->label('Statut')
                        ->options([
                            'draft' => 'Brouillon',
                            'published' => 'Publié',
                            'archived' => 'Archivé',
                        ])
                        ->default('draft')
                        ->required(),

                    Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\FileUpload::make('image_cover')
                        ->label('Image de couverture')
                        ->image()
                        ->disk('public')
                        ->directory('events/covers')
                        ->columnSpanFull(),
                ])->columns(2),

            // SECTION 2 : DATE ET LIEU
            Section::make('Date, Horaire & Emplacement')
                ->schema([
                    Forms\Components\DatePicker::make('event_date')
                        ->label('Date de l\'événement'),

                    Forms\Components\TimePicker::make('event_start_time')
                        ->label('Heure de début'),

                    Forms\Components\TimePicker::make('event_end_time')
                        ->label('Heure de fin'),

                    Forms\Components\Toggle::make('is_online')
                        ->label('Événement en ligne')
                        ->live()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('location')
                        ->label('Lieu physique')
                        ->hidden(fn (Forms\Get $get): bool => (bool) $get('is_online'))
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('online_link')
                        ->label('Lien de la réunion / Live')
                        ->url()
                        ->visible(fn (Forms\Get $get): bool => (bool) $get('is_online'))
                        ->columnSpanFull(),
                ])->columns(3),

            // SECTION 3 : BILLETERIE & DÉTAILS FINANCIERS
            Section::make('Billetterie')
                ->schema([
                    Forms\Components\TextInput::make('ticket_price')
                        ->label('Prix du billet')
                        ->numeric()
                        ->prefix('$')
                        ->step('0.01'),

                    Forms\Components\Select::make('money')
                        ->label('Devise')
                        ->options([
                            'USD' => 'USD ($)',
                            'CDF' => 'CDF (FC)',
                            'EUR' => 'EUR (€)',
                        ])
                        ->default('USD')
                        ->required(),

                    Forms\Components\TextInput::make('available_tickets')
                        ->label('Nombre de billets disponibles')
                        ->numeric(),

                    Forms\Components\TextInput::make('views_count')
                        ->label('Nombre de vues')
                        ->disabled()
                        ->default(0)
                        ->decomposed(false),
                ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_cover')
                    ->label('Image')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('event_date')
                    ->label('Date')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_online')
                    ->label('En ligne')
                    ->boolean(),

                Tables\Columns\TextColumn::make('ticket_price')
                    ->label('Prix')
                    ->formatStateUsing(fn ($record) => $record->ticket_price ? "{$record->ticket_price} {$record->money}" : 'Gratuit')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        'archived' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'Brouillon',
                        'published' => 'Publié',
                        'archived' => 'Archivé',
                    }),

                Tables\Columns\TextColumn::make('views_count')
                    ->label('Vues')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'draft' => 'Brouillon',
                        'published' => 'Publié',
                        'archived' => 'Archivé',
                    ]),

                Tables\Filters\TernaryFilter::make('is_online')
                    ->label('Format')
                    ->placeholder('Tous les événements')
                    ->trueLabel('En ligne')
                    ->falseLabel('Présentiel'),
            ])
            ->actions([
              
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => ListEvents::route('/'),
            'create' => CreateEvent::route('/create'),
            
            'edit' => EditEvent::route('/{record}/edit'),
        ];
    }
}