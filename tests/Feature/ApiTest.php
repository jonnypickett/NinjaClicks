<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
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
}
