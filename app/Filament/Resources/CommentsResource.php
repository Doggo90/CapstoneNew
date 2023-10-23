<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentsResource\Pages;
use App\Filament\Resources\CommentsResource\RelationManagers;
use App\Models\Comments;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Http\Middleware\Auth;

class CommentsResource extends Resource
{
    protected static ?string $model = Comments::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    protected static ?string $navigationGroup = 'Posts Management';

    protected static ?string $navigationLabel = 'Comments';
    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Group::make()

            ->schema([

                Forms\Components\Section::make('Details')

                ->schema([

                    Forms\Components\Select::make('listing_id')
                        ->relationship('post', 'title')
                        ->required(),
                        Forms\Components\Select::make('user_id')
                        ->relationship('author', 'name')
                        ->label('Author')
                        ->disabled()
                        ->dehydrated(),
                    Forms\Components\TextInput::make('comment_body')
                        ->required(),
                    Forms\Components\Toggle::make('is_helpful')
                    ->label('Was this a helpful comment?'),

                ])

            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('post.author.name')
                    ->label('Post Author')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('post.title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Commenter')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment_body')
                    ->label('Comment')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_helpful')
                    ->label('Helpful')
                    ->boolean()
                    ->sortable(),

            ])
            ->filters([
                //
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComments::route('/create'),
            'edit' => Pages\EditComments::route('/{record}/edit'),
        ];
    }
}
