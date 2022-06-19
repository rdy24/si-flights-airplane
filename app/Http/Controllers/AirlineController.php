<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirlineRequest;
use App\Models\Airline;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AirlineController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airlines = Airline::all();
        return view('pages.dashboard.airline.index', compact('airlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.airline.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirlineRequest $request)
    {
        $data = $request->all();
        
        $this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['logo'] = $request->file('logo')->store('logo', 'public');

        Airline::create($data);

        return redirect()->route('dashboard.airline.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(Airline $airline)
    {
        return view('pages.dashboard.airline.edit', compact('airline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirlineRequest $request, Airline $airline)
    {
        $data = $request->all();
        if($request->kode_maskapai != $airline->kode_maskapai){
            $this->validate($request, [
                'kode_maskapai' => 'required|unique:airlines',
            ]);
        }
        if($request->hasFile('logo')){
            $data['logo'] = $request->file('logo')->store('logo', 'public');
            
            if($airline->logo) {
                Storage::disk('public')->delete($airline->logo);
            }
        }

        

        $airline->update($data);
        return redirect()->route('dashboard.airline.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline)
    {
        $airline->delete();
        return redirect()->route('dashboard.airline.index')->with('success', 'Data berhasil dihapus');
    }

    public function show_restore()
    {
        $airlines = Airline::onlyTrashed()->get();
        return view('pages.dashboard.airline.trash', compact('airlines'));
    }

    public function restore($id)
    {   
        $airline = Airline::onlyTrashed()->where('id',$id);
        $airline->restore();
        return redirect()->route('dashboard.trash.airline')->with('success', 'Data Berhasil Dikembalikan');
    }

    public function delete($id)
    {   
        $airline = Airline::onlyTrashed()->where('id',$id)->first();
        if($airline->logo) {
            Storage::disk('public')->delete($airline->logo);
        }
        $airline->forceDelete();
        return redirect()->route('dashboard.trash.airline')->with('success', 'Data Berhasil Dihapus Permanen');
    }

    public function print()
    {
        $airlines = Airline::all();
        $pdf = PDF::loadview('pages.dashboard.airline.print', compact('airlines'));
    	return $pdf->download('laporan-data-maskapai.pdf');
    }
}
