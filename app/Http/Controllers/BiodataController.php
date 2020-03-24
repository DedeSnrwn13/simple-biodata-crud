<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata = Biodata::orderBy('id', 'DESC')->paginate(5);

        return view('biodata/index', compact('biodata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biodata/create');
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
            'nama' => 'min: 2',
            'alamat' => 'required'
        ]);
        Biodata::create($request->all());
        return redirect()->route('biodata.index')->with('pesan', 'Berhasil memasukkan data!');
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
        $biodata = Biodata::findOrFail($id);
        return view('biodata.edit', compact('biodata'));
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
            'nama' => 'min: 2',
            'alamat' => 'required'
        ]);

        $biodata = Biodata::findOrFail($id);
        $biodata->update($request->all());

        return redirect()->route('biodata.index')->with('pesan', 'Berhasil mengupdate data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);
        $biodata->delete();

        return redirect()->route('biodata.index')->with('pesan', 'Berhasil menghapus data!');
    }

    public function cari(Request $request)
    {
        // return $request->all();

        $cari = $request->cari;
        $biodata = Biodata::where('nama', $cari)->paginate(5);
        return view('biodata.index', compact('biodata'));
    }
}
