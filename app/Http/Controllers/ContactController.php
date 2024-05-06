<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Pesan;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::orderBy('id', 'DESC')->get();
        return view('admin.contact.index', [
            'contact' => $contact
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
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
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contact')
            ->with('success', 'Data Berhasil Disimpan');
    }

    public function pesan()
    {
        $pesan = Pesan::orderBy('id', 'DESC')->get();
        return view('admin.contact.pesan', [
            'pesan' => $pesan
        ]);
    }

    public function hapus($id)
    {
        Pesan::find($id)->delete();

        return redirect()->route('admin.pesan')
            ->with('success', 'Data Berhasil Dihapus');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Contact::find($id);
        return view('admin.contact.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        Contact::find($id)->update($request->all());

        return redirect()->route('admin.contact')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('admin.contact')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
