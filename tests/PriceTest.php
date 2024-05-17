<?php

declare(strict_types=1);

use App\Application\Checkout;
use App\Application\ProductService;
use App\Domain\Contracts\CollectionContract;
use App\Domain\Entities\Product;
use App\Domain\Entities\SpecialProduct;
use App\Domain\Exceptions\ProductException;
use App\Domain\ValueObject\ProductQuantityPriceRule;
use App\Infrastructure\Collection\Collection;
use Illuminate\Container\Container;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class PriceTest extends TestCase
{
    public function setUp(): void
    {
        Container::getInstance()->bind(CollectionContract::class, Collection::class);
    }

    public function testTotals(): void
    {
        $this->assertEquals(0, $this->price(''));
        $this->assertEquals(50, $this->price('A'));
        $this->assertEquals(80, $this->price('AB'));
        $this->assertEquals(115, $this->price('CDBA'));

        $this->assertEquals(100, $this->price('AA'));
        $this->assertEquals(130, $this->price('AAA'));
        $this->assertEquals(180, $this->price('AAAA'));
        $this->assertEquals(230, $this->price('AAAAA'));
        $this->assertEquals(260, $this->price('AAAAAA'));

        $this->assertEquals(160, $this->price('AAAB'));
        $this->assertEquals(175, $this->price('AAABB'));
        $this->assertEquals(190, $this->price('AAABBD'));
        $this->assertEquals(190, $this->price('DABABA'));
    }

    public function testIncremental(): void
    {
        $co = $this->initCheckout();

        $this->assertEquals(0, $co->total());
        $co->scan('A');
        $this->assertEquals(50, $co->total());
        $co->scan('B');
        $this->assertEquals(80, $co->total());
        $co->scan('A');
        $this->assertEquals(130, $co->total());
        $co->scan('A');
        $this->assertEquals(160, $co->total());
        $co->scan('B');
        $this->assertEquals(175, $co->total());
    }

    public function testThrowExceptionIfProductNotFound(): void
    {
        $co = $this->initCheckout();

        $this->expectException(ProductException::class);

        $productName = 'F';

        $message = sprintf('Product with name "%s" not found.', $productName);

        $this->expectExceptionMessage($message);

        $this->expectExceptionCode(404);

        $co->scan($productName);
    }

    private function price(string $goods): float
    {
        $co = $this->initCheckout();

        $items = str_split($goods);

        foreach ($items as $item) {
            $co->scan($item);
        }

        return $co->total();
    }

    private function initCheckout(): Checkout
    {
        $products = Container::getInstance()->makeWith(CollectionContract::class, [
            'items' => [
                Container::getInstance()->makeWith(SpecialProduct::class, ['name' => 'A', 'price' => 50, 'priceRule' => new ProductQuantityPriceRule(3, 130)]),
                Container::getInstance()->makeWith(SpecialProduct::class, ['name' => 'B', 'price' => 30, 'priceRule' => new ProductQuantityPriceRule(2, 45)]),
                Container::getInstance()->makeWith(Product::class, ['name' => 'C', 'price' => 20]),
                Container::getInstance()->makeWith(Product::class, ['name' => 'D', 'price' => 15]),
            ],
        ]);

        $productService = Container::getInstance()->makeWith(ProductService::class, ['products' => $products]);

        return Container::getInstance()->makeWith(Checkout::class, ['productService' => $productService]);
    }
}
