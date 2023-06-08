<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageNews extends ManageRecords
{
    protected static string $resource = NewsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
