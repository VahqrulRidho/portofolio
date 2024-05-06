<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\ResumeDetail;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resume = Resume::orderBy('id', 'DESC')->get();
        return view('admin.resume.index', [
            'resume' => $resume
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resume.create');
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
        ]);

        Resume::create($request->all());

        return redirect()->route('admin.resume')
            ->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Resume::find($id);
        return view('admin.resume.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        Resume::find($id)->update($request->all());

        return redirect()->route('admin.resume')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ResumeDetail::where('id_resume', $id)->get();
        if ($data) {
            $data = ResumeDetail::where('id_resume', $id)->delete();
        }
        Resume::find($id)->delete();

        return redirect()->route('admin.resume')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
