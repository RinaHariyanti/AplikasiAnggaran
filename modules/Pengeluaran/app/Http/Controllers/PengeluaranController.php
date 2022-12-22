<?php

namespace Modules\Pengeluaran\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pengeluaran\app\Http\Requests\PengeluaranRequest;
use Modules\Pengeluaran\app\Models\DetailPengeluaran;
use Modules\Pengeluaran\app\Models\Referensi;
use Modules\Rt\app\Models\NamaRt;
use ImageKit\ImageKit;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $pengeluarans = Referensi::query()
            ->with('nama_rt')
            ->when(!blank($request->rt), function ($query) use ($request) {
                return $query->where('nama_rt_id', $request->rt);
            })
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('tgl_transaksi', 'like', '%' . $request->search . '%')
                    ->orwhere('permission_name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('tgl_transaksi')
            ->with('detail_pengeluaran')
            ->withSum('detail_pengeluaran', 'amount')
            ->paginate(10);

        $rts = NamaRt::query()->orderBy('name')->get();

        return view('pengeluaran::index', compact('pengeluarans', 'rts'));
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
        $nota = uniqid() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('assets/img/'), $nota);

        $public_key = env('IMAGEKIT_KEY');
            $your_private_key = env('IMAGEKIT_PRIVATE_KEY');
            $url_end_point = env('IMAGEKIT_ENDPOINT');

            $imageKit = new ImageKit(
                $public_key,
                $your_private_key,
                $url_end_point
            );

            // Upload Image - Binary
            $uploadFile = $imageKit->uploadFile([
                "file" => fopen(public_path('assets/img') . '/' . $nota, "r"),
                "fileName" => $nota
            ]);

        Referensi::create([
            'tgl_transaksi' => $request['date'],
            'nota' => $uploadFile->result->url,
            'nama_rt_id' => $request->nama_rt
        ]);
        return redirect()->route('pengeluaran.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function store_detail(Request $request)
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
    public function update(Request $request, Referensi $pengeluaran)
    {
        $nota = uniqid() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('assets/img/'), $nota);

        $pengeluaran->update([
            'tgl_transaksi' => $request['date'],
            'nota' => $nota,
        ]);
        return redirect()->route('pengeluaran.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Referensi $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Data Berhasil Dihapus');
    }
}
