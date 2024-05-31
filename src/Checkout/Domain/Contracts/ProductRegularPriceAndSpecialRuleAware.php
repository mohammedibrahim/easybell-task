<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Domain\Contracts;

interface ProductRegularPriceAndSpecialRuleAware extends ProductRegularPriceAware, SpecialProductRuleAware {}
