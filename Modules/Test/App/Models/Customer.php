<?php

namespace Modules\Test\App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $bio
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 */
class Customer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'bio', 'email', 'phone', 'address', 'created_at', 'updated_at'];

    protected $casts = [
    
    ];


}
