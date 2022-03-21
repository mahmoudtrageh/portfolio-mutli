<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Intervention\Image\ImageManagerStatic as Image;

class ClientsController extends Controller
{
    public function ClientView()
    {

        $clients = Client::latest()->get();
        return view('admin.client.client_view', compact('clients'));
    }


    public function ClientStore(Request $request)
    {

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/client/' . $name_gen);
        $save_url = 'upload/client/' . $name_gen;

        Client::insert([
            'name' => $request->name,
            'image' => $save_url,
            'url' => $request->url,
        ]);

        $notification = array(
            'message' => trans('admin/controllers.client-added-successfully'),
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method 



    public function ClientEdit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.client_edit', compact('client'));
    }


    public function ClientUpdate(Request $request)
    {

        $client_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {

            if (file_exists(public_path() . 'upload/client/' . $old_img)) {
                unlink($old_img);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/client/' . $name_gen);
            $save_url = 'upload/client/' . $name_gen;

            Client::findOrFail($client_id)->update([
                'name' => $request->name,
                'url' => $request->url,
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => trans('admin/controllers.client-updated-successfully'),
                'alert-type' => 'info'
            );

            return redirect()->route('all.client')->with($notification);
        } else {

            Client::findOrFail($client_id)->update([
                'name' => $request->name,
                'url' => $request->url,
            ]);

            $notification = array(
                'message' => trans('admin/controllers.client-updated-successfully'),
                'alert-type' => 'info'
            );

            return redirect()->route('all.client')->with($notification);
        } // end else 
    } // end method 



    public function ClientDelete($id)
    {

        $client = Client::findOrFail($id);
        $img = $client->image;
        if (file_exists(public_path() . 'upload/client/' . $img)) {
            unlink($img);
        }

        Client::findOrFail($id)->delete();

        $notification = array(
            'message' => trans('admin/controllers.client-deleted-successfully'),
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    } // end method 



}
