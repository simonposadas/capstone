<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Model\FoodDetail;
use App\Model\FoodType;
use App\Http\Requests\Reservation\ReservationIdRequest;
use Notification;
use App\Notifications\ReservationApprove;
use App\Notifications\ReservationDisapprove;
use App\Http\Controllers\Controller;

/**
 * 
 */
class FoodController extends Controller {
    /**
     * View directory
     * @var type 
     */
    protected $view = 'admin.';

    // FOOD
    public function food(){
        $var = FoodDetail::join('food_type','food_details.food_type_id','=','food_type.food_type_id')->where('food_details.status',0)->get();
        $types = FoodType::where('status',0)->get();
        return view($this->view . 'food', ['var' => $var,'types' => $types ]);
    }

    public function getFood(Request $req){
        dd('flkjasldf');
        // $type = FoodDetail::select('*')
        //     ->where('food_id',$req->id)
        //     ->get();
        // dd($type);
        return response()->json($types);
    }

    public function addFood(){
        FoodDetail::insert([ 
            'food_name' => $_POST['name'],
            'food_type_id' => $_POST['food_type'],
            'price' => $_POST['price'],
            ]);
        alert()->success('Successfully added a food', 'Success')->persistent('Close');

        return redirect('/admin/food');
    }

    public function editFood(){
        FoodDetail::where('food_id', $_POST['id'])
            ->update(['food_name' => $_POST['name'], 
            'price' => $_POST['price']
        ]);
            
        alert()->success('Successfully edited a food', 'Success')->persistent('Close');

        return redirect('/admin/food');
    }
    
    public function deleteFood(){
        if(FoodDetail::where('food_id', $_POST['id'])->delete()){
            FoodDetail::where('food_id', $_POST['id'])->delete();
            alert()->success('Successfully deleted a food', 'Success')->persistent('Close');
        }else{
        alert()->error('Something went wrong deleting the food', 'Error')->persistent('Close');
        }
        return redirect('/admin/food');
    }
    // END FOOD
}