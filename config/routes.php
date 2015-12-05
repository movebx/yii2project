<?php
return
    [
        [
            'pattern' => 'admin/delete/<id:\d+>',
            'route' => 'admin/cpanel/delete',
            //'defaults' => ['name' => 'marina'],
        ],
        [
            'pattern' => 'ajax',
            'route' => 'default/ajax',
        ],
        [
            'pattern' => 'portfolio',
            'route' => 'default/index',
        ],
        [
            'pattern' => 'contact',
            'route' => 'default/contact',
        ],
    ];