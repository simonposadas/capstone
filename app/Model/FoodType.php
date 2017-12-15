<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    /**
     * The table to fetch
     * @var type 
     */
    protected $table = 'food_type';
    
     /**
     * Unique ID
     * @var type 
     */
    protected $primaryKey = 'food_type_id';
    
    /**
     *
     * @var type Remove automatic generation of timestamp
     */
    public $timestamps = false;
}