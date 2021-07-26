<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Builder;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class UserData
 * @package App\Models
 * @mixin Builder
 */
class UserData extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'users_data';

    protected $fillable = ['_id', 'data'];
}
