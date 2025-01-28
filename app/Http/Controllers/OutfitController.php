<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Clothing;
use App\Models\Outfits;

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

    public function show($id)
    {
        $outfit = Outfits::where('user_id', Auth::id())->findOrFail($id);

        $items = Clothing::whereIn('photo', [
            $outfit->top,
            $outfit->pants,
            $outfit->shoes,
            $outfit->jacket,
            $outfit->accessories
        ])->get()->keyBy('photo');

        $details = [
            'name' => $outfit->name,
            'type' => $outfit->type,
            'top' => [
                'photo' => $outfit->top,
                'name' => $items[$outfit->top]->name ?? null,
            ],
            'pants' => [
                'photo' => $outfit->pants,
                'name' => $items[$outfit->pants]->name ?? null,
            ],
            'shoes' => [
                'photo' => $outfit->shoes,
                'name' => $items[$outfit->shoes]->name ?? null,
            ],
            'jacket' => [
                'photo' => $outfit->jacket,
                'name' => $items[$outfit->jacket]->name ?? null,
            ],
            'accessories' => [
                'photo' => $outfit->accessories,
                'name' => $items[$outfit->accessories]->name ?? null,
            ],
        ];

        return view('outfit.show', ['outfit' => $details]);
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
        $jackets = Clothing::where('user_id', Auth::id())->where('type', 'jacket')->get();
        return view('outfit.jacket', ['jackets' => $jackets]);
    }

    public function accessory()
    {
        $accessories = Clothing::where('user_id', Auth::id())->where('type', 'accessory')->get();
        return view('outfit.accessory', ['accessories' => $accessories]);
    }

    public function preview()
    {
        $outfit = Session::get('outfit', []);
        $items = [];

        foreach ($outfit as $type => $id) {
            $items[$type] = Clothing::where('user_id', Auth::id())->find($id);
        }

        return view('outfit.preview', ['outfit' => $items]);
    }

    public function addTop(Request $request)
    {
        $attributes = $request->validate([
            'top' => 'required',
        ]);

        try {
            $outfit = Session::get('outfit', []);
            $outfit['top'] = $attributes['top'];
            Session::put('outfit', $outfit);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong while adding the top.']);
        }

        return redirect('/put-outfit-together/pants');
    }

    public function addPants(Request $request)
    {
        $attributes = $request->validate([
            'pants' => 'required',
        ]);

        try {
            $outfit = Session::get('outfit', []);
            $outfit['pants'] = $attributes['pants'];
            Session::put('outfit', $outfit);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong while adding the pants.']);
        }

        return redirect('/put-outfit-together/shoes');
    }

    public function addShoes(Request $request)
    {
        $attributes = $request->validate([
            'shoes' => 'required',
        ]);

        try {
            $outfit = Session::get('outfit', []);
            $outfit['shoes'] = $attributes['shoes'];
            Session::put('outfit', $outfit);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong while adding the shoes.']);
        }

        return redirect('/put-outfit-together/jacket');
    }

    public function addJacket(Request $request)
    {
        $attributes = $request->validate([
            'jacket' => 'required',
        ]);

        try {
            $outfit = Session::get('outfit', []);
            $outfit['jacket'] = $attributes['jacket'];
            Session::put('outfit', $outfit);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong while adding the jacket.']);
        }

        return redirect('/put-outfit-together/accessory');
    }

    public function addAccessory(Request $request)
    {
        $attributes = $request->validate([
            'accessory' => 'required',
        ]);

        try {
            $outfit = Session::get('outfit', []);
            $outfit['accessory'] = $attributes['accessory'];
            Session::put('outfit', $outfit);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong while adding the accessory.']);
        }

        return redirect('/put-outfit-together/preview');
    }
    public function store()
    {
        $outfit = Session::get('outfit', []);

        $ids = array_filter([
            $outfit['top'] ?? null,
            $outfit['pants'] ?? null,
            $outfit['shoes'] ?? null,
            $outfit['jacket'] ?? null,
            $outfit['accessory'] ?? null,
        ]);

        try {
            $items = Clothing::whereIn('id', $ids)->get()->keyBy('id');

            $newOutfit = new Outfits();
            $newOutfit->user_id = Auth::id();
            $newOutfit->name = $outfit['name'];
            $newOutfit->type = $outfit['occasion'];
            $newOutfit->top = $items[$outfit['top']]->photo ?? null;
            $newOutfit->pants = $items[$outfit['pants']]->photo ?? null;
            $newOutfit->shoes = $items[$outfit['shoes']]->photo ?? null;
            $newOutfit->jacket = isset($outfit['jacket']) ? $items[$outfit['jacket']]->photo : null;
            $newOutfit->accessories = isset($outfit['accessory']) ? $items[$outfit['accessory']]->photo : null;

            $newOutfit->save();
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong while saving the outfit.']);
        }

        return redirect('/dashboard')->with('success', 'Outfit added successfully!');
    }
}
