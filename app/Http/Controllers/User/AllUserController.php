<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;

use App\Mail\OrderMail;
use PDF;

class AllUserController extends Controller
{

    public function OrderDetails($order_id)
    {

        $order = Order::with('provinces', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('order.order_details', compact('order', 'orderItem'));
    } // end mehtod 



    public function InvoiceDownload($order_id)
    {
        $order = Order::with('provinces', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));



        $pdf = PDF::loadView('order.order_invoice', [
            'mode'                       => '',
            'format'                     => 'A4',
            'default_font_size'          => '12',
            'default_font'               => 'sans-serif',
            'margin_left'                => 10,
            'margin_right'               => 10,
            'margin_top'                 => 10,
            'margin_bottom'              => 10,
            'margin_header'              => 0,
            'margin_footer'              => 0,
            'orientation'                => 'P',
            'title'                      => 'Laravel mPDF',
            'author'                     => '',
            'watermark'                  => '',
            'show_watermark'             => false,
            'show_watermark_image'       => false,
            'watermark_font'             => 'sans-serif',
            'display_mode'               => 'fullpage',
            'watermark_text_alpha'       => 0.1,
            'watermark_image_path'       => '',
            'watermark_image_alpha'      => 0.2,
            'watermark_image_size'       => 'D',
            'watermark_image_position'   => 'P',
            'custom_font_dir'            => '',
            'custom_font_data'           => [],
            'auto_language_detection'    => false,
            'temp_dir'                   => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
            'pdfa'                       => false,
            'pdfaauto'                   => false,
            'use_active_forms'           => false,
        ], compact('order', 'orderItem'));
        return $pdf->stream('invoice.pdf');
    } // end mehtod 


    public function ReturnOrder(Request $request, $order_id)
    {

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);


        $notification = array(
            'message' => trans('site.return-request-sent-success'),
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
    } // end method 



    public function ReturnOrderList()
    {

        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.return_order_view', compact('orders'));
    } // end method 



    public function CancelOrders()
    {

        $orders = Order::where('user_id', Auth::id())->where('status', 'cancel')->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.cancel_order_view', compact('orders'));
    } // end method 



    ///////////// Order Traking ///////

    public function OrderTraking(Request $request)
    {

        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {

            // echo "<pre>";
            // print_r($track);

            return view('frontend.traking.track_order', compact('track'));
        } else {

            $notification = array(
                'message' => trans('site.invoice-code-invalid'),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // end mehtod 




}
