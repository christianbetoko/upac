<?php

namespace App\Filament\Resources\Admissions;

use App\Filament\Resources\AdmissionResource\Pages;
use App\Filament\Resources\Admissions\Pages\ViewAdmission;
use App\Filament\Resources\Admissions\Pages\ListAdmissions;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Tables;
use Filament\Schemas\Components\Grid;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Admission;
use Illuminate\Support\Str;
use Filament\Actions\ViewAction;
use Filament\Actions\Action; // Utile aussi pour ton action personnalisée "changeStat
class AdmissionResource extends Resource
{
    protected static ?string $model = Admission::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?string $pluralModelLabel = 'Admissions';
    protected static ?string $modelLabel = 'Admission';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            // SECTION 1 : INFORMATIONS PERSONNELLES
            Section::make('Informations Personnelles')
                ->schema([
                    Forms\Components\TextInput::make('code')
                        ->label('Code unique')
                        ->disabled(),

                    Forms\Components\FileUpload::make('photo')
                        ->label('Photo d\'identité')
                        ->image()
                        ->disk('public')
                        ->directory('admissions/photos')
                        ->disabled(),

                    Forms\Components\TextInput::make('first_name')
                        ->label('Prénom')
                        ->disabled(),

                    Forms\Components\TextInput::make('last_name')
                        ->label('Nom')
                        ->disabled(),

                    Forms\Components\TextInput::make('middle_name')
                        ->label('Post-nom')
                        ->disabled(),

                    Forms\Components\Select::make('gender')
                        ->label('Genre')
                        ->options([
                            'M' => 'Masculin',
                            'F' => 'Féminin',
                        ])
                        ->disabled(),

                    Forms\Components\DatePicker::make('birth_date')
                        ->label('Date de naissance')
                        ->disabled(),

                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->disabled(),

                    Forms\Components\TextInput::make('phone')
                        ->label('Téléphone')
                        ->disabled(),
                ])->columns(3),

            // SECTION 2 : CURSUS SCOLAIRE & ACADÉMIQUE
            Section::make('Cursus Scolaire & Académique')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('school_name')
                                ->label('École secondaire')
                                ->disabled(),

                            Forms\Components\TextInput::make('school_option')
                                ->label('Option d\'études')
                                ->disabled(),

                            Forms\Components\TextInput::make('school_grad_year')
                                ->label('Année de diplôme')
                                ->disabled(),

                            Forms\Components\TextInput::make('school_percentage')
                                ->label('Pourcentage obtenu')
                                ->disabled(),

                            Forms\Components\FileUpload::make('school_file')
                                ->label('Pièce jointe (Diplôme/Bulletin)')
                                ->disk('public')
                                ->directory('admissions/documents_scolaires')
                                ->disabled(),
                        ]),

                    Grid::make(3)
                        ->schema([
                            Forms\Components\TextInput::make('university_name')
                                ->label('Université précédente')
                                ->disabled(),

                            Forms\Components\TextInput::make('university_option')
                                ->label('Faculté / Option')
                                ->disabled(),

                            Forms\Components\TextInput::make('university_grad_year')
                                ->label('Année d\'obtention')
                                ->disabled(),

                            Forms\Components\TextInput::make('university_mention')
                                ->label('Mention')
                                ->disabled(),

                            Forms\Components\TextInput::make('university_percentage')
                                ->label('Pourcentage')
                                ->disabled(),

                            Forms\Components\FileUpload::make('university_file')
                                ->label('Dossier Universitaire (Relevé de notes)')
                                ->disk('public')
                                ->directory('admissions/documents_universitaires')
                                ->disabled(),
                        ]),
                ])->columns(1),

            // SECTION 3 : CHOIX ACADÉMIQUES & ORIENTATION
            Section::make('Orientation & Décision')
                ->schema([
                    Forms\Components\Select::make('department_id')
                        ->label('Département (Filière)')
                        ->relationship('department', 'name')
                        ->disabled(),

                    Forms\Components\Select::make('level_id')
                        ->label('Niveau ciblé')
                        ->relationship('level', 'name')
                        ->disabled(),

                    Forms\Components\Select::make('status')
                        ->label('Statut de la demande')
                        ->options([
                            'pending' => 'En attente',
                            'approved' => 'Approuvé',
                            'rejected' => 'Rejeté',
                        ])
                        ->disabled(), // Reste en lecture seule dans le formulaire global
                ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Code')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('photo')
                    ->label('Photo')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\TextColumn::make('first_name')
                    ->label('Prénom')
                    ->searchable(),

                Tables\Columns\TextColumn::make('last_name')
                    ->label('Nom')
                    ->searchable(),

                Tables\Columns\TextColumn::make('department.name')
                    ->label('Département')
                    ->sortable(),

                Tables\Columns\TextColumn::make('level.name')
                    ->label('Niveau')
                    ->sortable(),

                // Permet de modifier l'état directement depuis la liste sans passer par un formulaire complet
                Tables\Columns\SelectColumn::make('status')
                    ->label('Statut')
                    ->options([
                        'pending' => 'En attente',
                        'approved' => 'Approuvé',
                        'rejected' => 'Rejeté',
                    ])
                    ->selectablePlaceholder(false)
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'pending' => 'En attente',
                        'approved' => 'Approuvé',
                        'rejected' => 'Rejeté',
                    ]),
                Tables\Filters\SelectFilter::make('department_id')
                    ->label('Département')
                    ->relationship('department', 'name'),
            ])
            ->actions([
               ViewAction::make(),
              

                // Action pour changer le statut dans une modale dédiée
                Action::make('changeStatus')
                    ->label('Changer le statut')
                    ->icon('heroicon-o-arrow-path')
                    ->color('info')
                    ->form([
                        Forms\Components\Select::make('status')
                            ->label('Nouveau statut')
                            ->options([
                                'pending' => 'En attente',
                                'approved' => 'Approuvé',
                                'rejected' => 'Rejeté',
                            ])
                            ->required()
                            ->selectablePlaceholder(false),
                    ])
                    ->action(function (Admission $record, array $data): void {
                        $record->update([
                            'status' => $data['status'],
                        ]);
                    })
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
            'index' => ListAdmissions::route('/'),
            'view' => ViewAdmission::route('/{record}'), // Pas de route create ni edit
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