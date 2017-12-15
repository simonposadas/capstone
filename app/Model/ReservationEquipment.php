<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReservationEquipment extends Model
{
    /**
     * Mass variable assignment
     * @var type 
     */
    protected $fillable = ['reserv_id', 'equipment_id', 'quantity'];
    
    /**
     * Make a connection with reservation detail
     * @return type
     */
    public function reservation_detail(){
        return $this->belongsTo('App\Model\ReservationDetail', 'reserv_id', 'reserv_id');
    }
    
    /**
     * Make a relation with equipment model
     * @return type
     */
    public function equipment(){
        return $this->belongsTo('App\Model\Equipment', 'equipment_id', 'equipment_id');
    }
}
