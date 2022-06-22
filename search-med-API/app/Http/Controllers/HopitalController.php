<?php

namespace App\Http\Controllers;

use App\Models\Hopital;
use App\Http\Requests\StoreHopitalRequest;
use App\Http\Requests\UpdateHopitalRequest;
use App\Http\Resources\HopitalResource;
use Validator;

class HopitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HopitalResource::collection(Hopital::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHopitalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHopitalRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:hopitals',
            'contact' => 'required',
            'address' => 'required',
            'horaire' => 'required',
            //'garde' => 'required"
           // 'longitude' => 'required',
           // 'latitude' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $hopital = Hopital::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'horaire' => $request->horaire,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'password' => $request->password,
         ]);
        
        return response()->json(['Hospital created successfully.', new HopitalResource($hopital)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hopital  $hopital
     * @return \Illuminate\Http\Response
     */
    public function show(Hopital $hopital)
    {
        return new HopitalResource($hopital);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hopital  $hopital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hopital $hopital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHopitalRequest  $request
     * @param  \App\Models\Hopital  $hopital
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHopitalRequest $request, Hopital $hopital)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:hopitals',
            'contact' => 'required',
            'address' => 'required',
            'horaire' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $hopital->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'address' => $request->input('address'),
            'horaire' => $request->input('horaire'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'password' => $request->input('password')
        ]);
        return new HopitalResource($hopital);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hopital  $hopital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hopital $hopital)
    {
        $hopital->delete();
        return response()->json('Hopital deleted successfully');
    }
}
