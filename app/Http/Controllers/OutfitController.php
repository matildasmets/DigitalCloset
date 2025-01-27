<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothing;
use Illuminate\Support\Facades\Auth;

class OutfitController extends Controller
{
    public function addTop(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
        ]);

        $clothing = new Clothing();
        $clothing->user_id = Auth::id();
        $clothing->name = $request->name;
        $clothing->type = 'top';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = $clothing->user_id . '_' . time() . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('tops', $fileName, 'public');

            $clothing->photo = $filePath;
        }

        $clothing->save();

        return redirect('/dashboard')->with('success', 'Top added successfully!');
    }

    public function addPants(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
        ]);

        $clothing = new Clothing();
        $clothing->user_id = Auth::id();
        $clothing->name = $request->name;
        $clothing->type = 'pants';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = $clothing->user_id . '_' . time() . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('pants', $fileName, 'public');

            $clothing->photo = $filePath;
        }

        $clothing->save();

        return redirect('/dashboard')->with('success', 'Pants added successfully!');
    }

    public function addShoes(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
        ]);

        $clothing = new Clothing();
        $clothing->user_id = Auth::id();
        $clothing->name = $request->name;
        $clothing->type = 'shoes';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = $clothing->user_id . '_' . time() . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('shoes', $fileName, 'public');

            $clothing->photo = $filePath;
        }

        $clothing->save();

        return redirect('/dashboard')->with('success', 'Shoes added successfully!');
    }

    public function addJacket(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
        ]);

        $clothing = new Clothing();
        $clothing->user_id = Auth::id();
        $clothing->name = $request->name;
        $clothing->type = 'jacket';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = $clothing->user_id . '_' . time() . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('jackets', $fileName, 'public');

            $clothing->photo = $filePath;
        }

        $clothing->save();

        return redirect('/dashboard')->with('success', 'Jacket added successfully!');
    }

    public function addAccessory(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
        ]);

        $clothing = new Clothing();
        $clothing->user_id = Auth::id();
        $clothing->name = $request->name;
        $clothing->type = 'accessory';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = $clothing->user_id . '_' . time() . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('accessories', $fileName, 'public');

            $clothing->photo = $filePath;
        }

        $clothing->save();

        return redirect('/dashboard')->with('success', 'Accessory added successfully!');
    }
}
