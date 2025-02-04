<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JegyTest extends TestCase
{
    public function test_osszes_foglalas_mektekintese(): void
    {
        $response = $this->get('http://localhost:8000/api/osszes-foglalas');

        $response->assertStatus(200);
    }

    public function test_osszes_foglalas_adott_programra(): void
    {
        $response = $this->get('http://localhost:8000/api/osszes-foglalas-adott-programra/1');

        $response->assertStatus(200);
    }

    public function test_sajat_jegyeim(): void
    {
        $response = $this->get('http://localhost:8000/api/sajat-jegyeim/admin');

        $response->assertStatus(200);
    }

    public function test_sajat_aktiv_jegyeim(): void
    {
        $response = $this->get('http://localhost:8000/api/sajat-aktiv-jegyeim/admin');

        $response->assertStatus(200);
    }

    public function test_foglalas_felvetele(): void
    {
        $response = $this->post('http://localhost:8000/api/foglalas_hozzaadasa',[
            'felhasznalo_nev' => 'admin',
            'program_id' => '1',
            'db' => '4'
        ]);

        $response->assertStatus(500);
    }

    public function test_foglalas_felvetele_rossz_felhasznalonevvel(): void
    {
        $response = $this->post('http://localhost:8000/api/foglalas_hozzaadasa',[
            'felhasznalo_nev' => 'nemletezik',
            'program_id' => '2',
            'db' => '7'
        ]);

        $response->assertStatus(500);
    }
}
