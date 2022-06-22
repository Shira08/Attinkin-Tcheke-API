<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Http\Requests\StoreAnnounceRequest;
use App\Http\Requests\UpdateAnnounceRequest;
use App\Http\Resources\AnnounceResource;
use Validator;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AnnounceResource::collection(Announce::all());
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
     * @param  \App\Http\Requests\StoreAnnounceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnounceRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|unique:announces|string|max:255',
            'image_url' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        //$name = $request->file('image_url')->getClientOriginalName();
 
        $path = $request->file('image_url')->store('public/images');
        $announce = Announce::create([
            'title' => $request->title,
            'image_url' => $request->$path
         ]);
        
        
        return response()->json(['Announce created successfully.', new AnnounceResource($announce)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function show(Announce $announce)
    {
        return new AnnounceResource($announce);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function edit(Announce $announce)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnnounceRequest  $request
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnounceRequest $request, Announce $announce)
    {
        $announce->update([
            'title' => $request->input('title'),
            'image_url' => $request->input('image_url')
        ]);
        return new AnnounceResource($announce);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announce $announce)
    {
        $announce->delete();
        return response()->json('Annonce deleted successfully');
    }
}
