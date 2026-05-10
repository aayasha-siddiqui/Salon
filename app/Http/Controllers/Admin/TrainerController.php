<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::latest()->paginate(10);
        return view('admin.trainers.index', compact('trainers'));
    }

    public function create()
{
    $courses = \App\Models\Course::all();
    return view('admin.trainers.create', compact('courses'));
}

   public function store(Request $request)
{
    $request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|email|unique:trainers,email',
        'phone'=>'required|string|max:20',
        'specialization'=>'required|string|max:255',
        'experience'=>'required|integer|min:0',
        'salary'=>'required|numeric|min:0',
        'status'=>'required|in:0,1',
    ]);

    $trainer = Trainer::create($request->all());

    // Assign courses
    if($request->courses){
        \App\Models\Course::whereIn('id',$request->courses)
            ->update(['trainer_id'=>$trainer->id]);
    }

    return redirect()->route('admin.trainers.index')
        ->with('success','Trainer added successfully.');
}

   public function edit(Trainer $trainer)
{
    $courses = \App\Models\Course::all();

    return view('admin.trainers.edit', compact('trainer','courses'));
}

 public function update(Request $request, Trainer $trainer)
{
    $request->validate([
        'name'=>'required|string|max:255',
        'email'=>"required|email|unique:trainers,email,{$trainer->id}",
        'phone'=>'required|string|max:20',
        'specialization'=>'required|string|max:255',
        'experience'=>'required|integer|min:0',
        'salary'=>'required|numeric|min:0',
        'status'=>'required|in:0,1',
    ]);

    $trainer->update($request->all());

    // Remove old assignments
    \App\Models\Course::where('trainer_id',$trainer->id)
        ->update(['trainer_id'=>null]);

    // Assign selected courses
    if($request->courses){
        \App\Models\Course::whereIn('id',$request->courses)
            ->update(['trainer_id'=>$trainer->id]);
    }

    return redirect()->route('admin.trainers.index')
        ->with('success','Trainer updated successfully.');
}
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return redirect()->route('admin.trainers.index')->with('success', 'Trainer deleted successfully.');
    }
}
