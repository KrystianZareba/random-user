<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/***
 * @property string client
 * @property string token
 * Class Token
 * @package App\Models
 * @mixin Builder
 */
class Token extends Model
{
    use HasFactory;

    protected $fillable = ['client', 'token'];
}
