<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function manageOffer()
    {
        $offers = Offer::all()->sortByDesc('id')->values();
        return view('admin.layouts.offer.offer_table', compact('offers'));
    }

    public function add()
    {
        return view('admin.layouts.offer.add_offer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deadline' => 'required',
            'title' => 'required',
            'short_details' => 'required',
            'details' => 'required',
            'condition' => 'required',
            'image' => 'required',
        ]);
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('ymdhms') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/offer/'), $filename);
        }
        Offer::create([
            'deadline' => $request->deadline,
            'title' => $request->title,
            'short_details' => $request->short_details,
            'details' => $request->details,
            'condition' => $request->condition,
            'image' => $filename,
        ]);
        return redirect()->route('admin.manage.offer')->with('message', 'Offer Added Successfully');
    }

    public function viewOffer($id)
    {
        $offer = Offer::find($id);
        return view('admin.layouts.offer.view_offer', compact('offer'));
    }

    public function change(Request $request, $id)
    {
        $offer = Offer::find($id);
        $filename = "";
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/offer'), $filename);
        }
        $offer->update([
            'image' => $filename,
        ]);
        return redirect()->route('admin.manage.offer')->with('message', 'Offer Image Updated');
    }

    public function edit($id)
    {
        $offer = Offer::find($id);
        return view('admin.layouts.offer.edit_offer', compact('offer'));
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $offer->update([
            'deadline' => $request->deadline,
            'title' => $request->title,
            'short_details' => $request->short_details,
            'details' => $request->details,
            'condition' => $request->condition,
        ]);
        return redirect()->route('admin.manage.offer')->with('message', 'Offer Updated');
    }

    public function delete($id)
    {
        $offer = Offer::find($id);
        $image = str_replace('\\', '/', public_path('/uploads/offer/' . $offer->image));
        if (file_exists($image)) {
            unlink($image);
            $offer->delete();
            return redirect()->route('admin.manage.offer')->with('error', 'Offer deleted');
        }else{
            $offer->delete();
            return redirect()->route('admin.manage.offer')->with('error', 'image not found! Offer deleted');
        }

    }
}
