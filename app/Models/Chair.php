<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Chair extends Model
{
    use HasFactory;
    public function insstructor() {
        return $this->hasOne(\App\Models\Instructor::class);
    }

    public function instructor() : HasMany
    {
       return $this->hasMany(Instructor::class);


   }

   public function chead() : HasOne {
    return $this->hasOne(\App\Models\CHead::class);
   }
}
