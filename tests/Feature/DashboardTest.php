<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_admin_dapat_melihat_saldo_setiap_rt()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $response = $this->actingAs($user)->get(route('dashboard.index'));
        $response->assertStatus(200);
    }
}
