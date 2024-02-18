<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModuleResource\Pages;
use App\Models\Module\Module;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ModuleResource extends Resource
{
    protected static ?string $model = Module::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('thumbnail_url')
                    ->label('Thumbnail')
                    ->maxLength(255),
                Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Repeater::make('tasks')->relationship()
                    ->schema([
                        Tabs::make('')
                            ->tabs([
                                Tabs\Tab::make('Task Informations')
                                    ->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('thumbnail_url')
                                            ->label('Thumbnail')
                                            ->maxLength(255),
                                        Textarea::make('description')
                                            ->columnSpanFull()
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('deadline'),
                                        TextInput::make('order')
                                            ->type('number')
                                            ->required(),
                                        TagsInput::make('tips')
                                            ->columnSpanFull()
                                            ->label('Tips')
                                            ->placeholder('Enter a tip'),
                                    ]),
                                Tabs\Tab::make('Task ToDos')
                                    ->schema([
                                        Repeater::make('todos')
                                            ->relationship()
                                            ->schema([
                                                TextInput::make('description')
                                                    ->required()
                                                    ->maxLength(255),
                                            ]),
                                    ]),

                            ])->columnSpanFull(),
                    ])->columns(2)->columnSpanFull()->grid(2)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('thumbnail_url')
                    ->label('Thumbnail')
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListModules::route('/'),
            'create' => Pages\CreateModule::route('/create'),
            'view' => Pages\ViewModule::route('/{record}'),
            'edit' => Pages\EditModule::route('/{record}/edit'),
        ];
    }
}
