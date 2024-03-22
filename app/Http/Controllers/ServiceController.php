<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Auth;
use Gate;
class ServiceController extends Controller
{

    /*public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }*/
    public function index(){
        $services = Service::paginate(3);
        return view('pages.home', compact('services'));
    }
    public function addService(){
        return view('pages.add-service');
    }
    public function storeService(Request $request){
        $validated = $request->validate([
            'title'=>'required|max:255',
            'location'=>'required|max:255',
            'owner'=>'required|max:255',
        ]);
        Service::create([
            'title'=>request('title'),
            'location'=>request('location'),
            'owner'=>request('owner'),
            'user_id'=>Auth::id()
        ]);
        return redirect('/');
    }
    public function showServices(Service $service){
        $services = Service::all();
        return view('pages.show-services', compact('services'));
    }
    public function destroy(Service $service){
        $service->delete();
        return redirect('/');
    }
    public function edit(Service $service){
        return view('pages.edit-service', compact('service'));
    }
    public function storeUpdate(Service $service,Request $request){

        Service::where('id',$service->id)->update(
            $request->only(['title', 'location', 'owner'])
        );

        return redirect('/show-services');

    }
}