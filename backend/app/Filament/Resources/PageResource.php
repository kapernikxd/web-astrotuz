<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Pages';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Page')
                ->schema([
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug (URL)')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->helperText('Например: aries или zodiac/aries'),

                    Forms\Components\Placeholder::make('url_preview')
                        ->label('Page URL')
                        ->content(function (Get $get): HtmlString {
                            $slug = $get('slug');

                            if (!$slug) {
                                return new HtmlString('<span class="text-sm text-gray-500">Сначала укажите slug.</span>');
                            }

                            $url = url($slug);

                            return new HtmlString('<a href="' . e($url) . '" target="_blank" rel="noopener noreferrer">' . e($url) . '</a>');
                        }),

                    Forms\Components\Select::make('template')
                        ->label('Template')
                        ->options([
                            'main' => 'Main (left + center + right)',
                            'blank' => 'Blank (center only)',
                            'zodiac_builder' => 'Zodiac builder',
                        ])
                        ->required()
                        ->default('main')
                        ->live(),

                    Forms\Components\TextInput::make('title')
                        ->label('Title / H1')
                        ->required(),

                    Forms\Components\RichEditor::make('content')
                        ->label('Content')
                        ->columnSpanFull(),

                    Forms\Components\Repeater::make('zodiac_blocks')
                        ->label('Zodiac blocks')
                        ->schema([
                            Forms\Components\Select::make('type')
                                ->label('Block type')
                                ->options([
                                    'hero' => 'Hero',
                                    'article' => 'Article',
                                    'compatibility' => 'Compatibility',
                                    'navigation' => 'Navigation',
                                ])
                                ->required()
                                ->reactive(),
                            Forms\Components\TextInput::make('eyebrow')
                                ->label('Eyebrow')
                                ->visible(fn (Get $get) => $get('type') === 'hero'),
                            Forms\Components\TextInput::make('title')
                                ->label('Title')
                                ->required(fn (Get $get) => $get('type') === 'hero')
                                ->visible(fn (Get $get) => $get('type') === 'hero'),
                            Forms\Components\Textarea::make('intro')
                                ->label('Intro text')
                                ->rows(4)
                                ->visible(fn (Get $get) => $get('type') === 'hero'),
                            Forms\Components\TextInput::make('heading')
                                ->label('Heading')
                                ->required(fn (Get $get) => $get('type') === 'article')
                                ->visible(fn (Get $get) => $get('type') === 'article'),
                            Forms\Components\RichEditor::make('body')
                                ->label('Body')
                                ->visible(fn (Get $get) => $get('type') === 'article')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('compatibility_title')
                                ->label('Title')
                                ->visible(fn (Get $get) => $get('type') === 'compatibility'),
                            Forms\Components\Textarea::make('description')
                                ->label('Description')
                                ->rows(3)
                                ->visible(fn (Get $get) => $get('type') === 'compatibility'),
                            Forms\Components\Repeater::make('items')
                                ->label('Compatibility items')
                                ->schema([
                                    Forms\Components\TextInput::make('label')
                                        ->label('Label')
                                        ->required(),
                                    Forms\Components\TextInput::make('meta')
                                        ->label('Meta'),
                                    Forms\Components\TextInput::make('cta')
                                        ->label('CTA'),
                                    Forms\Components\TextInput::make('url')
                                        ->label('URL')
                                        ->required(),
                                ])
                                ->visible(fn (Get $get) => $get('type') === 'compatibility')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('aria_label')
                                ->label('Aria label')
                                ->visible(fn (Get $get) => $get('type') === 'navigation'),
                            Forms\Components\Repeater::make('nav_items')
                                ->label('Navigation items')
                                ->schema([
                                    Forms\Components\TextInput::make('label')
                                        ->label('Label')
                                        ->required(),
                                    Forms\Components\TextInput::make('url')
                                        ->label('URL')
                                        ->required(),
                                    Forms\Components\Toggle::make('is_active')
                                        ->label('Active'),
                                ])
                                ->visible(fn (Get $get) => $get('type') === 'navigation')
                                ->columnSpanFull(),
                        ])
                        ->collapsed()
                        ->visible(fn (Get $get) => $get('template') === 'zodiac_builder')
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('is_published')
                        ->label('Published')
                        ->default(false),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(40),

                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),

                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->formatStateUsing(fn (Page $record): string => url($record->slug))
                    ->url(fn (Page $record): string => url($record->slug), true)
                    ->openUrlInNewTab()
                    ->toggleable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit'   => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
