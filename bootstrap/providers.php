<?php

return [
    App\Providers\AppServiceProvider::class,
    Modules\Auth\Providers\AuthServiceProvider::class,
    Modules\Panel\Providers\PanelServiceProvider::class,
    Modules\User\Providers\UserServiceProvider::class,
    Modules\Category\Providers\CategoryServiceProvider::class,
];
