<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Producto extends Model
{
    public function tickets(){
        return $this->belongsToMany(Ticket::class);
    }
    use HasFactory;
}
