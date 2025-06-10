<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModuloResource\Pages;
use App\Filament\Resources\ModuloResource\RelationManagers;
use App\Models\Modulo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModuloResource extends Resource
{
    protected static ?string $model = Modulo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informações Básicas')
                    ->schema([
                        Forms\Components\TextInput::make('modelo')
                            ->label('Modelo do Módulo')
                            ->required(),
                        Forms\Components\TextInput::make('fabricante_id')
                            ->label('Fabricante')
                            ->required()
                            ->numeric()
                    ]),
                Forms\Components\TextInput::make('ocv')
                    ->label('Tensão em Circuito Aberto')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('scc')
                    ->label('Corrente de Curto-Circuito')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('vmax')
                    ->label('Tensão Máxima a 25ºC')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('imax')
                    ->label('Corrente Máxima a 25ºC')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pmp')
                    ->label('Potência Máxima a 25ºC')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('vsmax')
                    ->label('Tensão Máxima do Sistema')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('ocvt')
                    ->label('Temperatura em Tensão em Circuito Aberto')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('otvmp')
                    ->label('Coeficiente de Temperatura')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tcisc')
                    ->label('Coeficiente de Temperatura de Curto Circuito')
                    ->required()
                    ->numeric(),
                Section::make('Tamanho')
                    ->columns([
                        'sm' => 3,
                        'xl' => 5,
                    ])
                    ->schema([
                        Forms\Components\TextInput::make('weig')
                            ->label('Peso')
                            ->columnSpan(1)
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('widt')
                            ->label('Largura')
                            ->columnSpan(1)
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('leng')
                            ->label('Comprimento')
                            ->columnSpan(1)
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('deph')
                            ->label('Profundidade')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('area')
                            ->label('Área (m²)')
                            ->required()
                            ->numeric()
                    ]),
                
                Forms\Components\TextInput::make('icost')
                    ->label('Indice de Eficiência Apollaris')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('ef')
                    ->label('Eficiência (%)')
                    ->required()
                    ->numeric(),
                
                Forms\Components\TextInput::make('ncel')
                    ->label('Número de Células por Painel')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tol')
                    ->label('Tolerância da Capacidade')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('dur')
                    ->label('Duração em Anos')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tcell')
                    ->label('Material da Célula')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('mintemp')
                    ->label('Temperatura Minima')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('maxtemp')
                    ->label('Temperatura Máxima')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tier')
                    ->required(),
                Forms\Components\TextInput::make('noct')
                    ->label('Temperatura Nominal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('inop')
                    ->label('Capacidade máxima do Fusivel')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fabricante_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ocv')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('scc')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vmax')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('imax')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pmp')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vsmax')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('icost')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListModulos::route('/'),
            'create' => Pages\CreateModulo::route('/create'),
            'edit' => Pages\EditModulo::route('/{record}/edit'),
        ];
    }
}
