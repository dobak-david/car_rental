<?php

namespace Tests\Feature;

use App\Models\Cars;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class carsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Cars::factory()->create(['marka' => 'marka1', 'tipus' => 'tipus1', 'napAr' => 1000, 'kep' => null]);
        Cars::factory()->create(['marka' => 'marka2', 'tipus' => 'tipus2', 'napAr' => 1000, 'kep' => null]);
        Cars::factory()->create(['marka' => 'marka3', 'tipus' => 'tipus3', 'napAr' => 1000, 'kep' => null]);
    }


    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/admin/cars');
        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
    }

    /**
     * A basic feature test example.
     */
    public function test_delete_car(): void
    {
        $c = Cars::all()->where('id','=',1);
        $response = $this->delete('/admin/cars/{' . $c . '}');
        $response->assertStatus(200);
    }
}
