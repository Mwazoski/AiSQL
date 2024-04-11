<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversaciones extends Model
{
  protected $connection = 'mysql';
  protected $table = 'conversaciones';
  protected $guarded = [];
}
