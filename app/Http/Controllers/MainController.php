<?php

namespace App\Http\Controllers;

use App\Models\Clothing;
use App\Models\Outfits;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $clothing = Clothing::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->limit(4)->get();

        return view('dashboard', ['clothing' => $clothing]);
    }

    public function closet()
    {
        $clothing = Clothing::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        $outfits = Outfits::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();

        return view('closet', ['clothing' => $clothing, 'outfits' => $outfits]);
    }

    public function random()
    {
        $userId = Auth::id();

        $top = Clothing::where('user_id', $userId)->where('type', 'top')->inRandomOrder()->first();
        $pants = Clothing::where('user_id', $userId)->where('type', 'pants')->inRandomOrder()->first();
        $shoes = Clothing::where('user_id', $userId)->where('type', 'shoes')->inRandomOrder()->first();

        $jacket = null;
        $accessory = null;

        if (rand(0, 1)) {
            $jacket = Clothing::where('user_id', $userId)->where('type', 'jacket')->inRandomOrder()->first();
        }

        if (rand(0, 1)) {
            $accessory = Clothing::where('user_id', $userId)->where('type', 'accessory')->inRandomOrder()->first();
        }

        return view('random', [
            'top' => $top,
            'pants' => $pants,
            'shoes' => $shoes,
            'jacket' => $jacket,
            'accessory' => $accessory,
        ]);
    }
}
