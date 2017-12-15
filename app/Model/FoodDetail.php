<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FoodDetail extends Model
{
    /**
     * The table to fetch
     * @var type 
     */
    protected $table = 'food_details';
    
     /**
     * Unique ID
     * @var type 
     */
    protected $primaryKey = 'food_id';

    /**
     * Variable mass assignement
     * @var type 
     */
    protected $fillable = ['food_name', 'status', 'food_type_id'];

    public function food_type(){
        return $this->belongsTo('App\Model\FoodType', 'food_type_id', 'food_type_id');
    }
    
    /**
     *
     * @var type Remove automatic generation of timestamp
     */
    public $timestamps = false;
}