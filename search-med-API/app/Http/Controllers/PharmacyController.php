<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Requests\StorePharmacyRequest;
use App\Http\Requests\UpdatePharmacyRequest;
use App\Http\Resources\PharmacyResource;
use Validator;
use Hash;
use Session;
use DB;

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

    public function pharmacyLogin() {
        return view( 'logins.pharmacy-login' );
    }

    public function login( Request $request ) {
        $request->validate( [
            'email'=>'required',
            'password'=>'required|min:5|max:12'
        ] );

        $email = $request->email;
        $password = $request->password;

        /* $login = DB::table( 'pharmacies' )
        ->where( 'email', '=', $email )
        ->where( 'password', '=', $password )
        ->first();
        */
        $login = Pharmacy::where( 'email', $email )->first( [ 'id', 'password' ] );
        //dd( $login );
        if ( $login ) {
            if ( hash::check( $request->password, $login->password ) ) {
                $request->session()->put( 'loginId', $login->id );
                return redirect( 'dashboard-pharmacy' );
            } else {
                return back()->with( 'fail', ' pass not good' );
            }
        } else {
            return back()->with( 'fail', 'Email or pass not good' );
        }
    }

    public function addPharmacy() {
        return view( 'pages.pharmacy' );
    }

    public function savePharmacy( Request $request ) {
        $request->validate( [
            'pharmacy_name'=>'required',
            'email'=>'required|email|unique:pharmacies',
            'contact'=>'required|max:17',
            'address'=>'required',
            'horaire'=>'required',
            'password'=>'required|min:5|max:12'
        ] );
        $longitude = 6.36496;
        $latitude = 2.45186;

        $pharmacy = new Pharmacy();

        $pharmacy->pharmacy_name = $request->pharmacy_name;
        $pharmacy->email = $request->email;
        $pharmacy->contact = $request->contact;
        $pharmacy->address = $request->address;
        $pharmacy->horaire = $request->horaire;
        $pharmacy->garde = $request->garde;
        $pharmacy->longitude = $longitude;
        $pharmacy->latitude = $latitude;
        $pharmacy->password = Hash::make( $request->password );
        $res = $pharmacy->save();

        if ( $res ) {
            return back()->with( 'success', 'youre boss' );

        } else {
            return back()->with( 'fail', 'Something wrong' );
        }
    }

    public function displayPharmacy() {
        $displayData = Pharmacy::all();

        return view( 'pages/pharmacy-list', compact( 'displayData' ) );
    }

    public function editPharmacy( $id ) {
        $data = DB::table( 'pharmacies' )->where( 'id', $id )->first();
        return view( 'pages/edit-pharmacy', compact( 'data' ) );
    }

    public function updatePharmacy( Request $request ) {

        $request->validate( [
            'pharmacy_name'=>'required',
            'email'=>'required|email|unique:pharmacies',
            'contact'=>'required|max:17',
            'address'=>'required',
            'horaire'=>'required',
            'password'=>'required|min:5|max:12'
        ] );

        $updatedTime = now()->toDateTimeString();
        

        $res = DB::table( 'pharmacies' )->where( 'id', $request->id )->update( [
            'pharmacy_name'=>$request->pharmacy_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'horaire' => $request->horaire,
            'garde' => $request->garde,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'password' => Hash::make( $request->password )
        ] );
        

        if ( $res ) {
         
                return back()->with( 'success', 'Mise à jour bien faite' );

        } else {
            return back()->with( 'fail', 'Il y a un problème , Réessayez slp' );
        }
    }

    public function deletePharmacy( $id ) {
        $res = DB::table( 'pharmacies' )->where( 'id', '=', $id )->delete();
        if ( $res ) {
            return back()->with( 'success', 'Pharmacie is deleted successfully' );

        } else {
            return back()->with( 'fail', 'Something wrong' );
        }
    }

    public function dashPharmacy() {
        $displayData = Pharmacy::all();
        return view( 'pages.dashboard-pharmacy', compact( 'displayData' ) );
    }
}
