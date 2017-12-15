<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventDetail extends Model
{
   
     /**
     * Unique ID
     * @var type 
     */
    protected $primaryKey = 'event_id';
    
    /**
     *
     * @var type Remove automatic generation of timestamp
     */
    public $timestamps = false;
    
    /**
     * Mass variable assignment
     * @var type 
     */
    protected $fillable = ['event_type', 'place'];
}
