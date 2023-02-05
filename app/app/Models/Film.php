<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ocena;

class Film extends Model
{
    use HasFactory;

    protected $table = 'film';

    public $primaryKey = 'id';
    public function ocena()
    {
        return $this->hasMany(Ocena::class);
    }
    protected $fillable = [
        'name',
    ];
}