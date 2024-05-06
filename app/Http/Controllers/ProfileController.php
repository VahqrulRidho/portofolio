<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::orderBy('id', 'DESC')->get();
        return view('admin.profile.index', [
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create');
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
            'tgl_lahir' => 'required',
            'usia' => 'required',
            'pekerjaan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072'
        ]);

        $nama = $request->input('nama');
        $tgl_lahir = $request->input('tgl_lahir');
        $usia = $request->input('usia');
        $pekerjaan = $request->input('pekerjaan');
        $deskripsi = $request->input('deskripsi');
        $foto = $request->file('foto');

        $foto->storeAs('/gambar/profile/', $foto->hashName());

        Profile::create([
            'nama' => $nama,
            'usia' => $usia,
            'tgl_lahir' => $tgl_lahir,
            'pekerjaan' => $pekerjaan,
            'deskripsi' => $deskripsi,
            'foto' => $foto->hashName(),
        ]);

        return redirect()->route('admin.profile')
            ->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Profile::find($id);
        return view('admin.profile.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Profile::find($id);
        return view('admin.profile.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data = Profile::find($id);
        $this->validate($request, [
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'usia' => 'required',
            'pekerjaan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:3072'
        ]);

        $nama = $request->input('nama');
        $tgl_lahir = $request->input('tgl_lahir');
        $usia = $request->input('usia');
        $pekerjaan = $request->input('pekerjaan');
        $deskripsi = $request->input('deskripsi');
        $foto = $request->file('foto');

        if ($foto) {
            //upload image
            $foto->storeAs('/gambar/profile/', $foto->hashName());

            // Hapus Gambar lama
            Storage::exists('/gambar/profile/' . $data->foto);
            Storage::delete('/gambar/profile/' . $data->foto);

            $data->update([
                'nama' => $nama,
                'usia' => $usia,
                'tgl_lahir' => $tgl_lahir,
                'pekerjaan' => $pekerjaan,
                'deskripsi' => $deskripsi,
                'foto' => $foto->hashName(),
            ]);
        } else {
            $data->update([
                'nama' => $nama,
                'usia' => $usia,
                'tgl_lahir' => $tgl_lahir,
                'pekerjaan' => $pekerjaan,
                'deskripsi' => $deskripsi,
            ]);
        }

        return redirect()->route('admin.profile')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Profile::find($id);

        // Hapus Gambar lama
        Storage::exists('/gambar/profile/' . $data->foto);
        Storage::delete('/gambar/profile/' . $data->foto);

        // Hapus Data dari database
        $data->delete();

        return redirect()->route('admin.profile')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
