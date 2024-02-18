<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\UserModules;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Informations')
                    ->collapsible()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('github_id')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('github_username')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('description')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('onboarded')
                            ->required()
                            ->maxLength(255)
                            ->default(0),
                    ])->columns(2),
                Section::make('User details')
                    ->columns(2)
                    ->collapsible()
                    ->relationship('details')
                    ->schema([
                        TextInput::make('company')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('role')
                            ->required()
                            ->maxLength(255),
                        Select::make('seniority')
                            ->options([
                                'junior' => 'Junior',
                                'mid' => 'Mid',
                                'senior' => 'Senior',
                                'lead' => 'Lead',
                            ])
                            ->required(),
                        TextInput::make('based_in')
                            ->required()
                            ->maxLength(255),
                        Select::make('pronouns')
                            ->options([
                                'he_him' => 'He/Him',
                                'she_her' => 'She/Her',
                                'they_them' => 'They/Them',
                                'other' => 'Other',
                            ])
                            ->required(),
                        TextInput::make('twitter_handle')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('devto_handle')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('comments')
                            ->required()
                            ->maxLength(255),
                        Toggle::make('is_employed')
                            ->required()
                            ->default(false),
                        Toggle::make('switching_career')
                            ->required()
                            ->default(false),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('github_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('github_username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('onboarded')
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
                Action::make('user_modules')->icon('heroicon-o-clipboard-document-list')->label('Modules')->color('success')
                // ->url(fn(User $record): string => route('users.user-modules', $record))
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),

        ];
    }
}
