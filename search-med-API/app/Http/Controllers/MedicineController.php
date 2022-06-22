<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Http\Resources\MedicineResource;
use App\Http\Resources\PharmacyResource;
use Validator;
use DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MedicineController::collection(Medicine::all());   
    }

    public function getPharmacy($name)
    {
        $data = DB::table( 'pharmacies' )
        ->join( 'medicines', 'pharmacies.id', '=', 'medicines.pharmacy_id' )
        ->where( 'medicines.name', '=', $name )
        ->select( 'pharmacies.*', 'medicines.name','medicines.type','medicines.dosage','medicines.people')
        ->get()
        ->toArray();
        return $data;
 
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
     * @param  \App\Http\Requests\StoreMedicineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'type' => 'required',
            'dosage' => 'required',
            'people' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $medicine = Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'dosage' => $request->dosage,
            'people' => $request->people,
            'pharmacy_id' => $request->pharmacy_id,
         ]);
        
        return response()->json(['Medicine created successfully.', new MedicineResource($medicine)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        return new MedicineResource($medicine);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicineRequest  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'type' => 'required',
            'dosage' => 'required',
            'people' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $medicine->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'dosage' => $request->input('dosage'),
            'people' => $request->input('people'),
            'pharmacy_id' => $request->input('pharmacy_id'),
         ]);
        
        return response()->json(['Medicine updated successfully.', new MedicineResource($medicine)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return response()->json('Medicine deleted successfully');
    }
}
