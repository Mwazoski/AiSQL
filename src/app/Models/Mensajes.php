<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
  protected $connection = 'mysql';
  protected $table = 'mensajes';
  protected $guarded = [];
}
