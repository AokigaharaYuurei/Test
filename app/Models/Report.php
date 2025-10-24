<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function status(): BelongsTo{

        return $this->belongsTo(Status::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
