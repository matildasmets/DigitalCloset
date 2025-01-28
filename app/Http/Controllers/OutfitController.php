<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Clothing;

class OutfitController extends Controller
{
    public function create(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3',
            'occasion' => 'required',
        ]);

        Session::put('outfit', $attributes);

        return redirect('/put-outfit-together/top');
    }

    public function top()
    {
        $tops = Clothing::where('user_id', Auth::id())->where('type', 'top')->get();
        return view('outfit.top', ['tops' => $tops]);
    }

    public function pants()
    {
        $pants = Clothing::where('user_id', Auth::id())->where('type', 'pants')->get();
        return view('outfit.pants', ['pants' => $pants]);
    }

    public function shoes()
    {
        $shoes = Clothing::where('user_id', Auth::id())->where('type', 'shoes')->get();
        return view('outfit.shoes', ['shoes' => $shoes]);
    }

    public function jacket()
    {
        $jacket = Clothing::where('user_id', Auth::id())->where('type', 'jacket')->get();
        return view('outfit.jacket', ['jacket' => $jacket]);
    }

    public function accessory()
    {
        $accessory = Clothing::where('user_id', Auth::id())->where('type', 'accessory')->get();
        return view('outfit.accessory', ['accessory' => $accessory]);
    }

    public function addTop(Request $request)
    {
        $attributes = $request->validate([
            'top' => 'required',
        ]);

        $outfit = Session::get('outfit', []);
        $outfit['top'] = $attributes['top'];
        Session::put('outfit', $outfit);

        return redirect('/put-outfit-together/pants');
    }
}
