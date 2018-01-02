<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Model\PackageDetail;
use App\Model\FoodDetail;
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
        $food = FoodDetail::where('status', 0)->get();
        
        return view($this->view . 'packages', ['packages' => $package, 'foods' => $food]);
    }

    public function getPack(Request $req){
        $type = PackageDetail::where('package_id',$req->id)->get();
        // dd($type);
        return response()->json($types);
    }

    public function addPack(){
        PackageDetail::insert([ 
             'food_name' => $_POST['name'],
             'food_type_id' => $_POST['type'],
             'price' => $_POST['price'],
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