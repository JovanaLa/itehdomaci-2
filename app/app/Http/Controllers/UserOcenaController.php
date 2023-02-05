<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use App\Http\Resources\OcenaCollection;
use Illuminate\Http\Request;

class UserOcenaController extends Controller
{
    public function index($user_id)
    {
        $ocena = Ocena::get()->where('korisnik', $user_id);
        if (count($ocena) == 0)
            return response()->json('podaci nisu pronađeni', 404);
        return new OcenaCollection($ocena);
    }
}