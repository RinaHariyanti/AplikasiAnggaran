<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Invoice\app\Models\PaymentRecap;
use Tests\TestCase;

class PemasukanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_admin_dapat_melihat_pemasukan()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        PaymentRecap::create([
            'name' => 'Pembayaran',
            'amount' => '150000',
            'date' => '2022/03/01',
            'nama_rt_id' => '1'
        ]);

        $response = $this->actingAs($user)->get(route('invoice.index'));

        $response->assertStatus(500);
    }

    public function test_admin_dapat_membuat_pemasukan()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        PaymentRecap::create([
            'name' => 'Pembayaran',
            'amount' => '150000',
            'date' => '2022/03/01',
            'nama_rt_id' => '1'
        ]);

        $response = $this->actingAs($user)->get(route('invoice.index'));

        $response
            ->assertSee('Pembayaran')
            ->assertSee('150000');
    }

    public function test_admin_dapat_delete_pemasukan()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $payment = PaymentRecap::create([
            'name' => 'Pembayaran',
            'amount' => '150000',
            'date' => '2022/03/01',
            'nama_rt_id' => '1'
        ]);

        $response = $this->actingAs($user)->delete(route('invoice.destroy', $payment->id));

        $response->assertStatus(302);

    }

    public function test_admin_dapat_update_pemasukan()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $payment = PaymentRecap::create([
            'name' => 'Pembayaran',
            'amount' => '150000',
            'date' => '2022/03/01',
            'nama_rt_id' => '1'
        ]);

        $response = $this->actingAs($user)->put(route('invoice.store', $payment->id));

        $response
            ->assertSee('Pembayaran')
            ->assertSee('150000');
    }

}
