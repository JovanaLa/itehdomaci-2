<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ocena;

class Bioskop extends Model
{
    use HasFactory;
    protected $table = 'bioskop';
    public $primaryKey = 'id';

    public function ocena()
    {
        return $this->hasMany(Ocena::class);
    }
}