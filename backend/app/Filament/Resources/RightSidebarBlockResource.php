<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RightSidebarBlockResource\Pages;
use App\Models\RightSidebarBlock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RightSidebarBlockResource extends Resource
{
    protected static ?string $model = RightSidebarBlock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Right Sidebar';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Right Sidebar Block')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Заголовок блока')
                        ->required(),

                    Forms\Components\Select::make('type')
                        ->label('Тип блока')
                        ->options([
                            'content' => 'Контент',
                            'zodiac_grid' => 'Зодиакальная сетка',
                        ])
                        ->required()
                        ->live()
                        ->default('content'),

                    Forms\Components\RichEditor::make('content')
                        ->label('Контент')
                        ->columnSpanFull()
                        ->visible(fn (Forms\Get $get) => $get('type') === 'content')
                        ->required(fn (Forms\Get $get) => $get('type') === 'content'),

                    Forms\Components\Repeater::make('zodiac_items')
                        ->label('Элементы зодиака')
                        ->schema([
                            Forms\Components\TextInput::make('key')
                                ->label('Ключ (slug)')
                                ->helperText('Например: aries, taurus')
                                ->required(),

                            Forms\Components\TextInput::make('label')
                                ->label('Название')
                                ->required(),

                            Forms\Components\TextInput::make('url')
                                ->label('Ссылка')
                                ->helperText('Например: /horoscope/aries')
                                ->maxLength(255)
                                ->required(),

                            Forms\Components\Textarea::make('svg')
                                ->label('SVG иконка')
                                ->rows(6)
                                ->helperText('Вставьте SVG как текст')
                                ->required(),
                        ])
                        ->columnSpanFull()
                        ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                        ->visible(fn (Forms\Get $get) => $get('type') === 'zodiac_grid')
                        ->required(fn (Forms\Get $get) => $get('type') === 'zodiac_grid'),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Порядок')
                        ->numeric()
                        ->default(0),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Показывать блок')
                        ->default(true),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Тип'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Активен'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
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
            'index' => Pages\ListRightSidebarBlocks::route('/'),
            'create' => Pages\CreateRightSidebarBlock::route('/create'),
            'edit' => Pages\EditRightSidebarBlock::route('/{record}/edit'),
        ];
    }
}
