<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Model\Worker;
use App\Model\WorkerRole;
use App\Http\Requests\Reservation\ReservationIdRequest;
use Notification;
use App\Notifications\ReservationApprove;
use App\Notifications\ReservationDisapprove;
use App\Http\Controllers\Controller;

/**
 * 
 */
class EmployeeRoleController extends Controller {
    /**
     * View directory
     * @var type 
     */
    protected $view = 'admin.';

    // EMPLOYEE

    public  function employeeRole()
    {
        $empt = WorkerRole::where('status', 0)
            ->get();
        return view($this->view . 'employeerole', ['type' => $empt]);
    }
    
    public function getEmployeeRole(Request $req){
        $type = Worker::where('worker_id',$req->id)->get();
        $empt = WorkerRole::where('status', 0)->get();
        return response()->json($type, $empt);
    }

    public function addEmployeeRole(){
        WorkerRole::insert([ 
            'worker_role_description' => $_POST['role']
            ]);
        alert()->success('Successfully added a worker', 'Success')->persistent('Close');
 
        return redirect('/admin/employeerole');
    }
    
    public function editEmployeeRole(){
        WorkerRole::where('worker_role_id', $_POST['id'])
            ->update(['worker_role_description' => $_POST['role']
        ]);

        alert()->success('Successfully edited a worker', 'Success')->persistent('Close');
        
        return redirect('/admin/employeerole');
    }
    public function deleteEmployeeRole(){
        if(WorkerRole::where('worker_role_id', $_POST['id'])->delete()){
            WorkerRole::where('worker_role_id', $_POST['id'])->delete();
            alert()->success('Successfully deleted a worker role', 'Success')->persistent('Close');
           }else{
           alert()->error('Something went wrong deleting the worker role', 'Error')->persistent('Close');
           }
           return redirect('/admin/employeerole');
    }
    // END EMPLOYEE
}