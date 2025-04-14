<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 *
 * @property int $personId
 * @property string $name
 * @property int $age
 */
class Person extends Model
{
    public $timestamps = false;

    protected $table = 'person';
    protected $primaryKey = 'personId';
    protected $fillable = ['name', 'age'];
}
