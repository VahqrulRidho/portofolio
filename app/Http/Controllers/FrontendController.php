<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelper;
use App\Models\Contact;
use App\Models\FotoPortofolio;
use App\Models\Keahlian;
use App\Models\Pesan;
use App\Models\Portofolio;
use App\Models\Profile;
use App\Models\Resume;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::latest()->first();
        $resumes = Resume::orderBy('id', 'DESC')->get();
        $portofolios = Portofolio::orderBy('id', 'DESC')->get();
        $skill = Keahlian::orderBy('id', 'DESC')->get();
        $skillUp = Keahlian::orderBy('keahlian', 'DESC')->limit(3)->get();
        $services = Service::orderBy('id', 'DESC')->get();
        $profil = Profile::latest()->first();
        return view('frontend.index', [
            'profil' => $profil,
            'services' => $services,
            'skill' => $skill,
            'skillUp' => $skillUp,
            'portofolios' => $portofolios,
            'resumes' => $resumes,
            'contact' => $contact,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function portofolio($id)
    {
        $model = EncryptionHelper::decrypt($id);
        $portofolio = Portofolio::find($model);
        $fotos = FotoPortofolio::where('id_portofolio', $model)->get();
        return view('frontend.detail-portofolio', [
            'portofolio' => $portofolio,
            'fotos' => $fotos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pesan(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required',

        ]);

        Pesan::create($request->all());

        return redirect()->route('index.pesan')
            ->with('success', 'Pesan Berhasil Dikirim');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
