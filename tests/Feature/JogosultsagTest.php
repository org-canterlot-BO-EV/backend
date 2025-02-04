<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JogosultsagTest extends TestCase
{
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_minden_jogosultsag(): void
    {
        $response = $this->get('http://localhost:8000/api/osszes-jogosultsag');

        $response->assertStatus(200);
    }


    public function test_post_jogosultsag(): void
    {
        $response = $this->post('http://localhost:8000/api/uj-jogosultsag', [
            'jogosultsag_tipus'=>'pub',
            'elnevezes'=>'publikáló'
        ]);

        $response->assertStatus(201);
    }

    public function test_patch_jogosultsag(): void
    {
        $response = $this->post('http://localhost:8000/api/jogosultsag-valtoztatas/pub', [
        ]);

        $response->assertStatus(405);
    }

    public function test_delete_jogosultsag(): void 
    {
        $response = $this->delete('http://localhost:8000/api/jogosultsag-torlese/pub');
        $response->assertStatus(200);
    }
}
