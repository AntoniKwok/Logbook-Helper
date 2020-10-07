<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LogbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Logbook::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('home');
    }

    public function addlog()
    {
        return view('addlog');
    }

    public function storelog()
    {
        request()->validate([
            'date' => 'required|date',
            'clock_in' => 'required',
            'clock_out' => 'required',
            'activity' => 'required'
        ]);

        Logbook::create([
            'date' => request('date'),
            'clock_in' => request('clock_in'),
            'clock_out' => request('clock_out'),
            'activity' => request('activity'),
            'desc' => request('description')
        ]);

        return redirect(route('dashboard'))->with('message', 'Entry Added');
    }
}
