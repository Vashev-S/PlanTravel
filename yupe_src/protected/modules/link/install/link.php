<?php

return [
    'module' => [
        'class' => 'application.modules.link.LinkModule',
    ],
    'import' => [
        'application.modules.link.models.*'
    ],
    'rules' => [
        '/link/<action:\w+>'=>'link/link/<action>',
        '/link/redirect/<code:\w+>'=>'link/link/redirect',
        '/redirect/<code:\w+>'=>'link/link/redirect',
    ],
];
