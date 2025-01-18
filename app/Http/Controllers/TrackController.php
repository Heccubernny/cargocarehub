<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class TrackController extends Controller
{
    public function index()
    {
        return view('track.index');
    }

    public function track(Request $request)
    {
        if ($request->isMethod('post')) {
            $tnumber = trim($request->input('tnumber'));
            $tracking = Tracking::where('tracking_number', $tnumber)->first();

            if ($tracking) {
                $tracking->dispatch_date = Carbon::parse($tracking->dispatch_date)->format('F jS, Y, h:i A');
                $tracking->delivery_date = Carbon::parse($tracking->delivery_date)->format('F jS, Y, h:i A');
                $tracking->current_location_date = Carbon::parse($tracking->current_location_date)->format('F jS, Y, h:i A');

                $tracking->update(['current_location_date' => Carbon::now()]);

                $dispatchStatusMessage = $tracking->status == 'dispatched' ? $this->getStatusMessage('dispatched') : 'Active';
                $currentStatusMessage = $this->getStatusMessage($tracking->status);
                $destinationStatusMessage = $tracking->status == 'delivered' ? $this->getStatusMessage('delivered') : 'On the way';


                return view('track.index', [
                    'data' => $tracking,
                    'dispatchStatusMessage' => $dispatchStatusMessage,
                    'currentStatusMessage' => $currentStatusMessage,
                    'destinationStatusMessage' => $destinationStatusMessage
                ]);

            } else {
                return redirect()->back()->with('alert', 'Tracking Number Not Found');
            }
        }

        return view('track.index');
    }

    public function generatePDF($tnumber)
    {
        $tracking = Tracking::where('tracking_number', $tnumber)->first();

        if ($tracking) {
            $tracking->dispatch_date = Carbon::parse($tracking->dispatch_date)->format('F jS, Y, h:i A');
            $tracking->delivery_date = Carbon::parse($tracking->delivery_date)->format('F jS, Y, h:i A');
            $tracking->current_location_date = Carbon::parse($tracking->current_location_date)->format('F jS, Y, h:i A');


            $tracking->update(['current_location_date' => Carbon::now()]);

            $dispatchStatusMessage = $tracking->status == 'dispatched' ? $this->getStatusMessage('dispatched') : 'Active';
            $currentStatusMessage = $this->getStatusMessage($tracking->status);
            $destinationStatusMessage = $tracking->status == 'delivered' ? $this->getStatusMessage('delivered') : 'On the way';


            $pdf = PDF::loadView('track.invoice', [
                'data' => $tracking,
                'dispatchStatusMessage' => $dispatchStatusMessage,
                'currentStatusMessage' => $currentStatusMessage,
                'destinationStatusMessage' => $destinationStatusMessage
            ]);

            return $pdf->download('invoice_'.$tnumber.'.pdf');
        } else {
            return redirect()->back()->with('alert', 'Tracking Number Not Found');
        }
    }


    private function getStatusMessage($status)
    {
        switch ($status) {
            case 'dispatched':
                return 'Dispatched.';
            case 'in_transit':
                return 'In transit.';
            case 'out_for_delivery':
                return 'Out for delivery.';
            case 'active':
                return 'Active.';
            case 'delivered':
                return 'Delivered.';
            default:
                return 'Status unknown.';
        }
    }
}
