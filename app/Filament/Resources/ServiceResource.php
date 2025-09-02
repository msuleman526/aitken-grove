<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
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

            Section::make('Why Choose Section')
                ->schema([
                    TextInput::make('why_choose_json.title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->placeholder('Why Choose Our Family Health Care?')
                        ->helperText('Main title for the why choose section.'),

                    Textarea::make('why_choose_json.description')
                        ->label('Section Description')
                        ->rows(3)
                        ->maxLength(500)
                        ->placeholder('We understand that every family deserves care that is reliable, personal, and convenient. Here\'s why families trust us:')
                        ->helperText('Description text that appears below the title.'),

                    FileUpload::make('why_choose_json.main_image')
                        ->label('Main Image (Left)')
                        ->image()
                        ->disk('public')
                        ->directory('services/why-choose')
                        ->maxSize(2048)
                        ->helperText('Large image displayed on the left side (recommended: 305x435px).'),

                    FileUpload::make('why_choose_json.top_right_image')
                        ->label('Top Right Image')
                        ->image()
                        ->disk('public')
                        ->directory('services/why-choose')
                        ->maxSize(2048)
                        ->helperText('Top image on the right side (recommended: 305x207px).'),

                    FileUpload::make('why_choose_json.bottom_right_image')
                        ->label('Bottom Right Image')
                        ->image()
                        ->disk('public')
                        ->directory('services/why-choose')
                        ->maxSize(2048)
                        ->helperText('Bottom image on the right side (recommended: 305x207px).'),

                    Repeater::make('why_choose_json.points')
                        ->label('Why Choose Points')
                        ->schema([
                            TextInput::make('text')
                                ->label('Point Text')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('Personalized care plans for every family member')
                                ->helperText('A key benefit or feature point.'),
                        ])
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? null)
                        ->collapsed()
                        ->minItems(1)
                        ->maxItems(10)
                        ->defaultItems(5)
                        ->addActionLabel('Add Point')
                        ->helperText('Key points that highlight why customers should choose this service.'),
                ])->columns(2),

            Section::make('Questions Section')
                ->schema([
                    TextInput::make('questions_json.title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->placeholder('Frequently Asked Questions')
                        ->helperText('Main title for the questions section.'),

                    Repeater::make('questions_json.items')
                        ->label('Questions & Answers')
                        ->schema([
                            Textarea::make('question')
                                ->label('Question')
                                ->required()
                                ->rows(2)
                                ->maxLength(500)
                                ->placeholder('What ages do you provide family health care for?')
                                ->helperText('The question text.'),

                            Textarea::make('answer')
                                ->label('Answer')
                                ->required()
                                ->rows(3)
                                ->maxLength(1000)
                                ->placeholder('We provide comprehensive health care for all ages, from newborns to seniors. Our family-focused approach ensures everyone in your family receives appropriate care.')
                                ->helperText('The answer text that will be displayed when the question is expanded.'),
                        ])
                        ->itemLabel(fn (array $state): ?string => $state['question'] ?? null)
                        ->collapsed()
                        ->minItems(1)
                        ->maxItems(20)
                        ->defaultItems(5)
                        ->addActionLabel('Add Question')
                        ->helperText('Frequently asked questions for this service.'),
                ])->columns(1),

            Section::make('Service CTA Section')
                ->schema([
                    TextInput::make('consultant_json.title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->placeholder('Start Your Family\'s Care Today')
                        ->helperText('Main title for the service call-to-action section.'),

                    Textarea::make('consultant_json.description')
                        ->label('Section Description')
                        ->rows(3)
                        ->maxLength(500)
                        ->placeholder('Take the first step toward better family health. Our dedicated doctors are here to provide personalized care and guidance.')
                        ->helperText('Description text that appears below the title.'),
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
