<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignUpTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_user_dapat_register()
    {
        $this->refreshDatabase();
        $this->seed();

        // User::create([
        //     'email' => 'superadmin@gmail.com',
        //     'name' => 'test',
        //     'password' => bcrypt('password'),
        // ]);

        $response = $this->post(
            '/register',
            [
                'name' => 'rinapuji',
                'email' => 'rina@gmail.com',
                'password' => 'password',
                'password_confirmation' => 'password'

            ]
        );

        // $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }

    public function test_user_salah_name(){


        $this->refreshDatabase();
        $this->seed();

        $response = $this->post(
            '/register',
            [
                'name' => '',
                'email' => 'rina@gmail.com',
                'password' => 'password',
                'password_confirmation' => 'password'

            ]
            );

            // $response->assertStatus(302);
        // $response->assertRedirect('/dashboard');
        $response->assertSessionHasErrors('name');

    }

    public function test_user_salah_email(){


        $this->refreshDatabase();
        $this->seed();

        $response = $this->post(
            '/register',
            [
                'name' => 'rina',
                'email' => '',
                'password' => 'password',
                'password_confirmation' => 'password1'

            ]
            );

            // $response->assertStatus(302);
        // $response->assertRedirect('/dashboard');
        $response->assertSessionHasErrors('email');

    }

    public function test_user_salah_password(){


        $this->refreshDatabase();
        $this->seed();

        $response = $this->post(
            '/register',
            [
                'name' => 'rina',
                'email' => 'rina@gmail.com',
                'password' => '',
                'password_confirmation' => 'password'

            ]
            );

            // $response->assertStatus(302);
        // $response->assertRedirect('/dashboard');
        $response->assertSessionHasErrors('password');

    }

    public function test_user_salah_confirm_password(){


        $this->refreshDatabase();
        $this->seed();

        $response = $this->post(
            '/register',
            [
                'name' => 'alif',
                'email' => 'alif@gmail.com',
                'password' => 'password',
                'password_confirmation' => 'password1'

            ]
            );

            // $response->assertStatus(302);
        // $response->assertRedirect('/dashboard');
        $response->assertSessionHasErrors('password');

    }

    public function test_user_kosong(){


        $this->refreshDatabase();
        $this->seed();

        $response = $this->post(
            '/register',
            [
                'name' => '',
                'email' => '',
                'password' => '',
                'password_confirmation' => ''

            ]
            );

            // $response->assertStatus(302);
        // $response->assertRedirect('/dashboard');
        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('email');
        $response->assertSessionHasErrors('password');
        $response->assertSessionHasErrors('password');

    }

}
