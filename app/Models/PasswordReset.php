<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'password_resets'; // Specify the table name

    public $timestamps = false; // Disable timestamps (created_at, updated_at)

    protected $fillable = ['email', 'token', 'created_at']; // Fillable columns
}
