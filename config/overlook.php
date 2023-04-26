<?php

use App\Filament\Resources\JenisKelasResource;

return [
    'includes' => [
        // App\Filament\Resources\UserResource::class,
        App\Filament\Resources\JenisKelasResource::class,
        App\Filament\Resources\JadwalResource::class,
        App\Filament\Resources\SupirResource::class,

        // App\Filament\Resources\Blog\AuthorResource::class,
    ],
    'excludes' => [
        // App\Filament\Resources\Blog\AuthorResource::class,
        \Phpsa\FilamentAuthentication\Resources\RoleResource::class,
        \Phpsa\FilamentAuthentication\Resources\PermissionResource::class,
    ],
];
