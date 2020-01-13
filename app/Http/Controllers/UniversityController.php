<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::all();
        return view('admin.universities.universities')->with("universities",$universities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.universities.addUniversity');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request,[
           'name' => 'required | unique:universities',
           'phone' => 'required | min:10 | min:10 | unique:universities',
           'location' => 'required',
           'email' => 'required | email | unique:universities',
        ]);

        //Store
        $university = new University;
        $university->name =$request->name;
        $university->phone = $request->phone;
        $university->email = $request->email;
        $university->location = $request->location;
        $status = $university->save();
        if($status){
            return redirect()->back()->with("successs","University added successifully");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        $universities = University::all();
        return view('admin.universities.manageuniversities')->with('universities',$universities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updateItem = University::find($id);
        return view('admin.universities.updateform')->with("university", $updateItem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validation
        $this->validate($request,[
            'name' => 'required ',
            'phone' => 'required | min:10 | min:10 ',
            'location' => 'required',
            'email' => 'required | email',
         ]);
 
         //Store
         $university = University::where('id',$id)->get()->first();
         $university->name =$request->name;
         $university->phone = $request->phone;
         $university->email = $request->email;
         $university->location = $request->location;
         $status = $university->save();
         if($status){
            $universities=University::all();
             return view('admin.universities.manageuniversities')->with(["universities"=>$universities,"success"=>"Update submitted successifully !!!"]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $universityToDelete = University::find($id);
        $universityToDelete->delete();
        return redirect()->back()->with('success',"The university was deleted successifully !!!");
    }
}
