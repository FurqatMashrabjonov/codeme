<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Github extends Model
{


    protected $fillable = [
        'id',
        'user_id',
        'nickname',
        'name',
        'email',
        'avatar',
        'user',
        'token',
        'refresh_token',
        'expires_in',
    ];



    protected $casts = [
        'user' => 'array',
    ];
    /**
     * @return BelongsTo
     */
    public function website_user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }


}
