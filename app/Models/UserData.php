<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $connection = 'mentor_db';

    // Specify the table name
    protected $table = 'register_form';

    // Define which attributes are mass assignable
    protected $fillable = ['user_name', 'email_id', 'password', 'created_at'];

    public $timestamps = false;

    public static function getAllRegisteredUsers()
    {
        return self::all()->toArray();
    }
}
