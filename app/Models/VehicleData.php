<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Define fillable attributes in the model
class VehicleData extends Model
{
  protected $connection = 'mentor_db';
  protected $table = 'vehicle_data';

  protected $fillable = [
      'user_id',
      'user_name',
      'vehicle_name',
      'vehicle_number',
      'sort_order',
      'status',
  ];

  public $timestamps = false; // // Disables automatic management of timestamps

    // Manually handle creation and updates
    protected $attributes = [
      'created_at' => 0, // Default value for created_at
      'updated_at' => 0, // Default value for updated_at
  ];

}