<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReservationWorker extends Model
{
    /**
     * Mass variable assignment
     * @var type 
     */
    protected $fillable = ['reserv_id', 'worker_id'];
    
    /**
     * get the reservation details
     * @return type
     */
    public function reservation_detail(){
        return $this->belongsTo('App\Model\ReservationDetail', 'reserv_id', 'reserv_id');
    }
}
