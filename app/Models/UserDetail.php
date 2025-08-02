<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
class UserDetail extends Model
{
    //
    use HasFactory;
    use HasRoles;
    protected $table = 'user_details'; // Specify table name

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
