<?php

namespace Tests\Unit;

use App\Product;
use Elasticsearch\ClientBuilder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        Product::get()->map(function ($item){
            dd($item);
        });
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'my_index',
            'body' => [
                'settings' => [
                    'number_of_shards' => 2,
                    'number_of_replicas' => 0
                ]
            ]
        ];

        $response = $client->indices()->create($params);
        dd($response);

        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id',
            'body' => ['testField' => 'abc']
        ];

        $response = $client->index($params);
        dump($response);
        $this->assertTrue(true);
    }


    public function testEsInit()
    {
        $host = [
            '127.0.0.1:9200'
        ];
        //创建索引
        $client = ClientBuilder::create()->setHosts($host)->build();
        $params = [
            'index' => 'es_products',
            'body' => [
                'settings' => [
                    'number_of_shards' => 3,
                    'number_of_replicas' => 1,
                    'analysis'=>[
                        'analyzer'=>[
                            'ik'=>[
                                'tokenizer'=>'ik_max_word'
                            ]
                        ]
                    ]
                ],
                'mappings' => [
                    '_source' => [
                        'enabled' => true
                    ],
                    'properties' => [
                        'title' => [
                            'type' => 'text',
                            'analyzer' => 'ik_max_word',
                        ],
                        'desc' => [
                            'type' => 'text',
                            'analyzer' => 'ik_max_word',
                        ]
                    ]
                ]
            ]
        ];

        $response = $client->indices()->create($params);
        dump($response);
        $this->assertTrue(true);

        Product::get()->map(function ($item){
            $item->title = $item->title;
            $item->save();
        });
        $this->assertTrue(true);

    }

    public function testEsIndex()
    {
        Product::get()->map(function ($item){
            $item->title = $item->title;
            $item->save();
        });
        $this->assertTrue(true);
    }

    public function testAaa()
    {
        dd(env('APP_ENV'));
    }
}
