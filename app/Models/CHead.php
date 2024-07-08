<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Chair;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
class CHead extends Model
{
    use HasFactory;
    public function chair() : BelongsTo
     {
        return $this->belongsTo(Chair::class);
    }
}
