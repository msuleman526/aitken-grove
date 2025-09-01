<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Builder;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-squares-2x2';
    }

    public static function getNavigationLabel(): string
    {
        return 'Services';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Services';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Service Details')
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(Service::class, 'slug', ignoreRecord: true),

                    Textarea::make('description')
                        ->required()
                        ->rows(4)
                        ->maxLength(1000),

                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),

                    TextInput::make('sort_order')
                        ->label('Sort Order')
                        ->numeric()
                        ->default(0)
                        ->minValue(0),
                ])->columns(2),

            Section::make('About Service Section')
                ->schema([
                    TextInput::make('button_text')
                        ->label('Button Text')
                        ->maxLength(255)
                        ->placeholder('About Our Family Health Care')
                        ->helperText('Text to display on the gradient button (non-clickable).'),

                    Textarea::make('about_title')
                        ->label('About Title')
                        ->rows(4)
                        ->maxLength(1000)
                        ->placeholder('We believe good health begins at home. Our family health care services are designed to provide compassionate, continuous, and reliable care...')
                        ->helperText('Title text with smart color highlighting based on keywords.'),
                ])->columns(1),

            Section::make('SEO & Meta Data')
                ->schema([
                    TextInput::make('meta_title')
                        ->maxLength(60)
                        ->hint('Recommended: 50-60 characters')
                        ->helperText('If left empty, the service title will be used.'),

                    Textarea::make('meta_description')
                        ->maxLength(160)
                        ->rows(3)
                        ->hint('Recommended: 150-160 characters')
                        ->helperText('If left empty, the service description will be used.'),

                    TextInput::make('canonical_url')
                        ->url()
                        ->maxLength(255)
                        ->helperText('If left empty, the service URL will be used automatically.'),

                    Select::make('meta_robots')
                        ->options([
                            'index, follow' => 'Index, Follow',
                            'noindex, nofollow' => 'No Index, No Follow',
                            'index, nofollow' => 'Index, No Follow',
                            'noindex, follow' => 'No Index, Follow',
                        ])
                        ->default('index, follow'),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->color('gray'),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All services')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
            ])
            ->actions([
                ViewAction::make()
                    ->url(fn (Service $record): string => url("/service/{$record->slug}"))
                    ->openUrlInNewTab(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc');
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
