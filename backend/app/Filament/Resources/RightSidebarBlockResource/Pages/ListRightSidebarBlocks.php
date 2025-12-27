<?php

namespace App\Filament\Resources\RightSidebarBlockResource\Pages;

use App\Filament\Resources\RightSidebarBlockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRightSidebarBlocks extends ListRecords
{
    protected static string $resource = RightSidebarBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
