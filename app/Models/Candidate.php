<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static create(array $array)
 * @method static truncate()
 */
class Candidate extends Model
{
  protected $table = 'candidate';
  protected $fillable = ['firstName', 'lastName', 'phone','email', 'linkCv', 'origin', 'position','status'];
}
