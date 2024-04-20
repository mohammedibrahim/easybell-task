<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class PriceTest extends TestCase
{
    public function price($goods)
    {
        $co = new CheckOut(RULES);
        $items = str_split($goods);
        foreach ($items as $item) {
            $co->scan($item);
        }

        return $co->total();
    }

    public function aatestTotals()
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

    public function aatestIncremental()
    {
        $co = new CheckOut(RULES);
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

    public function testA()
    {
        $this->assertTrue(true);
    }
}
