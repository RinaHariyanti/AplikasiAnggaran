<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use League\CommonMark\Reference\Reference;
use Modules\Invoice\app\Models\PaymentRecap;
use Modules\Pengeluaran\app\Models\Referensi;
use Tests\TestCase;

class SaldoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_admin_dapat_melihat_saldo()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $response = $this->actingAs($user)->get(route('saldo.index'));

        $response->assertStatus(200);
    }

}
