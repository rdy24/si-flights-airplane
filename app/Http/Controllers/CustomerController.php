<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use PDF;

class CustomerController extends Controller
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
        $customers = Customer::all();
        return view('pages.dashboard.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {

        $data = $request->all();

        $this->validate($request, [
            'no_ktp' => 'required|max:16|unique:customers',
            'no_passport' => 'nullable|max:20|unique:customers',
            'no_telepon' => 'required|max:16|unique:customers',
            'email' => 'required|email|max:255|unique:customers',
        ]);

        Customer::create($data);
        return redirect()->route('dashboard.customer.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('pages.dashboard.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('pages.dashboard.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $data = $request->all();

        if($request->no_ktp != $customer->no_ktp){
            $this->validate($request, [
                'no_ktp' => 'required|max:16|unique:customers',
            ]);
        }
        if($request->no_passport != $customer->no_passport){
            $this->validate($request, [
                'no_passport' => 'max:20|unique:customers',
            ]);
        }
        if($request->email != $customer->email){
            $this->validate($request, [
                'email' => 'required|email|max:255|unique:customers',
            ]);
        }
        if($request->no_telepon != $customer->no_telepon){
            $this->validate($request, [
                'no_telepon' => 'required|max:16|unique:customers',
            ]);
        }

        $customer->update($data);
        return redirect()->route('dashboard.customer.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('dashboard.customer.index')->with('success', 'Data berhasil dihapus');
    }

    public function show_restore()
    {
        $customers = Customer::onlyTrashed()->get();
        return view('pages.dashboard.customer.trash', compact('customers'));
    }

    public function restore($id)
    {   
        $customer = Customer::onlyTrashed()->where('id',$id);
        $customer->restore();
        return redirect()->route('dashboard.trash.customer')->with('success', 'Data Berhasil Dikembalikan');
    }

    public function delete($id)
    {   
        $customer = Customer::onlyTrashed()->where('id',$id)->first();
        $customer->forceDelete();
        return redirect()->route('dashboard.trash.customer')->with('success', 'Data Berhasil Dihapus Permanen');
    }

    public function print()
    {
        $customers = Customer::all();
        $pdf = PDF::loadview('pages.dashboard.customer.print', compact('customers'));
    	return $pdf->download('laporan-data-customer.pdf');
    }

    public function print_detail(Customer $customer)
    {
        $nama_file = 'data-detail-pesawat-'.$customer->nama.'.pdf';
        $pdf = PDF::loadview('pages.dashboard.customer.print-detail', compact('customer'));
    	return $pdf->download($nama_file);
    }
}
