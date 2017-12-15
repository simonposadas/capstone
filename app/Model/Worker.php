<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    /**
     * Unique ID
     * @var type 
     */
    protected $primaryKey = 'worker_id';
    
    /**
     * Table to connect
     * @var type 
     */
    protected $table = 'worker';
    
    /**
     * Disable creation of created_at and updated_at
     * @var type 
     */
    public $timestamps = false;
    
    /**
     * Mass variable assignment
     * @var type 
     */
    protected $fillable = ['worker_lname', 'worker_fname', 'worker_mname', 'worker_age', 'worker_role_id', 'status'];
    
    /**
     * Get the role of the worker
     * @return type
     */
    public function worker_role(){
        return $this->belongsTo('App\Model\WorkerRole', 'worker_role_id', 'worker_role_id');
    }
}
