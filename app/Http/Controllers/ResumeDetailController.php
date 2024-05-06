<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\ResumeDetail;
use Illuminate\Http\Request;

class ResumeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailResume = ResumeDetail::orderBy('id', 'DESC')->get();
        return view('admin.resume-detail.index', [
            'detailResume' => $detailResume
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Resume::all();
        return view('admin.resume-detail.create', [
            'data' => $data
        ]);
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
            'id_resume' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        ResumeDetail::create($request->all());

        return redirect()->route('admin.detail-resume')
            ->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResumeDetail  $resumeDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ResumeDetail::find($id);
        return view('admin.resume-detail.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResumeDetail  $resumeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resume = Resume::all();
        $data = ResumeDetail::find($id);
        return view('admin.resume-detail.edit', [
            'data' => $data,
            'resume' => $resume
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResumeDetail  $resumeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'id_resume' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        ResumeDetail::find($id)->update($request->all());

        return redirect()->route('admin.detail-resume')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResumeDetail  $resumeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ResumeDetail::find($id)->delete();
        return redirect()->route('admin.detail-resume')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
