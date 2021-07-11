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

    function test_lista_libros() 
    {
    $this->get('/libro')
    ->assertStatus(200)
    ->assertSee('libro');
    }

    function test_crear_libros() 
    {
    $this->get('/libro/create')
    ->assertStatus(200)
    ->assertSee('libro');
    }

    function test_editar_libros($id) 
    {
    $this->get('/libro/{id}/edit')
    ->assertStatus(200)
    ->assertSee('libro');
    }
    function test_crear_nuevo_libro_form()
    {
        $this->post('/libro/create', [
            'nombre' => 'Libro_nuevo',
            'npagina' => 6,
            'resumen' => 'este es un resumen',
            'edicion' => 10,
            'precio' => 4000,
            'autor' => 'Ana',
            'tipo_libro' => 1
        ]);


        $this->assertDatabaseHas('libros', [
            'nombre' => 'Libro_nuevo',
            'npagina' => 6,
            'resumen' => 'este es un resumen',
            'edicion' => 10,
            'precio' => 4000,
            'autor' => 'Ana',
            'tipo_librof' => 1
        ]);
    }

}
