<?php

namespace Modules\Saldo\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Invoice\app\Models\PaymentRecap;
use Modules\Pengeluaran\app\Models\Referensi;
use Modules\Rt\app\Models\NamaRt;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $payment_recap = PaymentRecap::query()->sum('amount');
        $referensis = Referensi::query()->withSum('detail_pengeluaran', 'amount')->get();
        $referensi = 0;

        foreach ($referensis as $ref) {
            $referensi += $ref->detail_pengeluaran_sum_amount;
        }

        $saldo = $payment_recap - $referensi;

        return view('saldo::index', compact('saldo'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('saldo::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('saldo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('saldo::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
