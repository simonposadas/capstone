<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Model\FoodType;
use App\Model\FoodDetail;
use App\Http\Requests\Reservation\ReservationIdRequest;
use Notification;
use App\Notifications\ReservationApprove;
use App\Notifications\ReservationDisapprove;
use App\Http\Controllers\Controller;

/**
 * 
 */
class FoodTypeController extends Controller {
    /**
     * View directory
     * @var type 
     */
    protected $view = 'admin.';

    // FOOD
    public function foodType(){
        $types = FoodType::where('status', 0)
            ->get();
        return view($this->view . 'foodtype', ['types' => $types ]);
    }

    public function getFoodType(Request $req){
        // $type = FoodDetail::select('*')
        //     ->where('food_id',$req->id)
        //     ->get();
        // dd($type);
        return response()->json($types);
    }

    public function addFoodType(){
        FoodType::insert([ 
            'food_type_name' => $_POST['name']
            ]);
        alert()->success('Successfully added a food type', 'Success')->persistent('Close');

        return redirect('/admin/foodtype');
    }

    public function editFoodType(){
        FoodType::where('food_type_id', $_POST['id'])
            ->update(['food_type_name' => $_POST['name']
        ]);
            
        alert()->success('Successfully edited a food', 'Success')->persistent('Close');

        return redirect('/admin/foodtype');
    }
    
    public function deleteFoodType(){
        if(FoodType::where('food_type_id', $_POST['id'])->delete()){
            FoodTYpe::where('food_type_id', $_POST['id'])->delete();
            alert()->success('Successfully deleted a food type', 'Success')->persistent('Close');
        }else{
        alert()->error('Something went wrong deleting the food type', 'Error')->persistent('Close');
        }
        return redirect('/admin/foodtype');
    }
    // END FOOD
}