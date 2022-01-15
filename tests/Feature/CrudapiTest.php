<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Jwalbeli\Crudapi\Tests\TestCase;

class CrudapiTest extends TestCase
{
    use withFaker;
    /**
     *
     * @test
     * @return void
     */
    public function it_index()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);
    }

    /**
     *
     * @test
     * @return void
     */
    public function it_store()
    {
        $response = $this->post('/api/posts', [
                        'title' => $this->faker->words(5, true),
                        'body' => $this->faker->words(20, true),
                        'userId' => $this->faker->randomNumber(1),
                    ]);

        $response->assertStatus(200);
    }

    /**
     *
     * @test
     * @return void
     */
    public function it_update()
    {
        $response = $this->patch('/api/posts/'.$this->faker->randomNumber(1), [
                        'title' => $this->faker->words(5, true),
                        'body' => $this->faker->words(20, true),
                        'userId' => $this->faker->randomNumber(1),
                    ]);

        $response->assertStatus(200);
    }


    /**
     *
     * @test
     * @return void
     */
    public function it_delete()
    {
        $response = $this->delete('/api/posts/'.$this->faker->randomNumber(1));

        $response->assertStatus(200);
    }
}
