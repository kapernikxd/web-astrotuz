<?php

namespace App\Filament\Resources\LeftSidebarCardResource\Pages;

use App\Filament\Resources\LeftSidebarCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLeftSidebarCards extends ListRecords
{
    protected static string $resource = LeftSidebarCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
