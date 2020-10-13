<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            foreach ($data as $d)
                $d->approval = $d->approval == 0 ? "Not Approved" : "Approved";
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

    public function storeLog()
    {
        request()->validate([
            'date' => 'required|date',
            'clock_in' => 'required',
            'clock_out' => 'required',
            'activity' => 'required',
            'description' => 'required'
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

    public function updateLog(){
        request()->validate([
            'date' => 'required|date',
            'clock_in' => 'required',
            'clock_out' => 'required',
            'activity' => 'required',
            'description' => 'required'
        ]);

        $logBook = Logbook::find(request('id'));
        $logBook->clock_in = request('clock_in');
        $logBook->clock_out = request('clock_out');
        $logBook->activity = request('activity');
        $logBook->desc = request('description');
        $logBook->save();

        return redirect(route('dashboard'))->with('message', 'Log Book on '.$logBook->date.' has been updated!');
    }
}
