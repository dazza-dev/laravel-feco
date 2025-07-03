<?php

namespace DazzaDev\LaravelFeco\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FecoDocumentType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'hash_type',
        'code_type',
    ];
}
