<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsDetail extends Model
{
  use HasFactory;

  /* Relation to Hotel model */
  public function hotel()
  {
    return $this->belongsTo(Hotel::class);
  }
}
