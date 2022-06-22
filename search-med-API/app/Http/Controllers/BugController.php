<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Http\Requests\StoreBugRequest;
use App\Http\Requests\UpdateBugRequest;
use App\Http\Resources\BugResource;
use Validator;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BugResource::collection(Bug::all());
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
     * @param  \App\Http\Requests\StoreBugRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBugRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'description' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $bug = Bug::create([
            'description' => $request->description
         ]);
        
        return response()->json(['Bug created successfully.', new BugResource($bug)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function show(Bug $bug)
    {
        return new BugResource($bug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function edit(Bug $bug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBugRequest  $request
     * @param  \App\Models\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBugRequest $request, Bug $bug)
    {
        $bug->update([
            'description' => $request->input('description')
        ]);
        return new BugResource($bug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bug $bug)
    {
        $bug->delete();
        return response()->json('Bug deleted successfully');
    }
}
