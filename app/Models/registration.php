<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class registration extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'registrations';

    public function getAuthPassword()
    {
        return $this->password;
    }

    protected $fillable = [
        'id',
        'Name',
        'Number',
        'email',
        'Password',
    ];
}
