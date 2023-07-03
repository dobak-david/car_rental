<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        return view('reservations.newReservation', ['start' => $request->date('start')->format('Y.m.d'), 'end' => $request->date('end')->format('Y.m.d'), 'car' => $car, 'daysNum' => $days+1]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return to_route('index', ['start' => Carbon::now(), 'end' => Carbon::now(), 'cars' => []]);
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
