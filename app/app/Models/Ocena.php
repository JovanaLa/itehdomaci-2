<?php

namespace App\Models;

use App\Models\User;
use App\Models\Film;
use App\Models\Bioskop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocena extends Model
{
    protected $table = 'ocena';
    public $primaryKey = 'id';
    public function userkey()
    {
        return $this->belongsTo(User::class, 'korisnik');
    }

    public function filmkey()
    {
        return $this->belongsTo(Film::class, 'film');
    }

    public function bioskopkey()
    {
        return $this->belongsTo(Bioskop::class, 'bioskop');
    }
}