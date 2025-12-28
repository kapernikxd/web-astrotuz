<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeftSidebarCardResource\Pages;
use App\Models\LeftSidebarCard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LeftSidebarCardResource extends Resource
{
    protected static ?string $model = LeftSidebarCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Left Sidebar';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Карточка левого сайдбара')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Заголовок')
                        ->required(),

                    Forms\Components\Textarea::make('description')
                        ->label('Описание')
                        ->rows(3),

                    Forms\Components\TextInput::make('cta_label')
                        ->label('Текст кнопки'),

                    Forms\Components\TextInput::make('url')
                        ->label('Ссылка')
                        ->helperText('Например: /natal-card')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Порядок')
                        ->numeric()
                        ->default(0),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Показывать карточку')
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

                Tables\Columns\TextColumn::make('url')
                    ->label('Ссылка')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Активна'),

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
            'index' => Pages\ListLeftSidebarCards::route('/'),
            'create' => Pages\CreateLeftSidebarCard::route('/create'),
            'edit' => Pages\EditLeftSidebarCard::route('/{record}/edit'),
        ];
    }
}
