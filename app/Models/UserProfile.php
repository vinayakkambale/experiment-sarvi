<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
  // DATABASE CONNECTION
  protected $connection = 'mentor_db';

  protected $table = 'user_profile_data'; // Table from database

  // GETS THE USER PROFILE DATA BY USING EMAIL ID
  public static function getUserProfileDataByEmail($email_id)
  {
    return self::where('email_id', $email_id)->first();
  }

  // GETS THE USERDATA BY USING USER ID
  public static function getUserData($user_id)
  {
    return self::where('id', $user_id)->first();
  }
}