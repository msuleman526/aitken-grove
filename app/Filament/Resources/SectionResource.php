<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Models\Section;
use App\Models\Page;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section as FormSection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-squares-2x2';
    }
    
    public static function getNavigationGroup(): ?string
    {
        return 'Content Management';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            FormSection::make('Basic Information')
                ->schema([
                    Select::make('page_id')
                        ->label('Page')
                        ->options(Page::pluck('title', 'id'))
                        ->required()
                        ->searchable(),
                    Select::make('key')
                        ->label('Section Type')
                        ->options([
                            'caring' => 'Caring Section',
                            'specialised_treatment' => 'Specialised Treatment',
                            'trust' => 'Trust Section',
                            'specialists' => 'Specialists Section',
                            'firststep' => 'First Step Section',
                            'features' => 'Features Section',
                            'testimonials' => 'Testimonials Section',
                            'pricing' => 'Pricing Section',
                            'faq' => 'FAQ Section',
                            'cta_banner' => 'CTA Banner',
                        ])
                        ->required()
                        ->reactive(),
                    TextInput::make('heading')
                        ->label('Section Heading')
                        ->maxLength(255),
                    Textarea::make('subheading')
                        ->label('Section Subheading')
                        ->maxLength(500)
                        ->rows(2),
                    TextInput::make('position')
                        ->label('Position')
                        ->numeric()
                        ->default(0)
                        ->helperText('Order of section on the page'),
                    Toggle::make('is_visible')
                        ->label('Visible')
                        ->default(true),
                ]),

            FormSection::make('Caring Section Content')
                ->schema([
                    TextInput::make('content_json.title')
                        ->label('Title')
                        ->maxLength(255)
                        ->placeholder('Caring for You, Every Step of the Way')
                        ->helperText('Main title with Cal Sans font, 40px, #E62D5B color'),
                    Textarea::make('content_json.description')
                        ->label('Description')
                        ->rows(3)
                        ->placeholder('We provide trusted healthcare for all ages. Our team combines experience, compassion, and modern treatments to keep you and your family healthy.')
                        ->helperText('Description with Inter font, 18px, black color'),
                    Repeater::make('content_json.points')
                        ->label('Care Points')
                        ->schema([
                            TextInput::make('text')
                                ->label('Point Text')
                                ->required()
                                ->placeholder('Care for children, adults & seniors')
                                ->maxLength(255),
                        ])
                        ->defaultItems(5)
                        ->maxItems(10)
                        ->helperText('Points with checkmark icons, Inter font 18px medium weight')
                        ->addActionLabel('Add Care Point'),
                    FileUpload::make('content_json.main_image')
                        ->label('Main Image (Left Column)')
                        ->disk('public')
                        ->directory('caring-images')
                        ->image()
                        ->imageResizeMode('contain')
                        ->imageCropAspectRatio('305:435')
                        ->maxSize(20480)
                        ->helperText('Recommended size: 305x435px. Max file size: 20MB')  
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    FileUpload::make('content_json.top_right_image')
                        ->label('Top Right Image')
                        ->disk('public')
                        ->directory('caring-images')
                        ->image()
                        ->imageResizeMode('contain')
                        ->imageCropAspectRatio('305:208')
                        ->maxSize(20480)
                        ->helperText('Recommended size: 305x207.5px. Max file size: 20MB')
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    FileUpload::make('content_json.bottom_right_image')
                        ->label('Bottom Right Image')
                        ->disk('public')
                        ->directory('caring-images')
                        ->image()
                        ->imageResizeMode('contain')
                        ->imageCropAspectRatio('305:208')
                        ->maxSize(20480)
                        ->helperText('Recommended size: 305x207.5px. Max file size: 20MB')
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                ])
                ->visible(fn ($get) => $get('key') === 'caring'),

            FormSection::make('Specialised Treatment Section Content')
                ->schema([
                    TextInput::make('content_json.title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->placeholder('Our Specialised Treatment Services')
                        ->helperText('Main section title with Cal Sans font, 40px'),
                    Textarea::make('content_json.description')
                        ->label('Section Description')
                        ->rows(3)
                        ->placeholder('We offer comprehensive specialized care across multiple medical disciplines...')
                        ->helperText('Section description with Inter font, 18px'),
                    Repeater::make('content_json.cards')
                        ->label('Treatment Cards')
                        ->schema([
                            TextInput::make('title')
                                ->label('Card Title')
                                ->required()
                                ->placeholder('Family Health Care')
                                ->maxLength(255)
                                ->helperText('Card title with Cal Sans font, 18px'),
                            Textarea::make('description')
                                ->label('Card Description')
                                ->required()
                                ->rows(3)
                                ->placeholder('Complete care for kids, adults, and seniors.')
                                ->maxLength(500)
                                ->helperText('Card description with Inter font, 14px'),
                            TextInput::make('icon')
                                ->label('Icon Filename')
                                ->required()
                                ->placeholder('care1.png')
                                ->helperText('Icon filename from public/icons/treatment/ (care1.png to care14.png)')
                                ->maxLength(50),
                        ])
                        ->defaultItems(14)
                        ->maxItems(14)
                        ->minItems(1)
                        ->orderColumn('sort')
                        ->helperText('Treatment service cards - 4 per row on desktop, responsive on mobile')
                        ->addActionLabel('Add Treatment Card'),
                ])
                ->visible(fn ($get) => $get('key') === 'specialised_treatment'),

            FormSection::make('Trust Section Content')
                ->schema([
                    TextInput::make('content_json.title')
                        ->label('Title')
                        ->maxLength(255)
                        ->placeholder('Care You Can Trust')
                        ->helperText('Main title - "Care You" (black), "Can Trust" (primary color)'),
                    Textarea::make('content_json.description')
                        ->label('Description')
                        ->rows(3)
                        ->placeholder('At Aitken Grove Medical Center, we believe healthcare should be more than just treatment — it should be compassion, trust, and excellence combined. That\'s why thousands of patients choose us every year.')
                        ->helperText('Description with Inter font, 18px, black color. This section is created by default during installation.'),
                    Repeater::make('content_json.points')
                        ->label('Trust Points')
                        ->schema([
                            TextInput::make('title')
                                ->label('Point Title')
                                ->required()
                                ->placeholder('100+ Specialist Doctors')
                                ->maxLength(255)
                                ->helperText('Point title with Cal Sans font, 18px'),
                            Textarea::make('description')
                                ->label('Point Description')
                                ->required()
                                ->rows(2)
                                ->placeholder('Expert doctors across multiple specialties for complete care.')
                                ->maxLength(500)
                                ->helperText('Point description with Inter font, 16px'),
                            TextInput::make('icon')
                                ->label('Icon Filename')
                                ->required()
                                ->placeholder('trust1.png')
                                ->helperText('Icon filename from public/icons/trust/ (trust1.png to trust5.png, 60x60px)')
                                ->maxLength(50),
                        ])
                        ->defaultItems(5)
                        ->maxItems(10)
                        ->minItems(1)
                        ->helperText('Trust points with icons, titles, and descriptions')
                        ->addActionLabel('Add Trust Point'),
                ])
                ->visible(fn ($get) => $get('key') === 'trust'),

            FormSection::make('Specialists Section Content')
                ->schema([
                    TextInput::make('content_json.title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->placeholder('Meet Our Specialists')
                        ->helperText('Title with "Meet Our" (black) and "Specialists" (primary #E62D5B)'),
                    Textarea::make('content_json.description')
                        ->label('Section Description')
                        ->rows(2)
                        ->placeholder('Trusted, experienced doctors dedicated to your care.')
                        ->helperText('Description with Inter font, 18px, center aligned'),
                    Repeater::make('content_json.specialists')
                        ->label('Specialists')
                        ->schema([
                            TextInput::make('name')
                                ->label('Doctor Name')
                                ->required()
                                ->placeholder('Dr. Salman Raza')
                                ->maxLength(255)
                                ->helperText('Doctor name with Cal Sans font, 18px medium'),
                            TextInput::make('role')
                                ->label('Specialization/Role')
                                ->required()
                                ->placeholder('Senior Orthopedic Surgeon')
                                ->maxLength(255)
                                ->helperText('Role/specialization with Inter font, 14px'),
                            FileUpload::make('image')
                                ->label('Doctor Image')
                                ->disk('public')
                                ->directory('specialists')
                                ->image()
                                ->imageResizeMode('cover')
                                ->imageCropAspectRatio('300:350')
                                ->maxSize(20480)
                                ->helperText('Recommended size: 300x350px. Max file size: 20MB')
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                        ])
                        ->defaultItems(5)
                        ->maxItems(20)
                        ->minItems(1)
                        ->orderColumn('sort')
                        ->helperText('Specialist cards with images, names, and roles. Cards scroll horizontally.')
                        ->addActionLabel('Add Specialist'),
                ])
                ->visible(fn ($get) => $get('key') === 'specialists'),

            FormSection::make('First Step Section Content')
                ->schema([
                    TextInput::make('content_json.title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->placeholder('Take the First Step Toward Better Health')
                        ->helperText('Main title with Cal Sans font, 40px, white color'),
                    Textarea::make('content_json.description')
                        ->label('Section Description')
                        ->rows(3)
                        ->placeholder('Book your appointment with our trusted doctors today and get the right care without long waits.')
                        ->helperText('Description with Inter font, 18px, white color'),
                    TextInput::make('content_json.cta_label')
                        ->label('Button Text')
                        ->required()
                        ->placeholder('Book a Consultant')
                        ->helperText('Button text, 14px font size'),
                    TextInput::make('content_json.cta_url')
                        ->label('Button URL')
                        ->required()
                        ->url()
                        ->placeholder('#')
                        ->helperText('URL for the button action'),
                ])
                ->visible(fn ($get) => $get('key') === 'firststep'),

            FormSection::make('Features Section Content')
                ->schema([
                    Select::make('content_json.layout')
                        ->label('Layout')
                        ->options([
                            '3col' => '3 Columns',
                            '4col' => '4 Columns',
                            '2col' => '2 Columns',
                        ])
                        ->default('3col'),
                    Repeater::make('content_json.items')
                        ->label('Feature Items')
                        ->schema([
                            TextInput::make('title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('description')
                                ->required()
                                ->rows(2),
                            TextInput::make('icon')
                                ->label('Icon Name')
                                ->placeholder('feature-icon-1'),
                        ])
                        ->defaultItems(3)
                        ->addActionLabel('Add Feature'),
                ])
                ->visible(fn ($get) => $get('key') === 'features'),

            FormSection::make('Testimonials Section Content')
                ->schema([
                    TextInput::make('content_json.title')
                        ->label('Main Title')
                        ->maxLength(255)
                        ->placeholder('Trusted by Thousands')
                        ->helperText('First part of title - will be displayed in black color'),
                    TextInput::make('content_json.subtitle')
                        ->label('Subtitle')
                        ->maxLength(255)
                        ->placeholder('Loved by Patients')
                        ->helperText('Second part of title - will be displayed in primary color (#E62D5B)'),
                    Repeater::make('content_json.items')
                        ->label('Testimonial Comments')
                        ->schema([
                            Textarea::make('quote')
                                ->label('Comment')
                                ->required()
                                ->rows(4)
                                ->placeholder('The doctors here are amazing! They took great care of me and explained everything clearly...')
                                ->helperText('Patient testimonial comment - Inter font, 16px, black color'),
                            TextInput::make('author')
                                ->label('Patient Name')
                                ->required()
                                ->placeholder('Sarah Johnson')
                                ->helperText('Patient name - Inter font, 16px, 600 weight'),
                            TextInput::make('role')
                                ->label('Person Description')
                                ->placeholder('Patient')
                                ->helperText('Optional role/description - Inter font, 14px, gray color'),
                        ])
                        ->defaultItems(3)
                        ->maxItems(20)
                        ->minItems(1)
                        ->orderColumn('sort')
                        ->helperText('Patient testimonials in cards (500x280px) with horizontal scroll navigation')
                        ->addActionLabel('Add Testimonial Comment'),
                ])
                ->visible(fn ($get) => $get('key') === 'testimonials'),

            FormSection::make('FAQ Section Content')
                ->schema([
                    Repeater::make('content_json.items')
                        ->label('FAQ Items')
                        ->schema([
                            TextInput::make('question')
                                ->label('Question')
                                ->required(),
                            Textarea::make('answer')
                                ->label('Answer')
                                ->required()
                                ->rows(3),
                        ])
                        ->defaultItems(5)
                        ->addActionLabel('Add FAQ'),
                ])
                ->visible(fn ($get) => $get('key') === 'faq'),

            FormSection::make('CTA Banner Content')
                ->schema([
                    TextInput::make('content_json.heading')
                        ->label('Heading')
                        ->required()
                        ->placeholder('Ready to Get Started?'),
                    TextInput::make('content_json.subheading')
                        ->label('Subheading')
                        ->placeholder('Join thousands of satisfied customers'),
                    TextInput::make('content_json.cta_label')
                        ->label('Button Text')
                        ->required()
                        ->placeholder('Get Started Today'),
                    TextInput::make('content_json.cta_url')
                        ->label('Button URL')
                        ->required()
                        ->url()
                        ->placeholder('https://example.com/signup'),
                ])
                ->visible(fn ($get) => $get('key') === 'cta_banner'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page.title')
                    ->label('Page')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('key')
                    ->label('Section Type')
                    ->colors([
                        'primary' => 'caring',
                        'purple' => 'specialised_treatment',
                        'indigo' => 'trust',
                        'orange' => 'specialists',
                        'pink' => 'firststep',
                        'success' => 'features',
                        'warning' => 'testimonials',
                        'danger' => 'pricing',
                        'secondary' => 'faq',
                        'info' => 'cta_banner',
                    ]),
                Tables\Columns\TextColumn::make('heading')
                    ->label('Heading')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->label('Visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('key')
                    ->label('Section Type')
                    ->options([
                        'caring' => 'Caring Section',
                        'specialised_treatment' => 'Specialised Treatment',
                        'trust' => 'Trust Section',
                        'specialists' => 'Specialists Section',
                        'firststep' => 'First Step Section',
                        'features' => 'Features Section',
                        'testimonials' => 'Testimonials Section',
                        'pricing' => 'Pricing Section',
                        'faq' => 'FAQ Section',
                        'cta_banner' => 'CTA Banner',
                    ]),
                SelectFilter::make('page_id')
                    ->label('Page')
                    ->options(Page::pluck('title', 'id')),
                Filter::make('visible')
                    ->query(fn ($query) => $query->where('is_visible', true)),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('position')
            ->defaultSort('position');
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}
