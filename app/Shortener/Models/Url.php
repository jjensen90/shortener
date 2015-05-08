<?php namespace Shortener\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model {

    protected $fillable = ["original_url", "visits"];

}
