<?php

namespace DazzaDev\LaravelFeco\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FecoSoftware extends Model
{
    use SoftDeletes;

    protected $table = 'feco_softwares';

    protected $casts = [
        'test' => 'boolean',
    ];

    protected $fillable = [
        'test',
        'identifier',
        'test_set_id',
        'pin',
        'type',
        'softwareable_id',
        'softwareable_type',
    ];

    public function softwareable()
    {
        return $this->morphTo();
    }
}
