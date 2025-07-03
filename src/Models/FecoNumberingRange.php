<?php

namespace DazzaDev\LaravelFeco\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FecoNumberingRange extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'prefix',
        'authorized_code',
        'start_date',
        'end_date',
        'start_number',
        'end_number',
        'technical_key',
        'type',
        'rangeable_id',
        'rangeable_type',
    ];

    public function rangeable()
    {
        return $this->morphTo();
    }
}
