<?php

use PHPUnit\Framework\TestCase;
use Chop\Finder1;
use Chop\Finder2;
use Chop\Finder3;
use Chop\FinderInterface;

final class FinderTest extends TestCase
{
    /** @test */
    public function Finder1()
    {
        $this->_finderTest(new Finder1);
    }

    /** @test */
    public function Finder2()
    {
        $this->_finderTest(new Finder2);
    }

    /** @test */
    public function Finder3()
    {
        $this->_finderTest(new Finder3);
    }

    protected function _finderTest(FinderInterface $finder)
    {
        $this->assertEquals(-1, $finder->find(3, []));
        $this->assertEquals(-1, $finder->find(3, [1]));
        $this->assertEquals(0, $finder->find(1, [1]));

        $this->assertEquals(0, $finder->find(1, [1, 3, 5]));
        $this->assertEquals(1, $finder->find(3, [1, 3, 5]));
        $this->assertEquals(2, $finder->find(5, [1, 3, 5]));
        $this->assertEquals(-1, $finder->find(0, [1, 3, 5]));
        $this->assertEquals(-1, $finder->find(2, [1, 3, 5]));
        $this->assertEquals(-1, $finder->find(4, [1, 3, 5]));
        $this->assertEquals(-1, $finder->find(6, [1, 3, 5]));

        $this->assertEquals(0, $finder->find(1, [1, 3, 5, 7]));
        $this->assertEquals(1, $finder->find(3, [1, 3, 5, 7]));
        $this->assertEquals(2, $finder->find(5, [1, 3, 5, 7]));
        $this->assertEquals(3, $finder->find(7, [1, 3, 5, 7]));
        $this->assertEquals(-1, $finder->find(0, [1, 3, 5, 7]));
        $this->assertEquals(-1, $finder->find(2, [1, 3, 5, 7]));
        $this->assertEquals(-1, $finder->find(4, [1, 3, 5, 7]));
        $this->assertEquals(-1, $finder->find(6, [1, 3, 5, 7]));
        $this->assertEquals(-1, $finder->find(8, [1, 3, 5, 7]));
    }
}
