<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class Equipment extends Model
{
    /**
     * Unique key
     * @var type 
     */
    protected $primaryKey = 'equipment_id';
    
    /**
     * Disable automatic creation of created_at and updated_at
     * @var type 
     */
    public $timestamps = FALSE;
    
    /**
     * Table to connect
     * @var type 
     */
    protected $table = 'equipment';
    
    /**
     * Mass variable assignment
     * @var type 
     */
    protected $fillable = ['equipment_name', 'cost', 'quantity', 'status'];
    
    
    
}
