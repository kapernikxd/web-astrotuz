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

                    Forms\Components\TextInput::make('template')
                        ->required()
                        ->default('default'),

                    Forms\Components\TextInput::make('title')
                        ->label('Title / H1')
                        ->required(),

                    Forms\Components\TextInput::make('meta_title')
                        ->label('Meta title')
                        ->maxLength(255),

                    Forms\Components\Textarea::make('meta_description')
                        ->label('Meta description')
                        ->rows(3)
                        ->maxLength(255),

                    Forms\Components\RichEditor::make('content')
                        ->label('Content')
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
