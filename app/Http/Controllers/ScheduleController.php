<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Plane;
use App\Models\Route;
use App\Models\Schedule;
use PDF;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('pages.dashboard.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planes = Plane::all();
        $routes = Route::all();
        return view('pages.dashboard.schedule.create', compact('planes', 'routes')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $data = $request->all();
        Schedule::create($data);
        return redirect()->route('dashboard.schedule.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(Schedule $schedule)
    {
        $planes = Plane::all();
        $routes = Route::all();
        return view('pages.dashboard.schedule.edit', compact('schedule', 'planes', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $data = $request->all();
        $schedule->update($data);
        return redirect()->route('dashboard.schedule.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('dashboard.schedule.index')->with('success', 'Data berhasil dihapus');
    }

    public function show_restore()
    {
        $schedules = Schedule::onlyTrashed()->get();
        return view('pages.dashboard.schedule.trash', compact('schedules'));
    }

    public function restore($id)
    {   
        $schedule = Schedule::onlyTrashed()->where('id',$id);
        $schedule->restore();
        return redirect()->route('dashboard.trash.schedule')->with('success', 'Data Berhasil Dikembalikan');
    }

    public function delete($id)
    {   
        $schedule = Schedule::onlyTrashed()->where('id',$id);
        $schedule->forceDelete();
        return redirect()->route('dashboard.trash.schedule')->with('success', 'Data Berhasil Dihapus Permanen');
    }

    public function print()
    {
        $schedules = Schedule::all();
        $pdf = PDF::loadview('pages.dashboard.schedule.print', compact('schedules'));
    	return $pdf->download('laporan-data-jadwal.pdf');
    }
}
