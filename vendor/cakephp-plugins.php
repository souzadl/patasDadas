<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'BRFilter' => $baseDir . '/vendor/brenoroosevelt/cakephp-filter/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];