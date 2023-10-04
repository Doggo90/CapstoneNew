<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $navigationLabel = 'Users';





    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()

                ->schema([

                    Forms\Components\Section::make('User Details')

                    ->schema([

                        Forms\Components\TextInput::make('name'),
                        Forms\Components\TextInput::make('email'),
                        Forms\Components\TextInput::make('phone'),
                        Forms\Components\TextInput::make('address'),
                        Forms\Components\Select::make('role')
                            ->options([
                                'admin' => 'admin',
                                'agent' => 'agent',
                                'user' => 'user',
                            ])
                            ->default('user'),

                    ])

                ])

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'success',
                        'user' => 'gray',
                        'agent' => 'warning',
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reputation')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                ->options([
                    'admin' => 'Admin',
                    'agent' => 'Agent',
                    'user' => 'User',
                ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),

                ]),
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
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
