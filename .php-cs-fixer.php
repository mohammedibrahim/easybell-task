<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__.'/app',
        __DIR__.'/tests',
    ])
;

$config = (new Config())
    ->setFinder($finder)
    ->setRules([
        '@PSR1' => true,
        '@PSR2' => true,
        '@PhpCsFixer' => true,
        'ordered_class_elements' => true,
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
        ],
        'declare_strict_types' => true,
    ])
    ->setRiskyAllowed(true)
    ->setLineEnding("\n")
;

$config->setCacheFile('.php_cs.cache');

return $config;
