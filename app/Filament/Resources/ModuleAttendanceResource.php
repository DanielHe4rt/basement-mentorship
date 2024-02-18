<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModuleAttendanceResource\Pages;
use App\Filament\Resources\ModuleAttendanceResource\RelationManagers;
use App\Models\Users\ModuleAttendance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModuleAttendanceResource extends Resource
{
    protected static ?string $model = ModuleAttendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('module_id')
                    ->relationship('module', 'name')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('onhold'),
            ]);
    }

    public static function table(Table $table): Table
    {
        // TODO: removing id from table asap.
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('module.name')
                    ->numeric(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
            'index' => Pages\ListModuleAttendances::route('/'),
            'create' => Pages\CreateModuleAttendance::route('/create'),
            'edit' => Pages\EditModuleAttendance::route('/{record}/edit'),
        ];
    }
}
