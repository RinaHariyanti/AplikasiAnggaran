<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use League\CommonMark\Reference\Reference;
use Modules\Invoice\app\Models\PaymentRecap;
use Modules\Pengeluaran\app\Models\Referensi;
use Modules\Rt\app\Models\NamaRt;
use Tests\TestCase;

class RTTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_admin_dapat_melihat_list_rt()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $response = $this->actingAs($user)->get(route('rt.index'));

        $response->assertStatus(200);
    }

    public function test_admin_dapat_membuat_rt_baru()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        NamaRt::create([
            'name' => 'RT 01'
        ]);

        $response = $this->actingAs($user)->get(route('rt.index'));

        $response
        ->assertSee('RT 01');


    }

    public function test_admin_dapat_delete_rt()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $rt =   NamaRt::create([
            'name' => 'RT 01'
        ]);

        $response = $this->actingAs($user)->delete(route('rt.destroy', $rt->id));

        $response->assertStatus(302);

    }

    public function test_admin_dapat_update_pengeluaran()
    {
        $this->refreshDatabase();
        $this->seed();

        $user = User::firstwhere('email','superadmin@gmail.com');

        $rt =   NamaRt::create([
            'name' => 'RT 01'
        ]);

        $response = $this->actingAs($user)->put(route('rt.store', $rt->id));

        $response
            ->assertSee('RT 01');

    }

}
