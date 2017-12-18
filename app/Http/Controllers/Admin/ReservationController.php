<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ReservationDetail;
use App\Model\Equipment;
use App\Http\Requests\Reservation\ReservationIdRequest;
use App\Model\ReservationEquipment;
use App\Model\ReservationWorker;

use Session;
/**
 * 
 */
class ReservationController extends Controller {

    /**
     * View directory
     */
    protected $view = 'admin.';

    /**
     * Populate the list of reservation
     * @return type
     */
    public function reservation() {
        $details = ReservationDetail::where('status', '!=', 0)
        ->join('customer_info', 'customer_info.cust_id', '=', 'reservation_details.cust_id')
        ->get();

        return view($this->view . 'reservations', [
            'details' => $details,
            // 'equipments' => $this->create_dropdown(Equipment::all(), 'equipment_id', 'equipment_name')
        ]);
    }

    /**
     * Save to session
     * @return type
     */
    public function saveToSession(Request $request) {
        Session::put('item_list.'. $request->input('id'));

        return response()->json('success');
    }

    /**
     * Mark the reservation paid as half
     * 
     * @param ReservationIdRequest $reservationIdRequest
     * @return type
     */
    public function markHalf(ReservationIdRequest $reservationIdRequest) {
        if (ReservationDetail::find($reservationIdRequest->reserv_id)->update(['status' => 5, 'receipt_no' => $reservationIdRequest->receipt_no , 'amount_paid' => $reservationIdRequest->amount_paid]))
            /*return response()->json(['success' => true, 'title' => 'Success', 'message' => 'Successfuly mark as paid 1st half the reservation']);*/
            alert()->success('Successfully marked the reservation as half paid', 'Success');
            return redirect()->action('Admin\ReservationController@index');
        return response()->json(['success' => false, 'title' => 'Error', 'message' => 'Something went wrong in marking half paid the reservation']);
    }

    /**
     * Mark the reservation paid as full paid
     * 
     * @param ReservationIdRequest $reservationIdRequest
     * @return type
     */
    public function markSecondHalf(ReservationIdRequest $reservationIdRequest) {
        $reservation_detail = ReservationDetail::find($reservationIdRequest->reserv_id);
        $yiz = $reservationIdRequest->amount_paid;
        $no = $_POST["amount_paid"];
        $amount = $yiz + $no;
        
        if ($reservation_detail->update(['status' => 6, 'amount_paid' => $amount]))
            /*return response()->json(['success' => true, 'title' => 'Success', 'message' => 'Successfuly mark as paid 2nd half the reservation']);*/
        alert()->success('Successfully marked the reservation as fully paid', 'Success');
            return redirect()->action('Admin\ReservationController@index');
        return response()->json(['success' => false, 'title' => 'Error', 'message' => 'Something went wrong in marking 2nd half paid the reservation']);
    }

    /**
     * Mark the reservation as done
     * 
     * @param ReservationIdRequest $reservationIdRequest
     * @return type
     */
    public function markDone(ReservationIdRequest $reservationIdRequest) {
        if (ReservationDetail::find($reservationIdRequest->reserv_id)->update(['status' => 9]))
            return response()->json(['success' => true, 'title' => 'Success', 'message' => 'Successfuly mark the reservation as done']);
        return response()->json(['success' => false, 'title' => 'Error', 'message' => 'Something went wrong in marking the reservation as done']);
    }

    /**
     * Mark the reservation cancelled with refund
     * 
     * @param ReservationIdRequest $reservationIdRequest
     * @return type
     */
    public function cancelWithRefund(ReservationIdRequest $reservationIdRequest) {
        $reservation_detail = ReservationDetail::find($reservationIdRequest->reserv_id);

        if ($reservation_detail->update(['status' => 7])) {
            $this->UpdateEquipmentWorker($reservation_detail);
            return response()->json(['success' => true, 'title' => 'Success', 'message' => 'Successfuly cancelled the reservation with refund']);
        }

        return response()->json(['success' => false, 'title' => 'Error', 'message' => 'Something went wrong in cancelling the reservation with refund']);
    }

    /**
     * Mark the reservation cancelled with no refund
     * 
     * @param ReservationIdRequest $reservationIdRequest
     * @return type
     */
    public function cancelNoRefund(ReservationIdRequest $reservationIdRequest) {
        $reservation_detail = ReservationDetail::find($reservationIdRequest->reserv_id);
        
        if ($reservation_detail->update(['status' => 8])) {
            $this->UpdateEquipmentWorker($reservation_detail);
            return response()->json(['success' => true, 'title' => 'Success', 'message' => 'Successfuly cancelled the reservation with no refund']);
        }

        return response()->json(['success' => false, 'title' => 'Error', 'message' => 'Something went wrong in cancelling the reservation with no refund']);
    }

    /**
     * Update the equipment/worker assigned in reservation
     * 
     * @param ReservationDetail $reservation_detail
     */
    private function UpdateEquipmentWorker(ReservationDetail $reservation_detail) {
        /**
         * update the inventory
         */
            foreach ($reservation_detail->equipment as $equipment) {
                $equipment->quantity = $equipment->quantity + $equipment->pivot->quantity;
                $equipment->save();
        }
        /**
         * delete the assigned worker in the event
         */
        ReservationWorker::where('reserv_id', $reservation_detail->reserv_id)->delete();
        /**
         * Delete all the assigned equipment
         */
        ReservationEquipment::where('reserv_id', $reservation_detail->reserv_id)->delete();
    }
}
