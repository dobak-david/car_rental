<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use App\Models\Reservations;
use Carbon\Carbon;
use Mockery\Undefined;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->input('fromUser') == null) {
            return view('cars.index', ['cars' => [], 'start' => Carbon::now(), 'end' => Carbon::now()]);
        }

        $request->validate( //azokat a mezoket tartalmazza helyes tipussal amik atmentek
            [
                'start' => 'required|date|after:' . Carbon::now(),
                'end' => 'required|date|after:' . $request->date('start'),
            ],
            [
                'start.after' => 'A kezdési dátumnak a jövőben kell lennie',
                'start.date' => 'Rossz formátumú dátum',
                'start.required' => 'A kezdési dátum kitöltése kötelező',
                'end.after' => 'A bejezési dátumnak a jövőben kell lennie, a kezdési dátumnál később',
                'end.date' => 'Rossz formátumú dátum',
                'end.required' => 'A kezdési dátum kitöltése kötelező',
            ]
        );

        $startNew = Carbon::parse($request->date('start'));
        $endNew = Carbon::parse($request->date('end'));

        $reservations = Reservations::with('car')->get();
        $cars = Cars::all();
        $carsOut = [];
        foreach($cars as $car) {
            $c = 0;
            foreach($reservations as $res) {
                if($res->car->id==$car->id && $res->berles_kezdete<=$startNew && $res->berles_vege>=$startNew) {
                    $c++;
                }
                if($res->car->id==$car->id && $res->berles_kezdete<=$endNew && $res->berles_vege>=$endNew) {
                    $c++;
                }
                if($res->car->id==$car->id && $res->berles_kezdete>=$startNew && $res->berles_vege<=$endNew) {
                    $c++;
                }
            };
            if($c == 0) {
                $carsOut[] = $car;
            }
        }
        return view('cars.index', ['cars' => $carsOut, 'start' => $request->date('start')->format('Y-m-d'), 'end' => $request->date('end')->format('Y-m-d')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
