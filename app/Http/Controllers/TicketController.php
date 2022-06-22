<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\AirplaneSeat;
use App\Models\Customer;
use App\Models\Schedule;
use App\Models\Ticket;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('pages.dashboard.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $schedules = Schedule::all();
        $airplane_seats = AirplaneSeat::all(); 

        return view('pages.dashboard.ticket.create', compact('customers', 'schedules', 'airplane_seats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'customer_id' => 'required|unique:tickets',
        ]);

        Ticket::create($data);

        return redirect()->route('dashboard.ticket.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $qrcode = QrCode::size(200)->generate($ticket->kode_tiket);
        return view('pages.dashboard.ticket.show', compact('ticket', 'qrcode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $customers = Customer::all();
        $schedules = Schedule::all();
        $airplane_seats = AirplaneSeat::all();

        return view('pages.dashboard.ticket.edit', compact('ticket', 'customers', 'schedules', 'airplane_seats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        $data = $request->all();

        if($request->customer_id != $ticket->customer_id)  {
            $this->validate($request, [
                'customer_id' => 'required|unique:tickets',
            ]);
        }

        $ticket->update($data);

        return redirect()->route('dashboard.ticket.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('dashboard.ticket.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function show_restore()
    {
        $tickets = Ticket::onlyTrashed()->get();
        return view('pages.dashboard.ticket.trash', compact('tickets'));
    }

    public function restore($id)
    {   
        $ticket = Ticket::onlyTrashed()->where('id',$id);
        $ticket->restore();
        return redirect()->route('dashboard.trash.ticket')->with('success', 'Data Berhasil Dikembalikan');
    }

    public function delete($id)
    {   
        $ticket = Ticket::onlyTrashed()->where('id',$id)->first();
        $ticket->forceDelete();
        return redirect()->route('dashboard.trash.ticket')->with('success', 'Data Berhasil Dihapus Permanen');
    }

    public function print()
    {
        $tickets = Ticket::all();
        $pdf = PDF::loadview('pages.dashboard.ticket.print', compact('tickets'));
    	return $pdf->download('laporan-data-ticket.pdf');
    }

    public function print_detail(Ticket $ticket)
    {
        $qrcode = base64_encode(QrCode::format('svg')->size(150)->generate($ticket->kode_tiket));
        $nama_file = 'data-detail-ticket-'.$ticket->kode_tiket.'.pdf';
        $pdf = PDF::loadview('pages.dashboard.ticket.print-detail', compact('ticket', 'qrcode'));
    	return $pdf->download($nama_file);
    }
}
