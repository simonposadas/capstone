<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model {

    /**
     * Unique ID
     * @var type 
     */
    protected $primaryKey = 'package_id';
    
    /**
     *
     * @var type Remove automatic generation of timestamp
     */
    public $timestamps = false;
    
    /**
     * Make a relation with package food model
     * @return type
     */
    public function package_food(){
        return $this->hasMany('App\Model\PackageFood', 'package_id', 'package_id');
    }
    
    /**
     * Make a relation with the package type
     * @return type
     */
    public function package_type(){
        return $this->belongsTo('App\Model\PackageType', 'package_type_id');
    }

}
