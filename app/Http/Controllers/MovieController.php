<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
	// Get all Movies from DB
    public function getAllMovies(){
		$response = Movie::all();
        if ($response) {
            return response()->json($response, 200);
        } else {
            return response()->json(['error' => 'There are no Movies!'], 404);
        }
    }

    // Get requested movie
    public function getMovie($id){
		$response = Movie::find($id);
        if ($response) {
            return response()->json($response, 200);
        } else {
            return response()->json(['error' => 'Requested movie does not exist!'], 404);
        }
    }

    //Create new Movie
    public function createMovie(Request $request){
		$movie = new Movie;
        $movie->name = $request->input('name')?$request->input('name'):'';
        $movie->actors = $request->input('actors')?$request->input('actors'):'';
        $movie->categories = $request->input('categories')?$request->input('categories'):'';
        $movie->rate = $request->input('rate')?$request->input('rate'):0;
        $movie->note = $request->input('note')?$request->input('note'):'';
        $movie->save();
        return response()->json($movie, 201);
    }

    //Update selected Movie
    public function updateMovie(Request $request, $id){
    	$movie = Movie::find($id);
        $movie->name = $request->input('name');
        $movie->actors = $request->input('actors');
        $movie->categories = $request->input('categories');
        $movie->rate = $request->input('rate');
        $movie->note = $request->input('note');
        $movie->save();
        return response()->json($movie, 200);
    }
}
