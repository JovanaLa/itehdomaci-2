<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use App\Http\Resources\OcenaCollection;

use Illuminate\Http\Request;

class FilmOcenaController extends Controller
{
    public function index($film_id)
    {
        $ocena = Ocena::get()->where('film', $film_id);
        if (count($ocena) == 0)
            return response()->json('Podaci nisu pronađeni', 404);
        return new OcenaCollection($ocena);
    }
}