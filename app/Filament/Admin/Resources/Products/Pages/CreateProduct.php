<?php

namespace App\Filament\Admin\Resources\Products\Pages;

use App\Filament\Admin\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    //untuk menghilangkan button
    protected function getFormActions(): array
    {
    return [];
    }
    
    //untuk kembali ke halaman index
    protected function getRedirectUrl(): string
    {
    return $this->getResource()::getUrl('index');
    }
}
