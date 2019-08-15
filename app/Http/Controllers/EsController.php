<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;

class EsController extends Controller
{
    //测试一下 es
    public function index()
    {
        //初始化elastic search

        $host = [
            '127.0.0.1:9200'
        ];
        $client = ClientBuilder::create()->setHosts($host)->build();
        $params = [
            'index' => 'product',
            'body' => [
                'settings' => [
                    'number_of_shards' => 3,
                    'number_of_replicas' => 1
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
        dd($response);
    }
}
