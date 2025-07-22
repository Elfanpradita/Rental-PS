<?php

namespace App\Filament\Admin\Resources\RukoResource\Pages;

use App\Filament\Admin\Resources\RukoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRukos extends ListRecords
{
    protected static string $resource = RukoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
