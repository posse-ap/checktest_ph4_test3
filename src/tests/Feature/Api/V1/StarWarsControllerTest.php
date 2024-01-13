<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;


class StarWarsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
    }

    public function test_return_value_when_request_success()
    {
        $response = $this->get('/api/api/v1/baconipsum');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
            'title' => 'A New Hope',
            'release_date' => '1977-05-25',
        ]);
    }
}
