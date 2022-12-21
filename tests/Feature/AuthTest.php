<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_user_dapat_login()
    {
        $this->refreshDatabase();
        $this->seed();

        // User::create([
        //     'email' => 'superadmin@gmail.com',
        //     'name' => 'test',
        //     'password' => bcrypt('password'),
        // ]);

        $response = $this->post(
            '/login',
            [
                'email' => 'superadmin@gmail.com',
                'password' => 'password',

            ]
        );
        $this->assertAuthenticated();
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }

    public function test_user_tidak_dapat_login_karena_email_salah()
    {
        $this->refreshDatabase();
        $this->seed();
        // User::create([
        //     'email' => 'superadmin@gmail.com',
        //     'name' => 'test',
        //     'password' => bcrypt('password'),
        // ]);

        $response = $this->post(
            '/login',
            [
                'email' => 'superadmin1@gmail.com',
                'password' => 'password',
            ]
        );
        $response->assertStatus(302);
        // $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
    }

    public function test_user_tidak_dapat_login_karena_password_salah()
    {
        // User::create([
        //     'email' => 'superadmin@gmail.com',
        //     'name' => 'test',
        //     'password' => bcrypt('password'),
        // ]);

        $this->refreshDatabase();
        $this->seed();

        $response = $this->post(
            '/login',
            [
                'email' => 'superadmin@gmail.com',
                'password' => 'password1',
            ]

        );
        $response->assertStatus(302);
        // $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
    }

    public function test_user_tidak_dapat_login_karena_semua_salah()
    {
        // User::create([
        //     'email' => 'superadmin@gmail.com',
        //     'name' => 'test',
        //     'password' => bcrypt('password'),
        // ]);

        $this->refreshDatabase();
        $this->seed();

        $response = $this->post(
            '/login',
            [
                'email' => 'superadmin1@gmail.com',
                'password' => 'password1',
            ]

        );
        $response->assertStatus(302);
        // $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
    }
    public function test_user_dapat_logout()
    {
        // $user = User::create([
        //     'email' => 'test@gmail.com',
        //     'name' => 'test',
        //     'password' => bcrypt('12345678'),
        // ]);


        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');
        $response = $this->actingAs($user)->get(route('dashboard.index'));

        $response = $this->post('/logout');
        $this->assertGuest();
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
