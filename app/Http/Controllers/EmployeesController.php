<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function insert(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'image' => 'required'
        ]);
        
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->number = $request->number;

        if($request->hasFile('image')){
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png'
            ]);

            $image = $request->file('image');
            $new_image_name = date('Y-md-d').time().".".$image->extension();

            $destination_path = public_path('/images');
            $image->move($destination_path,$new_image_name);

            $employee->image_url = 'images/'.$new_image_name;
        }
    
        $employee->save();

        ?>
        <script>
            alert('Employee Record Added Successfully');
        </script>


        <?php

        return view('welcome');
    }

    public function fetch(){
        // $totalEmployees = Employee::get();
        $totalEmployees = Employee::orderby('id','asc')->paginate(5);
        return view('fetch',['totalEmployees' => $totalEmployees]);
    }

    public function edit($id){
        $employee = Employee::find($id);
        return view('edit')->with(['employee' => $employee]);
    }

    public function update(Request $request){
        $employee = Employee::find($request->id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->number = $request->number;
        
        if($request->hasFile('image')){
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png'
            ]);

            $image = $request->file('image');
            $new_image_name = date('Y-md-d').time().".".$image->extension();
            $destination_path = public_path('/images');
            $image->move($destination_path,$new_image_name);

            $employee->image_url = 'images/'.$new_image_name;
        }

        $employee->save();


        return redirect('/fetch')->with('success', 'Updated Successfully');   


        // $totalEmployees = Employee::orderby('id','asc')->paginate(5);
        // return view('fetch')->with(['totalEmployees' => $totalEmployees]);

    }


    public function delete($id){
        $employee = Employee::find($id);
        $employee->delete();

        // $totalEmployees = Employee::orderby('id','asc')->paginate(5);
        // return view('fetch',['totalEmployees' => $totalEmployees]);
        // return redirect('/fetch');


        return redirect()->back()->with('success', 'Deleted Successfully');   


    }

}
