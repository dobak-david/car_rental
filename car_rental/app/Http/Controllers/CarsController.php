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
            return view('cars.index', ['cars' => []]);
        }

        $startNew = Carbon::parse($request->date('start'));
        $endNew = Carbon::parse($request->date('end'));

        $reservations = Reservations::with('car')->get();
/*         $reservationsActive2 = Reservations::with('car')->where('berles_kezdete','>=',$startNew)->where('berles_kezdete','<=',$endNew)->get();
        $reservationsActive3 = Reservations::with('car')->where('berles_kezdete','>=',$startNew)->where('berles_vege','<=',$endNew)->get(); */
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
        return view('cars.index', ['cars' => $carsOut]);
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
