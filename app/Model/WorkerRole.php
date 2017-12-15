<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkerRole extends Model
{
    /**
     * Unique ID
     * @var type 
     */
    protected $primaryKey = 'worker_role_id';
    
    /**
     * Table to connect
     * @var type 
     */
    protected $table = 'worker_role';
    
    /**
     * Disable creation of created_at and updated_at
     * @var type 
     */
    public $timestamps = false;
    
    /**
     * Mass variable assignment
     * @var type 
     */
    protected $fillable = ['worker_role_description', 'status'];
}
