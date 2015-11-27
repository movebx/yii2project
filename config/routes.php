<?php
return
    [
        [
            'pattern' => 'home',
            'route' => 'register/index',
            'suffix' => '.zopa'
        ],
        [
            'pattern' => 'jopa/<name:\w+>',
            'route' => 'jopa/suka',
            'defaults' => ['name' => 'marina'],
        ],
    ];