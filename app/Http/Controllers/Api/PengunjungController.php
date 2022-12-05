<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengunjung;
use Validator;
use Illuminate\Validation\Rule;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengunjungs = Pengunjung::all();
        
        if(count($pengunjungs) > 0){
            return response([
                'message' => 'Retrieve All Success',
                'data' => $pengunjungs
            ], 200);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 404);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->all();
        $validate = Validator::make($storeData, [
            'name' => 'required',
            'email' => 'required|email|unique:pengunjungs',
            'password' => 'required',
            'tglLahir' => 'required',
            'noTelp' => 'required|numeric',
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $pengunjung = Pengunjung::create($storeData);
        return response([
            'message' => 'Add Pengunjung Success',
            'data' => $pengunjung,
        ], 200);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengunjung = Pengunjung::find($id);
        if(is_null($pengunjung)){
            return response([
                'message' => 'Pengunjung Not Found',
                'data' => null
            ], 404);
        }

        return response([
            'message' => 'Retrieve Pengunjung Success',
            'data' => $pengunjung
        ], 200);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengunjung = Pengunjung::find($id);
        if(is_null($pengunjung)){
            return response([
                'message' => 'Pengunjung Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'name' => 'required',
            'email' => 'required|email|unique:pengunjungs,email',
            'password' => 'required',
            'tglLahir' => 'required',
            'noTelp' => 'required|numeric',
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $pengunjung->name = $updateData['name'];
        $pengunjung->email = $updateData['email'];
        $pengunjung->password = $updateData['password'];
        $pengunjung->tglLahir = $updateData['tglLahir'];
        $pengunjung->noTelp = $updateData['noTelp'];
        
        if($pengunjung->save()){
            return response([
                'message' => 'Update Pengunjung Success',
                'data' => $pengunjung,
            ], 200);
        }

        return response([
            'message' => 'Update Pengunjung Failed',
            'data' => null
        ], 400);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
