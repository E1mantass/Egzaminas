<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mechanic;
use App\Models\Service;
use File;
use Auth;
use Gate;

class MechanicController extends Controller{

    public function __construct(){
        $this->middleware('auth',['except'=>['show']]);
    }

    public function showMechanics(Mechanic $mechanic){
        $mechanics = Mechanic::all();
        return view('pages.show-mechanics', compact('mechanics'));
    }

    public function create(){
        $services = Service::all();
        return view('pages.add-mechanic', compact('services'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'specialization'=>'required|max:255',
            'city'=>'required|max:255',
            'service'=>'required|max:255'
        ]);
        if(request()->hasFile('poster')){
            $poster = $request->file('poster')->store('public/images');
            $path = str_replace('public/','',$poster);
        }
            Mechanic::create([
            'firstName'=>request('firstName'),
            'lastName'=>request('lastName'),
            'specialization'=>request('specialization'),
            'poster'=>$path,
            'city'=>request('city'),
            'service'=>request('service'),
            'user_id'=>Auth::id()
            ]);
        return redirect('/');
    }
    public function destroy(Mechanic $mechanic){
        $mechanic->delete();
        return redirect('/');
    }
    public function edit(Mechanic $mechanic){
        $services = Service::all();
        return view('pages.edit-mechanic', compact('mechanic', 'services'));
    }
    public function storeUpdate(Mechanic $mechanic,Request $request){
        if(request()->hasFile('poster')){
            File::delete(storage_path('app/public/'.$movie->poster));
            $poster = $request->file('poster')->store('public/images');
            $path = str_replace('public/','',$poster);
            Movie::where('id',$movie->id)->update(['poster'=>$path]);
        }
        Mechanic::where('id',$mechanic->id)->update(
            $request->only(['firstName', 'lastName', 'specialization', 'city', 'service'])
        );

        return redirect('/show-mechanics');

    }
}
