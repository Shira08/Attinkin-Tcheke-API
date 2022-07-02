<?php

namespace App\Http\Controllers;

use App\Models\Hopital;
use App\Http\Requests\StoreHopitalRequest;
use App\Http\Requests\UpdateHopitalRequest;
use Illuminate\Http\Request;
use App\Http\Resources\HopitalResource;
use Validator;
use Hash;
use Session;
use DB;

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
    public function hospitalLogin()
    {
        return view('logins.hospital-login');
    }

    public function login(Request $request)
    {
         $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:12'
        ]);  
        $email = $request->email;
        $password = $request->password;

       
       /* $login = DB::table('pharmacies')
                ->where('email', '=', $email)
                ->where('password', '=', $password)
                ->first();*/
                $login = Hopital::where('email', $email)->first(['id', 'password']);
                //dd($login);
        if($login)
        {
                if(hash::check($request->password, $login->password))
                {
                    $request->session()->put('loginId',$login->id);
                    return redirect('dashboard-hospital');
                }else
                {
                    return back()->with( 'fail', ' pass not good' );
                }
        }else
        {
            return back()->with( 'fail', 'Email or pass not good' );
        }
    }

    public function addHospital()
    {
        return view('pages.add-hospital');
    }

    /*public function saveHospital( Request $request )
     {
        $request->validate( [
            'name'=>'required',
            'email'=>'required|email|unique:hopitals',
            'contact'=>'required|max:17',
            'address'=>'required',
            'horaire'=>'required',
            'password'=>'required|min:5|max:12'
        ] );
        dd($request);

       
        $hopital = new Hopital();
        $longitude = 6.36496;
        $latitude = 2.45186;

        $hopital->name = $request->name;
        $hopital->email = $request->email;
        $hopital->contact = $request->contact;
        $hopital->address = $request->address;
        $hopital->horaire = $request->horaire;
        $hopital->longitude = $longitude;
        $hopital->latitude = $latitude;
        $hopital->password = Hash::make( $request->password );
        $res = $hopital->save();

        if ( $res ) {
            return back()->with( 'success', 'Ajout réussit' );

        } else {
            return back()->with( 'fail', 'Quelque chose ne vas pas' );
        }
    }*/
    public function saveHospital( Request $request ) {
        $request->validate( [
            'name'=>'required',
            'email'=>'required|email|unique:pharmacies',
            'contact'=>'required|max:17',
            'address'=>'required',
            'horaire'=>'required',
            'password'=>'required|min:5|max:12'
        ] );
        $longitude = 6.36496;
        $latitude = 2.45186;

        $hopital = new Hopital();

        $hopital->name = $request->name;
        $hopital->email = $request->email;
        $hopital->contact = $request->contact;
        $hopital->address = $request->address;
        $hopital->horaire = $request->horaire;
        $hopital->longitude = $longitude;
        $hopital->latitude = $latitude;
        $hopital->password = Hash::make( $request->password );
        $res = $hopital->save();

        if ( $res ) {
            return back()->with( 'success', 'Hopital correctement insérer' );

        } else {
            return back()->with( 'fail', 'Il y a un soucis' );
        }
    }

    public function listHospital() {
        $datas = Hopital::all();

        return view( 'pages/hospital-list', compact( 'datas' ) );
    }
    public function editHospital($id)
    {
        $data = DB::table('hopitals')->where('id', $id)->first();
        return view( 'pages/edit-hospital', compact( 'data' ));
    } 

    public function updateHospital(Request $request) {

        $request->validate( [
            'name'=>'required',
            'email'=>'required|email|unique:hopitals',
            'contact'=>'required|max:17',
            'address'=>'required',
            'horaire'=>'required',
            'password'=>'required|min:5|max:12'
        ] );

        $res = DB::table('hopitals')->where('id',$request->id)->update([
            'name'=>$request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'horaire' => $request->horaire,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'password' => Hash::make( $request->password )
        ]);

        if ( $res ) {
            return back()->with( 'success', 'Pharmacies information are correctly updated' );

        } else {
            return back()->with( 'fail', 'Something wrong' );
        }
    }
    public function deleteHospital($id)
    {
        $res = DB::table('hopitals')->where('id', '=', $id)->delete();
        if ( $res ) {
            return back()->with( 'success', 'Hospital number is deleted successfully');

        } else {
            return back()->with( 'fail', 'Something wrong' );
        }
    }

    public function dashHospital() {
        return view( 'pages.dashboard-hospital' );
    }
}
