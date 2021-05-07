<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LibroTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    function it_creates_a_new_libro()
    {
        $this->post('/libro/', [
            'name' => 'Ana Carolina Aristizabal',
            'email' => 'ana@yop.net',
            'password' => 'Ana345***'
        ]);


        $this->assertDatabaseHas('libros', [
            'name' => 'Ana Carolina Aristizabal',
            'email' => 'ana@yop.net',
            'password' => 'Ana345***'
        ]);
    }

}
