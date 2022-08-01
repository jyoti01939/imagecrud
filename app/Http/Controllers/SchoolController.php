<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::latest()->paginate(5);

        return view('schools.index',compact('schools'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'contact_no' => 'required|max:12',
            'city' => 'required',
            'state' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        School::create($input);

        return redirect()->route('school.index')
                        ->with('success','School Detail created successfully.');
    }

    public function edit($id)
    {
        $school = School::find($id);
        return view('schools.edit',compact('school'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'contact_no' => 'required|max:12',
            'city' => 'required',
            'state' => 'required'
        ]);
        $school = School::find($id);
        $school->name = $request->name;
        $school->address = $request->address;
        $school->email = $request->email;
        $school->contact_no = $request->contact_no;
        $school->city = $request->city;
        $school->state = $request->state;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $school->image = $profileImage ;
        }else{
            unset($school->image);
        }
        $school->save();
        return redirect()->route('school.index')
                        ->with('success','School Detail updated successfully');
    }


    public function destroy($id)
    {
        $school = School::find($id);
        $school->delete();
       return redirect()->back()->with('success','School Detail deleted successfully');

    }
}
