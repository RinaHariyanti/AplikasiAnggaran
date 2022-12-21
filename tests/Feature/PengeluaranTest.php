<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use League\CommonMark\Reference\Reference;
use Modules\Invoice\app\Models\PaymentRecap;
use Modules\Pengeluaran\app\Models\Referensi;
use Tests\TestCase;

class PengeluaranTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_admin_dapat_melihat_pengeluaran()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $response = $this->actingAs($user)->get(route('pengeluaran.index'));

        $response->assertStatus(200);
    }

    public function test_admin_dapat_membuat_pengeluaran()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        Referensi::create([
            'tgl_transaksi' => '2022/03/01',
            'nota' => 'nota.jpg',
            'nama_rt_id' => '1'
        ]);

        $response = $this->actingAs($user)->get(route('pengeluaran.index'));

        $response
        ->assertSee('nota.jpg')
        ->assertSee('1');

    }

    public function test_admin_dapat_delete_pengeluaran()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $pengeluaran = Referensi::create([
            'tgl_transaksi' => '2022/03/01',
            'nota' => 'nota.jpg',
            'nama_rt_id' => '1'
        ]);

        $response = $this->actingAs($user)->delete(route('pengeluaran.destroy', $pengeluaran->id));

        $response->assertStatus(302);

    }

    public function test_admin_dapat_update_pengeluaran()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $pengeluaran = Referensi::create([
            'tgl_transaksi' => '2022/03/01',
            'nota' => 'nota.jpg',
            'nama_rt_id' => '1'
        ]);

        $response = $this->actingAs($user)->put(route('pengeluaran.store', $pengeluaran->id));

        $response
            ->assertSee('nota.jpg')
            ->assertSee('1');
    }

}
