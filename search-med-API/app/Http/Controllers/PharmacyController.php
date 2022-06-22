<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Http\Requests\StorePharmacyRequest;
use App\Http\Requests\UpdatePharmacyRequest;
use App\Http\Resources\PharmacyResource;
use Validator;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PharmacyResource::collection(Pharmacy::all());
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
     * @param  \App\Http\Requests\StorePharmacyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePharmacyRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'pharmacy_name' => 'required',
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

        $pharmacy = Pharmacy::create([
            'pharmacy_name' => $request->pharmacy_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'horaire' => $request->horaire,
            'garde' => $request->garde,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'password' => $request->password,
         ]);
        
        return response()->json(['Pharmacy created successfully.', new PharmacyResource($pharmacy)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        return new PharmacyResource($pharmacy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePharmacyRequest  $request
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePharmacyRequest $request, Pharmacy $pharmacy)
    {
        
        $validator = Validator::make($request->all(),[
            'pharmacy_name' => 'required',
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
        $pharmacy->update([
            'pharmacy_name' => $request->input('pharmacy_name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'address' => $request->input('address'),
            'horaire' => $request->input('horaire'),
            'garde' => $request->input('garde'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'password' => $request->input('password')
        ]);
        return new PharmacyResource($pharmacy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return response()->json('Pharmacy deleted successfully');
    }
}
