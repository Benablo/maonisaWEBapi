<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class shoes
 * @package App\Models
 * @version October 28, 2021, 2:16 am UTC
 *
 * @property string $Brand
 * @property string $Name
 * @property integer $Prize
 */
class shoes extends Model
{
    

    use HasFactory;

    public $table = 'shoes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Brand',
        'Name',
        'Prize'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Brand' => 'string',
        'Name' => 'string',
        'Prize' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Brand' => 'required|string|max:255',
        'Name' => 'required|string|max:255',
        'Prize' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
