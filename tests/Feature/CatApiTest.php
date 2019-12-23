<?php

namespace Tests\Feature;

use App\Http\Controllers\CatsApiController;
use Tests\TestCase;

class CatApiTest extends TestCase
{

    public function testApiUrl()
    {
        $apiCatsController = new CatsApiController();
        $apiCatsController->getUrl();

        $response = $apiCatsController->getUrl();

        $response->assertStatus(200);
    }
}
