<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use Illuminate\Http\Request;

class KeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keahlian = Keahlian::orderBy('id', 'DESC')->get();
        return view('admin.keahlian.index', [
            'keahlian' => $keahlian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.keahlian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'keahlian' => 'required',
        ]);

        Keahlian::create($request->all());

        return redirect()->route('admin.keahlian')
            ->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keahlian  $keahlian
     * @return \Illuminate\Http\Response
     */
    public function show(Keahlian $keahlian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keahlian  $keahlian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Keahlian::find($id);
        return view('admin.keahlian.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keahlian  $keahlian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'keahlian' => 'required',
        ]);

        Keahlian::find($id)->update($request->all());

        return redirect()->route('admin.keahlian')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keahlian  $keahlian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keahlian::find($id)->delete();

        return redirect()->route('admin.keahlian')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
