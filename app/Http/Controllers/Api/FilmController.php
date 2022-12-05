<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use Validator;
use Illuminate\Validation\Rule;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        
        if(count($films) > 0){
            return response([
                'message' => 'Retrieve All Success',
                'data' => $films
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
            'judul' => 'required',
            'genre' => 'required',
            'rating' => 'required|numeric'
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $film = Film::create($storeData);
        return response([
            'message' => 'Add Film Success',
            'data' => $film,
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
        $film = Film::find($id);

        if(!is_null($film)){
            return response([
                'message' => 'Retrieve Film Success',
                'data' => $film
            ], 200);
        }

        return response([
            'message' => 'Film Not Found',
            'data' => null
        ], 404);        
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
        $film = Film::find($id);
        if(is_null($film)){
            return response([
                'message' => 'Film Not Found',
                'data' => null
            ], 404);        
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'judul' => 'required',
            'genre' => 'required',
            'rating' => 'required|numeric',
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $film->judul = $updateData['judul'];
        $film->genre = $updateData['genre'];
        $film->rating = $updateData['rating'];
        
        if($film->save()){
            return response([
                'message' => 'Update Film Success',
                'data' => $film,
            ], 200);        
        }

        return response([
            'message' => 'Update Film Success',
            'data' => $film,
        ], 200);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        if(is_null($film)){
            return response([
                'message' => 'Film Not Found',
                'data' => null
            ], 404);        
        }

        if($film->delete()){
            return response([
                'message' => 'Delete Film Success',
                'data' => $film,
            ], 200);        
        }

        return response([
            'message' => 'Delete Film Failed',
            'data' => null,
        ], 400);        
    }
}
