<?php

return [

    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],

    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],

    '~^articles/update$~' => [\MyProject\Controllers\ArticlesController::class, 'updateArticle'],

    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],

    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],

    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],

];