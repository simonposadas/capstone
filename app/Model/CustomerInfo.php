<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    use \Illuminate\Notifications\Notifiable;
    /**
     * The table to fetch
     * @var type 
     */
    protected $table = 'customer_info';
    
     /**
     * Unique ID
     * @var type 
     */
    protected $primaryKey = 'cust_id';
    
    /**
     *
     * @var type Remove automatic generation of timestamp
     */
    public $timestamps = false;
    
    /**
     * Mass variable assignement
     */
    protected $fillable = ['cust_fname', 'cust_lname', 'gender', 'contNo', 'email', 'address'];
    
    /**
     * Make a relation with reservation detail
     * @return type
     */
    public function reservation_detail(){
        return $this->hasOne('App\Model\ReservationDetail', 'cust_id', 'cust_id');
    }
}

