<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipementResource\Pages;
use App\Filament\Resources\EquipementResource\Widgets\EquipementChart;
use App\Models\Equipement;
use App\Models\EtatEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EquipementResource extends Resource
{
    protected static ?string $model = Equipement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Inventaire';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('matricule')
                    ->required(),
                Forms\Components\TextInput::make('nom'),
                Forms\Components\TextInput::make('type')
                    ->required(),
                Forms\Components\TextInput::make('marque')
                    ->required(),
                Forms\Components\TextInput::make('modele')
                    ->required(),
                Forms\Components\TextInput::make('numero_de_serie')
                    ->required(),
                Forms\Components\DatePicker::make('date_achat')
                    ->required(),
                Forms\Components\Select::make('etat')->label('Etat')
                    ->options(EtatEnum::asSelectArray()),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('emplacement_id')
                    ->relationship('emplacement', 'nom')
                    ->required()
                    ->searchable()
                    ->createOptionForm(
                        [
                        Forms\Components\TextInput::make("nom")->required(),
                        Forms\Components\TextInput::make("adresse")->required()

                        ]
                    ),
                Forms\Components\MarkdownEditor::make('commentaire'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('matricule')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('marque')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modele')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_de_serie')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_achat')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('etat')
                    ->searchable()
                    ->color(fn (Equipement $record) => match ($record->etat) {
                        EtatEnum::BON_ETAT => 'success',
                        EtatEnum::EN_REPARATION => 'warning',
                        EtatEnum::EN_DOMMAGE => 'danger',
                    }),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('emplacement.nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListEquipements::route('/'),
            'create' => Pages\CreateEquipement::route('/create'),
            'edit' => Pages\EditEquipement::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            //
            EquipementChart::class
        ];
    }

    


}
