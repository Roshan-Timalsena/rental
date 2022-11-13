<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_login_succcessful()
    {
        $response = $this->post('/login', [
            'email'=>'roshan@gmail.com',
            'password'=>'roshanroshan',
        ]);

        $response->assertRedirect('/');
    }
    




    











    // public function test_show_login_form()
    // {
    //     $response = $this->get('/login');

    //     $response->assertStatus(200);
    // }
    
    // public function test_bike_details_page_loads()
    // {
    //     $response = $this->get('/bike/details/1');

    //     $response->assertStatus(200);
    // }

    // public function test_about_page_loads()
    // {
    //     $response = $this->get('/about');

    //     $response->assertStatus(200);
    // }

    // public function test_mechanics_page_loads()
    // {
    //     $response = $this->get('/mechanic/all');

    //     $response->assertStatus(200);
    // }

    //public function test_bikes_page_loads()
    // {
    //     $response = $this->get('/bike/all');

    //     $response->assertStatus(200);
    // }

    // public function test_home_page_loads()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
