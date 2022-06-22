<?php

namespace App\Http\Controllers;

use App\Models\Bloodbag;
use App\Http\Requests\StoreBloodbagRequest;
use App\Http\Requests\UpdateBloodbagRequest;
use App\Http\Resources\BloodbagResource;
use Validator;
use DB;

class BloodbagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BloodbagResource::collection(Bloodbag::all());
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
    public function getHospital($name)
    {
        $data = DB::table( 'hopitals' )
        ->join( 'bloodbags', 'hopitals.id', '=', 'bloodbags.hopital_id' )
        ->where( 'bloodbags.bloodgroup', '=', $name )
        ->select( 'hopitals.*', 'bloodbags.bloodgroup','bloodbags.volume','bloodbags.quantity')
        ->get()
        ->toArray();
        return $data;
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBloodbagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodbagRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'bloodgroup' => 'required',
            'volume' => 'required',
            'quantity' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $bloodbag = Bloodbag::create([
            'bloodgroup' => $request->bloodgroup,
            'volume' => $request->volume,
            'quantity' => $request->quantity,
            'hopital_id' => $request->hopital_id,
         ]);
        
        return response()->json(['Blood bag created successfully.', new BloodbagResource($bloodbag)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bloodbag  $bloodbag
     * @return \Illuminate\Http\Response
     */
    public function show(Bloodbag $bloodbag)
    {
        return new BloodbagResource($bloodbag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bloodbag  $bloodbag
     * @return \Illuminate\Http\Response
     */
    public function edit(Bloodbag $bloodbag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBloodbagRequest  $request
     * @param  \App\Models\Bloodbag  $bloodbag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodbagRequest $request, Bloodbag $bloodbag)
    {
        $validator = Validator::make($request->all(),[
            'bloodgroup' => 'required',
            'volume' => 'required',
            'quantity' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $bloodbag->update([
            'bloodgroup' => $request->input('bloodgroup'),
            'volume' => $request->input('volume'),
            'quantity' => $request->input('quantity'),
            'hopital_id' => $request->input('hopital_id'),
         ]);
        
        return response()->json(['Bloodbag updated successfully.', new BloodbagResource($bloodbag)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bloodbag  $bloodbag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bloodbag $bloodbag)
    {
        $bloodbag->delete();
        return response()->json('Bloodbag deleted successfully');
    }
}
