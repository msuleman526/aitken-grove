<?php

namespace App\Filament\Resources\Homes;

use App\Filament\Resources\Homes\HomeResource\Pages;
use App\Models\Home;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class HomeResource extends Resource
{
    protected static ?string $model = Home::class;

    // Use methods (not properties) for nav config to avoid typed property clashes.
    public static function getNavigationGroup(): ?string
    {
        return 'Site Content';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-home';
    }

    public static function getNavigationLabel(): string
    {
        return 'Home Page';
    }

    /** Schema-based form signature */
    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
                ->label('Homepage Title')
                ->required()
                ->maxLength(150),

            FileUpload::make('cover_image')
                ->label('Cover Image')
                ->image()
                ->disk('public')
                ->directory('home')
                ->imageEditor()
                ->imageResizeMode('cover')
                ->openable()
                ->downloadable(),
        ]);
    }

    /** Tables API is still Table $table → Table in v4 */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Cover'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Updated'),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    // No bulk delete for home page
                ]),
            ]); // no bulk deletes
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomes::route('/'),
            'create' => Pages\CreateHome::route('/create'),
            'edit'  => Pages\EditHome::route('/{record}/edit'),
        ];
    }
}
