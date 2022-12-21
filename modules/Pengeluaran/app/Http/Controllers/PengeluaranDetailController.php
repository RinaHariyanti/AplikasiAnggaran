<?php

namespace Modules\Pengeluaran\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pengeluaran\app\Models\DetailPengeluaran;

class PengeluaranDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('pengeluaran::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pengeluaran::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        foreach ($request->name as $index => $name) {
            DetailPengeluaran::create([
                'name' => $request->name[$index],
                'price' => $request->price[$index],
                'qty' => $request->qty[$index],
                'amount' => (int) $request->price[$index] * (int) $request->qty[$index],
                'referensi_id' => $request->ref
            ]);
        }

        return to_route('pengeluaran.index')->with('success', 'success update item');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('pengeluaran::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('pengeluaran::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, DetailPengeluaran $detail)
    {
        $detail->update([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'amount' => (int) $request->price * (int) $request->qty,
        ]);

        return back()->with('success', 'Data berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(DetailPengeluaran $detail)
    {
        $detail->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Data Berhasil Dihapus');
    }
}
