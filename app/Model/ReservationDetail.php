<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    /**
     * Uniq identifier
     * @var type 
     */
    protected $primaryKey = 'reserv_id';
    
    /**
     * Remove automatic stamping
     * @var type 
     */
    public $timestamps = false;
    
    /**
     * Variable mass assignement
     * @var type 
     */
    protected $fillable = ['reserv_guestNo', 'cust_budget', 'bud_worker', 'bud_food', 'bud_equip', 'cust_id', 'event_id', 'addOn_id', 'reserv_date', 'reserv_time', 'status', 'package_id', 'disapprove_reason', 'total_pay', 'receipt_no', 'amount_paid'];
    
    /**
     * Make a model that connects to event detail
     * @return type
     */
    public function event_detail(){
        return $this->belongsTo('App\Model\EventDetail', 'event_id', 'event_id');
    }

    /**
     * Make a relation with customer info
     * @return type
     */
    public function customer_info(){
        return $this->belongsTo('App\Model\CustomerInfo', 'cust_id', 'cust_id');
    }
    
    /**
     * Make a relation with package detail
     * @return type
     */
    public function package_detail(){
        return $this->belongsTo('App\Model\PackageDetail', 'package_id', 'package_id');
    }
    
    /**
     * Get the list of equipment in reservation
     * @return type
     */
    public function equipment(){
        return $this->belongsToMany('App\Model\Equipment', 'reservation_equipments', 'reserv_id', 'equipment_id')
                ->withPivot('quantity', 'id');
    }
    
    /**
     * Get the list of worker in reservation
     * @return type
     */
    public function worker(){
        return $this->belongsToMany('App\Model\Worker', 'reservation_workers', 'reserv_id', 'worker_id')
                ->withPivot('id');
    }
           
}
