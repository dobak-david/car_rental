<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Reservations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $car = Cars::all()->where('id','=',$request->input('car'))[$request->input('car')-1];
        $datetime1 = new \DateTime($request->date('end'));
        $datetime2 = new \DateTime($request->date('start'));
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        return view('reservations.newReservation', ['start' => $request->date('start')->format('Y-m-d'), 'end' => $request->date('end')->format('Y-m-d'), 'car' => $car, 'daysNum' => $days+1]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'berlo_neve' => 'required',
                'berlo_cim' => 'required',
                'berlo_email' => 'required|regex:/^.+@.+$/i',
                'berlo_telefon' => 'required|regex:/[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}/',
                'berles_kezdete' => 'required',
                'berles_vege' => 'required',
                'auto_id' => 'required',
            ],
            [
                'email.regex' => 'Az email rossz formátumú',
                'phone.regex' => 'A telefon rossz formátumú'
            ]
        );
        Reservations::create($validated);
        Session::flash('reservation-created');
        return to_route('index', ['start' => Carbon::now()->format('Y.m.d'), 'end' => Carbon::now()->format('Y.m.d'), 'cars' => []]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
