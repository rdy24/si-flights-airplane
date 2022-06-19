<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaneRequest;
use App\Models\Airline;
use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;


class PlaneController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plane::all();
        return view('pages.dashboard.plane.index', compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airlines = Airline::all();
        return view('pages.dashboard.plane.create', compact('airlines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaneRequest $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['gambar'] = $request->file('gambar')->store('gambar-pesawat', 'public');
        Plane::create($data);

        return redirect()->route('dashboard.plane.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plane $plane)
    {
        return view('pages.dashboard.plane.show', compact('plane'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plane $plane)
    {
        $airlines = Airline::all();
        return view('pages.dashboard.plane.edit', compact('plane', 'airlines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaneRequest $request, Plane $plane)
    {
        $data = $request->all();
        if($request->kode_pesawat != $plane->kode_pesawat){
            $this->validate($request, [
                'kode_pesawat' => 'required|unique:planes',
            ]);
        }
        
        if($request->hasFile('gambar')){
            $data['gambar'] = $request->file('gambar')->store('gambar-pesawat', 'public');
            
            if($plane->gambar) {
                Storage::disk('public')->delete($plane->gambar);
            }
        } 
        

        $plane->update($data);
        return redirect()->route('dashboard.plane.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plane $plane)
    {
        $plane->delete();
        return redirect()->route('dashboard.plane.index')->with('success', 'Data berhasil dihapus');
    }

    public function show_restore()
    {
        $planes = Plane::onlyTrashed()->get();
        return view('pages.dashboard.plane.trash', compact('planes'));
    }

    public function restore($id)
    {   
        $plane = Plane::onlyTrashed()->where('id',$id);
        $plane->restore();
        return redirect()->route('dashboard.trash.plane')->with('success', 'Data Berhasil Dikembalikan');
    }

    public function delete($id)
    {   
        $plane = Plane::onlyTrashed()->where('id',$id)->first();
        if($plane->gambar) {
            Storage::disk('public')->delete($plane->gambar);
        }
        $plane->forceDelete();
        return redirect()->route('dashboard.trash.plane')->with('success', 'Data Berhasil Dihapus Permanen');
    }

    public function print()
    {
        $planes = Plane::all();
        $pdf = PDF::loadview('pages.dashboard.plane.print', compact('planes'));
    	return $pdf->download('laporan-data-maskapai.pdf');
    }

    public function print_detail(Plane $plane)
    {
        $nama_file = 'data-detail-pesawat-'.$plane->nama.'.pdf';
        $pdf = PDF::loadview('pages.dashboard.plane.print-detail', compact('plane'));
    	return $pdf->download($nama_file);
    }
}
