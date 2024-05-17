<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\Contracts\SpecialProductRuleAware;
use App\Domain\PriceRule\PriceRuleFactory;
use App\Domain\ValueObject\ProductQuantityPriceRule;

class SpecialProduct extends Product implements SpecialProductRuleAware
{
    public function __construct(
        string $name,
        float $price,
        PriceRuleFactory $priceRuleFactory,
        protected ProductQuantityPriceRule $priceRule,
    ) {
        parent::__construct($name, $price, $priceRuleFactory);
    }

    public function getPriceRule(): ProductQuantityPriceRule
    {
        return $this->priceRule;
    }
}
