<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProgramTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_program_letrehozas(): void
    {
        $response = $this->post('http://localhost:8000/api/program-hozzadasa', [
            'program_nev' => 'csokoládé öntés',
            'program_leiras' => 'szuper izgalmas programleírás',
            'program_ar' => '2000',
            'program_datum' => '20200102',
            'foglalas_kezdete' => '20191201',
            'foglalas_vege' => '20200101',
            'programtipus_id' => '2'
        ]);

        $response->assertStatus(201);
    }

}
