<?php

namespace DazzaDev\LaravelFeco\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FecoCertificate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'path',
        'password',
        'expiration_date',
        'certificable_id',
        'certificable_type',
    ];

    public function certificable()
    {
        return $this->morphTo();
    }
}
