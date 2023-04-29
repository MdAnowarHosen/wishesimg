<?php

namespace App\Models\Contact;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'message'
    ];

    /**
     * get contact user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
