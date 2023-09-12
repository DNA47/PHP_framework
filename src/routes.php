<?php

return [

    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],

    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],

    '~^articles/update$~' => [\MyProject\Controllers\ArticlesController::class, 'updateArticle'],

    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],

    '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\ArticlesController::class, 'comments'],

    '~^articles/(\d+)/comments/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'updateComments'],

    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],

    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],

    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
    
    '~^users/logout$~' => [\MyProject\Controllers\UsersController::class, 'logout'],

    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],

];