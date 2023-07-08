<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use Carbon\Carbon;
use App\Models\Cars;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class CarsController extends Controller
{
    public function listcars() {
        $cars = Cars::all();
        return view('cars.allcars', ['cars' => $cars]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->input('fromUser') == null) {
            return view('cars.index', ['cars' => [], 'start' => Carbon::now(), 'end' => Carbon::now()]);
        }

        $request->validate(
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

        $startNew = Carbon::parse($request->date('start'))->format('Y-m-d');
        $endNew = Carbon::parse($request->date('end'))->format('Y-m-d');

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
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'marka' => 'required',
                'tipus' => 'required',
                'napAr' => 'required|min:0|max:100000|integer',
            ],
            [
                'marka.required' => 'A márka megadása kötelező',
                'tipus.required' => 'A típus ár megadása kötelező',
                'napAr.required' => 'A napi ár megadása kötelező',
                'napAr.min' => 'A napi ár 0 és 100000 közötti egész szám',
                'napAr.max' => 'A napi ár 0 és 100000 közötti egész szám',
                'napAr.integer' => 'A napi ár 0 és 100000 közötti egész szám',
            ]
        );

        if ($request -> hasFile('kep')){
            $file = $request -> file('kep');
            $fname = $file -> hashName();
            Storage::disk('public') -> put('images/' . $fname, $file -> get());
            $validated['kep'] = $fname;
        }

        Cars::create($validated);
        Session::flash('car-created');
        return to_route('index');
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
    public function edit(Cars $car)
    {
        return view('cars.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cars $car)
    {
        $validated = $request->validate(
            [
                'marka' => 'required',
                'tipus' => 'required',
                'napAr' => 'required|min:0|max:100000|integer',
            ],
            [
                'marka.required' => 'A márka megadása kötelező',
                'tipus.required' => 'A típus ár megadása kötelező',
                'napAr.required' => 'A napi ár megadása kötelező',
                'napAr.min' => 'A napi ár 0 és 100000 közötti egész szám',
                'napAr.max' => 'A napi ár 0 és 100000 közötti egész szám',
                'napAr.integer' => 'A napi ár 0 és 100000 közötti egész szám',
            ]
        );
        $car->update($validated);
        Session::flash('car-updated');
        return to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
