<?php

namespace Modules\Rt\app\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rt\app\Models\NamaRt;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $NamaRt = NamaRt::query()
            ->when(!blank($request->search), function($query) use ($request){
                return $query
                    ->where('name','like','%' . $request->search . '%')
                    ->orwhere('permission_name' , 'like' , '%' . $request->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);

        return view('rt::index', compact('NamaRt'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('rt::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        NamaRt::create([
            'name' => $request['name'],
        ]);
        return redirect()->route('rt.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('rt::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('rt::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, NamaRt $Rt)
    {
        $Rt->update([
            'name' => $request['name'],
        ]);
        return redirect()->route('rt.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(NamaRt $Rt)
    {
        return $Rt->delete()
            ? back()->with('success', 'Invoice Recap has been deleted successfully!')
            : back()->with('failed', 'Invoice Recap was not deleted successfully!');
    }
}
