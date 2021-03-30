<?php

namespace Extiverse\Tests\Requests;

use Extiverse\Api\JsonApi\Collection;
use Extiverse\Api\JsonApi\Item;
use Extiverse\Api\Requests\Extension;
use Extiverse\Tests\Test;

class ExtensionTest extends Test
{
    /**
     * @test
     * @covers \Extiverse\Api\Requests\Extension::get
     */
    function get()
    {
        $item = (new Extension)->get('flarum/tags');

        $this->assertTrue($item instanceof Item);
        $this->assertEquals('flarum/tags', $item->name);
    }

    /**
     * @test
     * @covers \Extiverse\Api\Requests\Extension::index
     */
    function index()
    {
        $collection = (new Extension)->index();

        $this->assertTrue($collection instanceof Collection);
        $this->assertTrue($collection->isNotEmpty());


        $collection = (new Extension)->index(['include' => 'plans', 'filter[is]' => 'subscribed']);
        $this->assertTrue($collection->isNotEmpty());
    }
}