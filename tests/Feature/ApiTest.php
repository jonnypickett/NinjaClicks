<?php

namespace Tests\Feature;

use App\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test graphQL request with no request data
     *
     * @return void
     */
    public function testNoQuery()
    {
        $response = $this->json('GET', '/api/graphql');

        $response
            ->assertStatus(200)
            ->assertExactJson([]);
    }

    /**
     * Test graphQL empty query
     *
     * @return void
     */
    public function testEmptyQuery()
    {
        $response = $this->json('GET', '/api/graphql', ['query' => '']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => null,
                'errors' => [],
            ]);
    }

    /**
     * Test graphQL clicks query
     *
     * @return void
     */
    public function testClicksQuery()
    {
        $response = $this->json('GET', '/api/graphql', ['query' => '
            {
                clicks {
                    id
                }
            }']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'clicks' => [],
                ],
            ]);
    }

    /**
     * Test graphQL providers query
     *
     * @return void
     */
    public function testProvidersQuery()
    {
        $provider = factory(Provider::class)->create();

        $response = $this->json('GET', '/api/graphql', ['query' => '
            {
                providers(id: '.$provider->id.' ) {
                    id
                    name
                    display_name
                    hex_color
                    clicks {
                        id
                    }
                }
            }']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'providers' => [
                        [
                            'id' => $provider->id,
                            'name' => $provider->name,
                            'display_name' => $provider->display_name,
                            'hex_color' => $provider->hex_color,
                            'clicks' => []
                        ]
                    ],
                ],
            ]);
    }
}
