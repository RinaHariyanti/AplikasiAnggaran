<?php

namespace Modules\Invoice\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Invoice\app\Http\Requests\InvoiceRequest;
use Modules\Invoice\app\Models\PaymentRecap;
use Modules\Rt\app\Models\NamaRt;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $invoices = PaymentRecap::query()
            ->with('nama_rt')
            ->when(!blank($request->rt), function($query) use ($request) {
                return $query->where('nama_rt_id', $request->rt);
            })
            ->when(!blank($request->search), function ($query) use ($request){
                return $query
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->orwhere('permission_name', 'like', '%' . $request->search .'%');
            })
            ->orderBy('name')
            ->paginate(10);
            $rts = NamaRt::query()->orderBy('name')->get();

            return view('invoice::index', compact('invoices', 'rts'));
        ;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('invoice::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(InvoiceRequest $request)
    {
        // PaymentRecap::create([
        //     'name' => $request['name'],
        //     'date' => $request['date'],
        //     'nominal' => $request['nominal'],
        // ]);


        PaymentRecap::create($request->validated());
        return redirect()->route('invoice.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('invoice::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('invoice::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(InvoiceRequest $request, PaymentRecap $invoice)
    {
        $invoice->update($request->validated());
        return redirect()->route('invoice.index')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(PaymentRecap $invoice)
    {
        return $invoice->delete()
            ? back()->with('success', 'Invoice Recap has been deleted successfully!')
            : back()->with('failed', 'Invoice Recap was not deleted successfully!');
    }
}
