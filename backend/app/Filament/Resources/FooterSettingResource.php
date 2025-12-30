<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterSettingResource\Pages;
use App\Models\FooterSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FooterSettingResource extends Resource
{
    protected static ?string $model = FooterSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Footer';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Футер сайта')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Название')
                        ->required(),

                    Forms\Components\Textarea::make('description')
                        ->label('Описание')
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\Repeater::make('primary_links')
                        ->label('Основные ссылки')
                        ->schema([
                            Forms\Components\TextInput::make('label')
                                ->label('Название')
                                ->required(),
                            Forms\Components\TextInput::make('url')
                                ->label('Ссылка')
                                ->required()
                                ->maxLength(255),
                        ])
                        ->columns(2)
                        ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                        ->columnSpanFull(),

                    Forms\Components\Repeater::make('secondary_links')
                        ->label('Дополнительные ссылки')
                        ->schema([
                            Forms\Components\TextInput::make('label')
                                ->label('Название')
                                ->required(),
                            Forms\Components\TextInput::make('url')
                                ->label('Ссылка')
                                ->required()
                                ->maxLength(255),
                        ])
                        ->columns(2)
                        ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                        ->columnSpanFull(),

                    Forms\Components\Repeater::make('social_links')
                        ->label('Социальные ссылки')
                        ->schema([
                            Forms\Components\TextInput::make('label')
                                ->label('Название')
                                ->required(),
                            Forms\Components\TextInput::make('url')
                                ->label('Ссылка')
                                ->required()
                                ->maxLength(255),
                        ])
                        ->columns(2)
                        ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('copyright_line')
                        ->label('Строка копирайта')
                        ->helperText('Например: © 2024 Astrotuz. Все права защищены.')
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Показывать футер')
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

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Активен'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('updated_at', 'desc')
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
            'index' => Pages\ListFooterSettings::route('/'),
            'create' => Pages\CreateFooterSetting::route('/create'),
            'edit' => Pages\EditFooterSetting::route('/{record}/edit'),
        ];
    }
}
