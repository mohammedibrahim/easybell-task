<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Domain;

enum ProductTypeValues: string
{
    public const string SIMPLE = 'simple';

    public const string SPECIAL = 'special';
}
