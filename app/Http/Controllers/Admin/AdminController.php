<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Model\ReservationDetail;
use App\Http\Requests\Reservation\ReservationIdRequest;
use Notification;
use App\Notifications\ReservationApprove;
use App\Notifications\ReservationDisapprove;
use App\Http\Controllers\Controller;

/**
 * 
 */
class AdminController extends Controller {
   // /**
   //  * 
   //  */
   // public function __construct() {
   //     $this->middleware('auth');
   // }

    /**
     * View directory
     * @var type 
     */
    protected $view = 'admin.';

    /**
     * Populate dashboard page
     * @return type
     */
    public function dashboard() {
        $types = ReservationDetail::where('status', 0)
        ->join('customer_info', 'customer_info.cust_id', '=', 'reservation_details.cust_id')
        ->join('event_details', 'event_details.event_id', '=', 'reservation_details.event_id')
        ->get();

        // dd($type);
        return view($this->view . 'dashboard', ['types' => $types]);
    }

    /**
     * Approve the reservation of customer
     * 
     * @param ReservationIdRequest $reservationIdRequest
     * @return type
     */
    public function approve(ReservationIdRequest $reservationIdRequest) {
        $reservation_detail = ReservationDetail::find($reservationIdRequest->reserv_id);
        $customer_info = $reservation_detail->customer_info;
        
        $budget_food = $_POST["budget_food"];
        $budget_equip = $_POST["budget_equip"];
        $budget_work = $_POST["budget_work"];

        $total = $budget_food + $budget_equip + $budget_work;

        /**
         * mark the reservation as approve
         */
        if ($reservation_detail->update(['status' => 1, 'total_pay' => $total, 'bud_food' => $reservationIdRequest->budget_food, 'bud_equip' => $reservationIdRequest->budget_equip, 'bud_worker' => $reservationIdRequest->budget_work])) {
            /*Notification::send($reservation_detail->customer_info, new ReservationApprove($customer_info, $reservationIdRequest->reserv_id));*/
        alert()->success('Successfully approved a reservation. Please wait for the confirmation.', 'Success');
            return redirect()->back();
        }
        /**
         * approving of reservation failed
         */
        alert()->error('Something went wrong in approving the reservation', 'Failed...');
        return redirect()->back();
    }
    
    /**
     * Disapproves the reservation of customer
     * @param ReservationIdRequest $reservationIdRequest
     * @return type
     */
    public function disapprove(ReservationIdRequest $reservationIdRequest) {
        $reservation_detail = ReservationDetail::find($reservationIdRequest->reserv_id);
        $customer_info = $reservation_detail->customer_info;

        /**
         * mark the reservation as approve
         */
        if ($reservation_detail->update(['status' => 2, 'disapprove_reason' => $reservationIdRequest->disapprove_reason])) {
            /*Notification::send($reservation_detail->customer_info, new ReservationDisapprove($customer_info, $reservationIdRequest->reserv_id, $reservationIdRequest->disapprove_reason));*/
            alert()->success('Successfully disapproved the reservation', 'Success');
            return redirect()->back();
        }
        /**
         * approving of reservation failed
         */
        alert()->error('Something went wrong in disapproving the reservation', 'Failed...');
        return redirect()->back();
    }


    /*  -- - - -- SEARCH -- - - -- */

     public function scopeSearch()
    {
        $searchItem = $_GET["searchItem"];

        $result = \DB::table('reservation_details')
        ->join('customer_info', 'customer_info.cust_id', '=', 'reservation_details.cust_id')
        ->where('cust_fname', $searchItem)
        ->OrWhere('cust_lname', $searchItem)
        ->OrWhere('reserv_id', $searchItem)
        ->select('reservation_details.*', 'customer_info.*')->get();

        if(count($result) == 0){
            alert()->error('No result to display. Please try again.', 'Error')->persistent('Close');
        return redirect()->back();
        }
        //return empty(request()->search) ? $q : $q->where('cust_fname', 'like', '%'.request()->search.'%');
        return view('admin.reservation.index')->with('reservation_details', $result);
    }

     public function scopeSearch3()
    {
        $searchItem = $_GET["searchItem3"];

        $result = \DB::table('worker')
        ->join('worker_role', 'worker_role.worker_role_id', '=', 'worker.worker_role_id')
        ->where('worker_fname', $searchItem)
        ->OrWhere('worker_lname', $searchItem)
        ->OrWhere('worker_mname', $searchItem)
        ->OrWhere('worker_age', $searchItem)
        ->select('worker.*')->get();

        if(count($result) == 0){
            alert()->error('No result to display. Please try again.', 'Error')->persistent('Close');
        return redirect()->back();
        }
        //return empty(request()->search) ? $q : $q->where('cust_fname', 'like', '%'.request()->search.'%');
        return view('/admin/
            worker')->with('worker', $result);
    }

    
    
    /* x xx SEARCH xx x */


    /**
     * Get reservation details
     * @param Request $req
     * @return type
     */
    public function getreserve(Request $req) {
        $reservation = ReservationDetail::find($req->id);
        $reservation->event_detail;
        $reservation->customer_info;
        $package_detail = $reservation->package_detail;
        $package_detail->package_type;
        return response()->json($reservation);
    }

    public function food(){
        $var = DB::table('food_details')->join('food_type','food_details.food_type_id','=','food_type.food_type_id')->where('food_details.status',0)->get();
        $type = DB::table('food_type')->where('status',0)->get();
        return view('/admin/food',['var' => $var,'type' => $type ]);
    }
    public function getfood(Request $req){
        $type = DB::table('food_details')->where('food_id',$req->id)->get();
        return response()->json($type);
    }

    public function addfood(){
        DB::table('food_details')->insert([ 
            'food_name' => $_POST['name'],
            'food_type_id' => $_POST['type'],
            'price' => $_POST['price'],
            ]);
        alert()->success('Successfully added a food', 'Success')->persistent('Close');
 
        return redirect('/admin/food');
    }
    
    public function editfood(){
        // if(DB::table('food_details')->where('food_id', $_POST['id'])->update(['food_name' => $_POST['name']])){
        //  alert()->success('Successfully edited a food', 'Success')->persistent('Close');
        // }
        // alert()->error('Something went wrong editing the food', 'Error')->persistent('Close');

        DB::table('food_details')->where('food_id', $_POST['id'])->update(['food_name' => $_POST['name'], 'price' => $_POST['price']]);

        alert()->success('Successfully edited a food', 'Success')->persistent('Close');

        return redirect()->back();
    }
    public function deletefood(){
        DB::table('food_details')->where('food_id',$_POST['id'])->update([ 
            'status' => 1
            ]);
        alert()->success('Successfully deleted a food', 'Success')->persistent('Close');
        return redirect('/admin/food');
    }
    public function foodtype(){
        $type = DB::table('food_type')->where('status',0)->get();
        return view('/admin/foodtype',['type' => $type ]);
    }
    public function getfoodtype(Request $req){
        $type = DB::table('food_type')->where('food_type_id',$req->id)->get();
        return response()->json($type);
    }

    public function addfoodtype(){
        DB::table('food_type')->insert([ 
            'food_type_name' => $_POST['name']
            ]);
        alert()->success('Successfully added a food type', 'Success')->persistent('Close');
        return redirect('/admin/foodtype');
    }
    public function editfoodtype(){
        DB::table('food_type')->where('food_type_id',$_POST['id'])->update([ 
            'food_type_name' => $_POST['name']
            ]);
        alert()->success('Successfully edited a food type', 'Success')->persistent('Close');
        return redirect('/admin/foodtype');
    }
    public function deletefoodtype(){
        DB::table('food_type')->where('food_type_id',$_POST['id'])->update([ 
            'status' => 1
            ]);
        alert()->success('Successfully deleted a food type', 'Success')->persistent('Close');
        return redirect('/admin/foodtype');
    }
    public function workerrole(){
        $type = DB::table('worker_role')->where('status',0)->get();
        return view('/admin/workerrole',['type' => $type ]);
    }
    public function getworkerrole(Request $req){
        $type = DB::table('worker_role')->where('worker_role_id',$req->id)->get();
        return response()->json($type);
    }

    public function addworkerrole(){
        DB::table('worker_role')->insert([ 
            'worker_role_description' => $_POST['name']
            ]);
        alert()->success('Successfully added a worker role', 'Success')->persistent('Close');
        return redirect('/admin/workerrole');
    }

    public function editworkerrole(){
        DB::table('worker_role')->where('worker_role_id',$_POST['id'])->update([ 
            'worker_role_description' => $_POST['name']
            ]);
        alert()->success('Successfully edited a worker role', 'Success')->persistent('Close');
        return redirect('/admin/workerrole');
    }

    public function deleteworkerrole(){
        DB::table('worker_role')->where('worker_role_id',$_POST['id'])->update([ 
            'status' => 1
            ]);
        alert()->success('Successfully deleted a worker role', 'Success')->persistent('Close');
        return redirect('/admin/workerrole');
    }

    public function worker(){
        $var = DB::table('worker')->join('worker_role','worker.worker_role_id','=','worker_role.worker_role_id')->where('worker.status',0)->get();
        $type = DB::table('worker_role')->where('status',0)->get();
        return view('/admin/worker',['var' => $var,'type' => $type ]);
    }

    public function getworker(Request $req){
        $type = DB::table('worker')->where('worker_id',$req->id)->get();
        return response()->json($type);
    }

    public function addworker(){
        DB::table('worker')->insert([ 
            'worker_fname' => $_POST['FirstName'],
            'worker_mname' => $_POST['MiddleName'],
            'worker_lname' => $_POST['LastName'],
            'worker_age' => $_POST['Age'],
            'worker_role_id' => $_POST['type'],
            ]);
        alert()->success('Successfully added a worker', 'Success')->persistent('Close');
        return redirect('/admin/worker');
    }

    public function editworker(){
        DB::table('worker')->where('worker_id',$_POST['id'])->update([ 
            'worker_fname' => $_POST['FirstName'],
            'worker_mname' => $_POST['MiddleName'],
            'worker_lname' => $_POST['LastName'],
            'worker_age' => $_POST['Age'],
            'worker_role_id' => $_POST['type'],
            ]);
        alert()->success('Successfully edited a worker', 'Success')->persistent('Close');
        return redirect('/admin/worker');
    }

    public function deleteworker(){
        DB::table('worker')->where('worker_id',$_POST['id'])->update([ 
            'status' => 1
            ]);
        alert()->success('Successfully added a worker', 'Success')->persistent('Close');
        return redirect('/admin/worker');
    }

    public function equipment(){
        $type = DB::table('equipment')->where('status',0)->get();
        return view('/admin/equipment',['type' => $type ]);
    }

    public function getequipment(Request $req){
        $type = DB::table('equipment')->where('equipment_id',$req->id)->get();
        return response()->json($type);
    }

    public function addequipment(){
        DB::table('equipment')->insert([ 
            'equipment_name' => $_POST['Equipment'],
            'cost' => $_POST['Cost'],
            'quantity' => $_POST['Quantity'],
            ]);
        alert()->success('Successfully added an equipment', 'Success')->persistent('Close');
        return redirect('/admin/equipment');
    }

    public function editequipment(){
        DB::table('equipment')->where('equipment_id',$_POST['id'])->update([ 
            'equipment_name' => $_POST['Equipment'],
            'cost' => $_POST['Cost'],
            'quantity' => $_POST['Quantity'],
            ]);
        alert()->success('Successfully edited an equipment', 'Success')->persistent('Close');
        return redirect('/admin/equipment');
    }

    public function deleteequipment(){
        DB::table('equipment')->where('equipment_id',$_POST['id'])->update([ 
            'status' => 1
            ]);
        alert()->success('Successfully deleted an equipment', 'Success')->persistent('Close'); 
        return redirect('/admin/equipment');
    }

    public function customer() {
        $type = DB::table('customer_info')->join('reservation_details', 'reservation_details.cust_id', '=', 'customer_info.cust_id')
        ->get();
        return view('/admin/customer',['type' => $type ]);
    }

    public function getcustomer(Request $req){
        $type = DB::table('customer_info')->where('cust_id',$req->id)->get();
        return response()->json($type);
    }
}
