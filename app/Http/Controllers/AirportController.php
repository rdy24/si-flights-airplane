<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportRequest;
use App\Models\Airport;
use PDF;

class AirportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = Airport::all();
        return view('pages.dashboard.airport.index', compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.airport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirportRequest $request)
    {
        $data = $request->all();
        Airport::create($data);
        return redirect()->route('dashboard.airport.index')->with('success', 'Data Bandara Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Airport $airport)
    {
        return view('pages.dashboard.airport.edit', compact('airport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirportRequest $request, Airport $airport)
    {
        $data = $request->all();
        $airport->update($data);
        return redirect()->route('dashboard.airport.index')->with('success', 'Data Bandara Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airport $airport)
    {
        $airport->delete();
        return redirect()->route('dashboard.airport.index')->with('success', 'Data Bandara Berhasil Dihapus');
    }

    public function show_restore()
    {
        $airports = Airport::onlyTrashed()->get();
        return view('pages.dashboard.airport.trash', compact('airports'));
    }

    public function restore($id)
    {   
        $airport = Airport::onlyTrashed()->where('id',$id);
        $airport->restore();
        return redirect()->route('dashboard.trash.airport')->with('success', 'Data Bandara Berhasil Dikembalikan');
    }

    public function delete($id)
    {   
        $airport = Airport::onlyTrashed()->where('id',$id);
        $airport->forceDelete();
        return redirect()->route('dashboard.trash.route')->with('success', 'Data Bandara Dihapus Permanen');
    }

    public function print()
    {
        $airports = Airport::all();
        $pdf = PDF::loadview('pages.dashboard.airport.print', compact('airports'));
    	return $pdf->download('laporan-data-bandara.pdf');
    }
}
