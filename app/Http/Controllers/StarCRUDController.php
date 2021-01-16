<?php

namespace App\Http\Controllers;

use App\Models\Star;
use Illuminate\Http\Request;

class StarCRUDController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the stars profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stars = Star::all();
        return view('admin.stars.index',compact('stars'));
    }

    /**
     * Show the form for creating a new star profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stars.create');
    }

    /**
     * Store a newly created star profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'firstname' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required'
        ]);

        $imagepath = $request->file('image')->store('public/images');

        $star = new Star();

        $star->name = $request->name;
        $star->firstname = $request->firstname;
        $star->image = $imagepath;
        $star->description = $request->description;

        $star->save();

        return redirect()->route('stars.index')
                         ->with('success','Star Profile has been created successfully.');

    }

    /**
     * Display the specified star profile.
     *
     * @param  Star  $star
     * @return \Illuminate\Http\Response
     */
    public function show(Star $star)
    {
        return view('admin.stars.show',compact('star'));
    }

    /**
     * Display the specified star profile.
     *
     * @param  Star  $star
     * @return \Illuminate\Http\Response
     */
    public function edit(Star $star)
    {
        return view('admin.stars.edit',compact('star'));
    }

    /**
     * Update the specified star profile in storage.
     * @param Request $request
     * @param Star $star
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'firstname' => 'required',
            'description' => 'required'
        ]);

        $star = Star::find($id);

        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            $imagepath = $request->file('image')->store('public/images');
            $star->image = $imagepath;
        }

        $star->name = $request->name;
        $star->firstname = $request->firstname;
        $star->description = $request->description;

        $star->save();

        return redirect()->route('stars.index')
                         ->with('success','Star Profile has been updated successfully.');
    }

    /**
     * Remove the specified star profile from storage.
     *
     * @param  Star  $star
     * @return \Illuminate\Http\Response
    */
    public function destroy(Star $star)
    {
        $star->delete();

        return redirect()->route('stars.index')
                        ->with('success','Star Profile has been deleted successfully');
    }
}
