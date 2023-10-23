<?php

namespace App\Filament\Resources\OrganizationsResource\Pages;

use App\Filament\Resources\OrganizationsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganizations extends CreateRecord
{
    protected static string $resource = OrganizationsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
