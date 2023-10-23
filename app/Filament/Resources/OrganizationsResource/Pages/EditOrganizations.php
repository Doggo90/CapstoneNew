<?php

namespace App\Filament\Resources\OrganizationsResource\Pages;

use App\Filament\Resources\OrganizationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganizations extends EditRecord
{
    protected static string $resource = OrganizationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
