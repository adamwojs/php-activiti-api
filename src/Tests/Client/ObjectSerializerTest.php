<?php

namespace Activiti\Tests\Client;

use Activiti\Client\ObjectSerializer;
use Activiti\Tests\Bar;
use Activiti\Tests\Foo;
use PHPUnit\Framework\TestCase;

class ObjectSerializerTest extends TestCase
{
    /**
     * @dataProvider serializeDataProvider
     */
    public function testSerialize($data, $expected)
    {
        $serializer = new ObjectSerializer();
        $actual = $serializer->serialize($data);

        $this->assertSame($expected, $actual);
    }

    public function serializeDataProvider()
    {
        return [
            [
                null,
                null
            ],
            [
                1,
                1
            ],
            [
                1.0,
                1.0
            ],
            [
                'Some string',
                'Some string'
            ],
            [
                ['A', 'B', 'C'],
                ['A', 'B', 'C']
            ],
            [
                [
                    new Foo('1'),
                    new Foo('2'),
                    new Foo('3')
                ],
                [
                    [
                        'a' => '1',
                        'b' => null
                    ],
                    [
                        'a' => '2',
                        'b' => null
                    ],
                    [
                        'a' => '3',
                        'b' => null
                    ]
                ]
            ],
            [
                new \DateTime('2013-04-15T00:42:12Z'),
                '2013-04-15T00:42:12Z'
            ],
            [
                new Foo('A', 'B'),
                ['a' => 'A', 'b' => 'B']
            ],
            [
                new Bar('A', 'B', 'C'),
                ['a' => 'A', 'b' => 'B', 'c' => 'C']
            ],
            [
                new Foo(new Foo('A')),
                ['a' => ['a' => 'A', 'b' => null], 'b' => null]
            ]
        ];
    }
}
