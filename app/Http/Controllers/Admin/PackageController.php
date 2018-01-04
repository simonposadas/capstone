<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Model\PackageDetail;
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
class PackageController extends Controller {
    /**
     * View directory
     * @var type 
     */
    protected $view = 'admin.';

    // PACKAGES

    public  function packages()
    {
        $package = PackageDetail::where('status', 0)->get();
        $food = FoodType::where('status', 0)->get();
        $main = FoodDetail::where('food_type_id', 10)->get();
        $soup = FoodDetail::where('food_type_id', 2)->get();
        $app = FoodDetail::where('food_type_id', 11)->get();
        $salad = FoodDetail::where('food_type_id', 12)->get();
        
        return view($this->view . 'packages', ['packages' => $package, 'foods' => $food, 'mains' => $main, 'soups' => $soup, 'apps' => $app, 'salads' => $salad]);
    }

    public function getPack(Request $req){
        $type = PackageDetail::where('package_id',$req->id)->get();
        // dd($type);
        return response()->json($types);
    }

    public function addPack(){
        PackageDetail::insert([ 
             'package_name' => $_POST['pname'],
             'package_price' => $_POST['price']
            ]);
        alert()->success('Successfully added a food', 'Success')->persistent('Close');

        return redirect('/admin/packages');
    }

    public function editFood(){
        if(PackageDetail::where('package_id', $_POST['id'])->update(['package_name' => $_POST['name']])){
        PackageDetail::where('package_id', $_POST['id'])->update(['package_name' => $_POST['name'], 'package_price' => $_POST['price']]);
        alert()->success('Successfully edited a food', 'Success')->persistent('Close');
        }else{
        alert()->error('Something went wrong editing the food', 'Error')->persistent('Close');
        }
        return redirect('/admin/packages');
    }

    public function deletePack(){
        
        PackageDetail::where('package_id', $_POST['id'])->delete();
        alert()->success('Successfully deleted a package', 'Success')->persistent('Close');
        
        return redirect('/admin/packages');
    }

    // END PACKAGES
}