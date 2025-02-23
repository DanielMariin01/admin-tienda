<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstadisticaResource\Pages;
use App\Filament\Resources\EstadisticaResource\RelationManagers;
use App\Models\Estadistica;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstadisticaResource extends Resource
{
    protected static ?string $model = Estadistica::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListEstadisticas::route('/'),
            'create' => Pages\CreateEstadistica::route('/create'),
            'edit' => Pages\EditEstadistica::route('/{record}/edit'),
        ];
    }
}
