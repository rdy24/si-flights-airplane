<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteRequest;
use App\Models\Airport;
use App\Models\Route;
use PDF;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::all();
        return view('pages.dashboard.route.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airports = Airport::all();
        return view('pages.dashboard.route.create', compact('airports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RouteRequest $request)
    {
        $data = $request->all();
        Route::create($data);
        return redirect()->route('dashboard.route.index')->with('success', 'Data Rute Berhasil Dibuat');
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
    public function edit(Route $route)
    {
        $airports = Airport::all();
        return view('pages.dashboard.route.edit', compact('route', 'airports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RouteRequest $request, Route $route)
    {
        if($request->kode_rute != $route->kode_rute){
            $this->validate($request, [
                'kode_rute' => 'required|unique:routes,kode_rute',
            ]);
        }

        $data = $request->all();
        $route->update($data);
        return redirect()->route('dashboard.route.index')->with('success', 'Data Rute Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->delete();
        return redirect()->route('dashboard.route.index')->with('success', 'Data Rute Berhasil Dihapus');
    }

    public function show_restore()
    {
        $routes = Route::onlyTrashed()->get();
        return view('pages.dashboard.route.trash', compact('routes'));
    }

    public function restore($id)
    {   
        $route = Route::onlyTrashed()->where('id',$id);
        $route->restore();
        return redirect()->route('dashboard.trash.route')->with('success', 'Data Rute Berhasil Dikembalikan');
    }

    public function delete($id)
    {   
        $route = Route::onlyTrashed()->where('id',$id);
        $route->forceDelete();
        return redirect()->route('dashboard.trash.route')->with('success', 'Data Rute Dihapus Permanen');
    }

    public function print()
    {
        $routes = Route::all();
        $pdf = PDF::loadview('pages.dashboard.route.print', compact('routes'));
    	return $pdf->download('laporan-data-rute.pdf');
    }
}
