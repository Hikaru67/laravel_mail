<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert(array $array)
 * @method static orderBy(string $string, string $string1)
 */
class Template extends Model
{
    protected $table = 'template';
    protected $fillable = ['name', 'category', 'content'];
}
