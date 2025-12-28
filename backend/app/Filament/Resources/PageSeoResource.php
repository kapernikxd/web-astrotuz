<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSeoResource\Pages;
use App\Models\Page;
use App\Models\PageSeo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class PageSeoResource extends Resource
{
    protected static ?string $model = PageSeo::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';
    protected static ?string $navigationLabel = 'SEO Pages';
    protected static ?string $navigationGroup = 'SEO';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('SEO')
                ->schema([
                    Forms\Components\Select::make('page_id')
                        ->label('Page URL')
                        ->relationship('page', 'slug')
                        ->getOptionLabelFromRecordUsing(fn (Page $record): string => $record->slug)
                        ->searchable()
                        ->preload()
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\Placeholder::make('url_preview')
                        ->label('Preview URL')
                        ->content(function (Get $get): HtmlString {
                            $pageId = $get('page_id');

                            if (!$pageId) {
                                return new HtmlString('<span class="text-sm text-gray-500">Выберите страницу.</span>');
                            }

                            $page = Page::find($pageId);

                            if (!$page) {
                                return new HtmlString('<span class="text-sm text-gray-500">Страница не найдена.</span>');
                            }

                            $url = url($page->slug);

                            return new HtmlString('<a href="' . e($url) . '" target="_blank" rel="noopener noreferrer">' . e($url) . '</a>');
                        }),

                    Forms\Components\TextInput::make('meta_title')
                        ->label('Meta title')
                        ->maxLength(255),

                    Forms\Components\Textarea::make('meta_description')
                        ->label('Meta description')
                        ->rows(3)
                        ->maxLength(255),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page.slug')
                    ->label('Slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('page.title')
                    ->label('Title')
                    ->limit(40)
                    ->searchable(),

                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->formatStateUsing(fn (PageSeo $record): string => url($record->page->slug))
                    ->url(fn (PageSeo $record): string => url($record->page->slug), true)
                    ->openUrlInNewTab()
                    ->toggleable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('meta_title')
                    ->label('Meta title')
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
            'index'  => Pages\ListPageSeos::route('/'),
            'create' => Pages\CreatePageSeo::route('/create'),
            'edit'   => Pages\EditPageSeo::route('/{record}/edit'),
        ];
    }
}
