<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirplaneSeatRequest;
use App\Models\AirplaneSeat;
use App\Models\Plane;
use Illuminate\Http\Request;
use PDF;

class AirplaneSeatController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airplane_seats = AirplaneSeat::all();
        return view('pages.dashboard.airplane_seat.index', compact('airplane_seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planes = Plane::all();
        return view('pages.dashboard.airplane_seat.create', compact('planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirplaneSeatRequest $request)
    {
        $data = $request->all();
        AirplaneSeat::create($data);
        return redirect()->route('dashboard.airplane_seat.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(AirplaneSeat $airplane_seat)
    {
        $planes = Plane::all();
        return view('pages.dashboard.airplane_seat.edit', compact('airplane_seat', 'planes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirplaneSeatRequest $request, AirplaneSeat $airplane_seat)
    {
        $data = $request->all();
        $airplane_seat->update($data);
        return redirect()->route('dashboard.airplane_seat.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AirplaneSeat $airplane_seat)
    {
        $airplane_seat->delete();
        return redirect()->route('dashboard.airplane_seat.index')->with('success', 'Data berhasil dihapus');
    }

    public function print()
    {
        $airplane_seats = AirplaneSeat::all();
        $pdf = PDF::loadView('pages.dashboard.airplane_seat.print', compact('airplane_seats'));
        return $pdf->download('laporan-data-kursi-pesawat.pdf');
    }

    public function show_restore()
    {
        $airplane_seats = AirplaneSeat::onlyTrashed()->get();
        return view('pages.dashboard.airplane_seat.trash', compact('airplane_seats'));
    }

    public function restore($id)
    {   
        $airplane_seat = AirplaneSeat::onlyTrashed()->where('id',$id);
        $airplane_seat->restore();
        return redirect()->route('dashboard.trash.airplane_seat')->with('success', 'Data Berhasil Dikembalikan');
    }

    public function delete($id)
    {   
        $airplane_seat = AirplaneSeat::onlyTrashed()->where('id',$id)->first();
        $airplane_seat->forceDelete();
        return redirect()->route('dashboard.trash.airplane_seat')->with('success', 'Data Berhasil Dihapus Permanen');
    }

}
