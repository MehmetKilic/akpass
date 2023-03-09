<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\SoftDeletes;

class Password extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'password';
    protected $guarded = 'id';
    protected $fillable =  [
        'category_id',
        'user_id',
        'title',
        'url',
        'username',
        'password',
        'status'
    ];

    /**
     * Get the user's password decrypt value.
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Crypt::decrypt($value),
        );
    }
}
