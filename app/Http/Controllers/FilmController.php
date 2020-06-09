<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFilm;

class FilmController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except('index');;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('films.films');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilm $request)
    {
        $validated = $request->validated();
        $fileName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $fileName);
        
        $film = new Film();
        $film->name = $request->name;
        $film->description = $request->description;
        $film->release_date = $request->release_date;
        $film->rating = $request->rating;
        $film->ticket_price = $request->ticket_price;
        $film->country = $request->country;
        $film->photo = $fileName;
        $film->save();

        $film->genres()->attach($request->genre);

        $request->session()->flash('message', 'Saved Successfully!'); 
        $request->session()->flash('alert-class', 'alert-success');

        return redirect()->route('films.index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        $film = Film::with('genres', 'comments.user')->find($id);
        return view('films.show', compact('film'));
    }

    /**
     * Api for Getting all films
     */
    public function allFilms()
    {
        $films = Film::with('genres')->paginate(3);
        return $films;
    }
}
