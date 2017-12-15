<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    /**
     * Table to connect
     * @var type 
     */
    protected $table = 'package_type';
   
    /**
     * Remove automatic timestamp
     * @var type 
     */
    public $timestamps = false;
    
    /**
     * Make a relation with package details mode
     * @return type
     */
    public function package_detail(){
        return $this->hasMany('App\Model\PackageDetail', 'package_type_id');
    }
}
