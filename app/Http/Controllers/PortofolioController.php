<?php

namespace App\Http\Controllers;

use App\Models\FotoPortofolio;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portofolio = Portofolio::orderBy('id', 'DESC')->get();
        return view('admin.portofolio.index', [
            'portofolio' => $portofolio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portofolio.create');
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
            'judul' => 'required',
            'kategori' => 'required',
            'klien' => 'required',
            'tgl_project' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $judul = $request->input('judul');
        $kategori = $request->input('kategori');
        $klien = $request->input('klien');
        $tgl_project = $request->input('tgl_project');
        $deskripsi = $request->input('deskripsi');

        $data = Portofolio::create([
            'judul' => $judul,
            'kategori' => $kategori,
            'klien' => $klien,
            'tgl_project' => $tgl_project,
            'deskripsi' => $deskripsi
        ]);

        if ($data) {
            foreach ($request->file('foto') as $foto) {
                $foto->storeAs('/gambar/portofolio/', $foto->hashName());
                FotoPortofolio::create([
                    'id_portofolio' => $data->id,
                    'foto' => $foto->hashName(),
                ]);
            }
        }


        return redirect()->route('admin.portofolio')
            ->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Portofolio::find($id);
        $foto = FotoPortofolio::where('id_portofolio', $id)->get();
        return view('admin.portofolio.show', [
            'data' => $data,
            'foto' => $foto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Portofolio::find($id);
        return view('admin.portofolio.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'kategori' => 'required',
            'klien' => 'required',
            'tgl_project' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable',
            'foto.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $judul = $request->input('judul');
        $kategori = $request->input('kategori');
        $klien = $request->input('klien');
        $tgl_project = $request->input('tgl_project');
        $deskripsi = $request->input('deskripsi');

        $data = Portofolio::find($id)->update([
            'judul' => $judul,
            'kategori' => $kategori,
            'klien' => $klien,
            'tgl_project' => $tgl_project,
            'deskripsi' => $deskripsi
        ]);

        if ($data) {
            if ($request->file('foto')) {
                $cariFoto = FotoPortofolio::where('id_portofolio', $id)->get();
                // dd($cariFoto);
                foreach ($cariFoto as $item) {
                    // dd($item);
                    Storage::exists('/gambar/portofolio/' . $item->foto);
                    Storage::delete('/gambar/portofolio/' . $item->foto);
                    FotoPortofolio::find($item->id)->delete();
                }
                foreach ($request->file('foto') as $foto) {
                    $foto->storeAs('/gambar/portofolio/', $foto->hashName());
                    FotoPortofolio::create([
                        'id_portofolio' => $id,
                        'foto' => $foto->hashName(),
                    ]);
                }
            }
        }
        return redirect()->route('admin.portofolio')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cariFoto = FotoPortofolio::where('id_portofolio', $id)->get();
        foreach ($cariFoto as $item) {
            Storage::exists('/gambar/portofolio/' . $item->foto);
            Storage::delete('/gambar/portofolio/' . $item->foto);
            FotoPortofolio::find($item->id)->delete();
        }
        Portofolio::find($id)->delete();
        return redirect()->route('admin.portofolio')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
