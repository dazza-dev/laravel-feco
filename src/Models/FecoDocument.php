<?php

namespace DazzaDev\LaravelFeco\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FecoDocument extends Model
{
    use SoftDeletes;

    protected $casts = [
        'is_valid' => 'boolean',
        'error_message' => 'array',
    ];

    protected $fillable = [
        'document_type',
        'prefix',
        'number',
        'is_valid',
        'status_code',
        'status_description',
        'status_message',
        'error_message',
        'cufe',
        'zip_base64_bytes',
        'xml_name',
        'qr_code',
        'documentable_id',
        'documentable_type',
    ];

    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }
}
