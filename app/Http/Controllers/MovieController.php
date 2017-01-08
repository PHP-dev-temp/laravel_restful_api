<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $response = Movie::all();
        if ($response) {
            return response()->json($response, 200);
        } else {
            return response()->json('No records exist!!', 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->name = $request->input('name')?$request->input('name'):'';
        $movie->actors = $request->input('actors')?$request->input('actors'):'';
        $movie->categories = $request->input('categories')?$request->input('categories'):'';
        $movie->rate = $request->input('rate')?$request->input('rate'):0;
        $movie->note = $request->input('note')?$request->input('note'):'';
        $movie->save();
        return response()->json('Record created!', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Movie::where('id', $id)->first();
        if ($response) {
            return response()->json($response, 200);
        } else {
            return response()->json('Record does not exist!', 400);
        }
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
        $movie = Movie::find($id);
        if($request->input('name')) $movie->name = $request->input('name');
        if($request->input('actors')) $movie->actors = $request->input('actors');
        if($request->input('categories')) $movie->categories = $request->input('categories');
        if($request->input('rate')) $movie->rate = $request->input('rate');
        if($request->input('note')) $movie->note = $request->input('note');
        $movie->save();
        return response()->json('Record is successfully updated!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::find($id)->delete();
        return response()->json('Record is successfully deleted!', 200);
    }
}
