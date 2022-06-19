<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', '!=', 'superadmin')->get();
        return view('pages.dashboard.admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('dashboard.user.index')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(User $user)
    {
        return view('pages.dashboard.admin.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        if($request->email != $user->email) {
            $this->validate($request, [
                'email' => 'required|email|max:255|unique:users',
            ]);
        }

        if($request->password != '') {
            $this->validate($request, [
                'password' => 'required|min:8',
            ]);
            $data['password'] = Hash::make($data['password']);
        }

        $data['password'] = $user->password;

        $user->update($data);
        return redirect()->route('dashboard.user.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.user.index')->with('success', 'Data Berhasil Dihapus');
    }
    
    public function show_restore()
    {
        $users = User::onlyTrashed()->get();
        return view('pages.dashboard.admin.trash', compact('users'));
    }

    public function restore($id)
    {   
        $user = User::onlyTrashed()->where('id',$id);
        $user->restore();
        return redirect()->route('dashboard.trash.user')->with('success', 'Data User Berhasil Dikembalikan');
    }

    public function delete($id)
    {   
        $user = User::onlyTrashed()->where('id',$id);
        $user->forceDelete();
        return redirect()->route('dashboard.trash.user')->with('success', 'Data User Dihapus Permanen');
    }

    public function print()
    {
        $users = User::where('role', '!=', 'superadmin')->get();
        $pdf = PDF::loadview('pages.dashboard.admin.print', compact('users'));
    	return $pdf->download('laporan-data-user.pdf');
    }
}
