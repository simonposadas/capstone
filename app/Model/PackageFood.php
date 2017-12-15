<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PackageFood extends Model {

    /**
     * Table to connect
     * @var type 
     */
    protected $table = 'package_food';

    /**
     *
     * @var type Remove automatic generation of timestamp
     */
    public $timestamps = false;
    
    /**
     * Make a relation with food type model
     * @return type
     */
    public function food_type(){
        return $this->belongsTo('App\Model\FoodType', 'food_type_id', 'food_type_id');
    }

}
