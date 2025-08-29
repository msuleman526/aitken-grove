<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Filters\Filter;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-document-text';
    }
    
    public static function getNavigationGroup(): ?string
    {
        return 'Content Management';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Basic Information')
                ->schema([
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('subtitle')
                        ->maxLength(500),
                ]),
            
            Section::make('Hero Section')
                ->schema([
                    TextInput::make('hero_title')
                        ->label('Hero Title')
                        ->maxLength(255)
                        ->placeholder('Your Health Our Priority'),
                    Textarea::make('hero_description')
                        ->label('Hero Description')
                        ->rows(3)
                        ->placeholder('From routine check-ups to specialized treatments, we provide quality healthcare in a caring and supportive environment.'),
                    TextInput::make('hero_cta_label')
                        ->label('CTA Button Text')
                        ->maxLength(255)
                        ->placeholder('Book a Consultant'),
                    Repeater::make('hero_stats')
                        ->label('Statistics Boxes')
                        ->schema([
                            TextInput::make('number')
                                ->required()
                                ->placeholder('30+'),
                            TextInput::make('label')
                                ->required()
                                ->placeholder('Tests Available'),
                            Select::make('icon')
                                ->options([
                                    'box1' => 'Tests Available (Box 1)',
                                    'box2' => 'Doctors Available (Box 2)',
                                    'box3' => 'Patients Treated (Box 3)',
                                ])
                                ->required(),
                        ])
                        ->columns(3)
                        ->defaultItems(3)
                        ->maxItems(3)
                        ->minItems(3),
                ]),
            
            Section::make('Contact Information')
                ->description('Information displayed in the consultant bar below the hero section')
                ->schema([
                    TextInput::make('opening_hours')
                        ->label('Opening Hours Text')
                        ->helperText('Text displayed next to the clock icon in the consultant bar')
                        ->placeholder('Mon-Fri 9AM-6PM')
                        ->maxLength(255),
                    TextInput::make('contact_phone')
                        ->label('Phone Number')
                        ->helperText('Phone number displayed in the consultant bar')
                        ->tel()
                        ->placeholder('+1 (555) 123-4567')
                        ->maxLength(255),
                    TextInput::make('contact_email')
                        ->label('Email Address')
                        ->helperText('Email address displayed in the consultant bar')
                        ->email()
                        ->placeholder('info@aitkengrove.com')
                        ->maxLength(255),
                ]),
            
            Section::make('SEO & Meta')
                ->schema([
                    TextInput::make('meta_title')
                        ->label('Meta Title')
                        ->maxLength(60),
                    Textarea::make('meta_description')
                        ->label('Meta Description')
                        ->maxLength(155),
                    DateTimePicker::make('published_at')
                        ->label('Publish Date'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('published_at')
                    ->label('Published')
                    ->boolean()
                    ->getStateUsing(fn ($record) => $record->published_at !== null),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Filter::make('published')
                    ->query(fn ($query) => $query->whereNotNull('published_at')),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
