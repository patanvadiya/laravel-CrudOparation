<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regi;
use App\validate;

class RegiController extends Controller
{
    public function Registrations()
    {
    	$data['data'] = Regi::get(); 
    	return view("Registrations",$data);
    }

    public function RegistrationsRequest(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'image' => 'required|mimes:png,jpeg',
        ]);

    	$data = new Regi();
    	$data->fname = $request->fname;
    	$data->lname = $request->lname;
    	$data->dob = $request->dob;
    	$data->email = $request->email;
    	$data->gender = $request->gender;
    	$data->hobby = implode(',', $request->hobby);
    	$imagePath = $request->file('image');
        $imageName = $imagePath->getClientOriginalName();
        $data->image = $request->file('image')->storeAs('uploads', $imageName, 'public');
        $data->save();
        return redirect("/");
    }

    public function editEmployee($id)
    {
    	$data['data'] = Regi::where("id",$id)->first();

    	return view("editEmployee",$data);
    }

    public function UpdateRequest(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'image' => 'mimes:png,jpeg',
        ]);

    	$data = Regi::where("id",$request->id)->first();
    	$data->fname = $request->fname;
    	$data->lname = $request->lname;
    	$data->dob = $request->dob;
    	$data->email = $request->email;
    	$data->gender = $request->gender;
    	$data->hobby = implode(',', $request->hobby);

        if($request->file('image')) {    
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();
            $data->image = $request->file('image')->storeAs('uploads', $imageName, 'public');
                $data->save();
        }

        $data->save();
        return redirect("/");
    }

    public function deleteEmployee($id)
    {
    	$data = Regi::where("id",$id)->first();
    	$data->delete();
    	return redirect("/"); 
    }
}
