<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index', compact('batches'));
    }

    public function create()
    {
        return view('batches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255|unique:batches,label',
            'intake_start' => 'required|date',
            'intake_end' => 'required|date|after:intake_start',
            'extended_intake_end' => 'nullable|date|after:intake_end',
        ]);

        Batch::create($request->all());

        return redirect()->route('batches.index')->with('success', 'Batch created successfully.');
    }

    public function show(Batch $batch)
    {
        $availableStudents = Student::whereDoesntHave('batches', function ($query) use ($batch) {
            $query->where('batch_id', $batch->id);
        })->get();
    
        return view('batches.show', compact('batch', 'availableStudents'));
    }

    public function edit(Batch $batch)
    {
        return view('batches.edit', compact('batch'));
    }

    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            'label' => 'required|string|max:255|unique:batches,label,' . $batch->id,
            'intake_start' => 'required|date',
            'intake_end' => 'required|date|after:intake_start',
            'extended_intake_end' => 'nullable|date|after:intake_end',
        ]);

        $batch->update($request->all());

        return redirect()->route('batches.index')->with('success', 'Batch updated successfully.');
    }

    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()->route('batches.index')->with('success', 'Batch deleted successfully.');
    }

    public function assignStudent(Request $request, Batch $batch)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);

        $student = Student::findOrFail($request->student_id);
        $assignedLabel = $batch->label;

        if ($request->date('assignment_date') > $batch->intake_end && $request->date('assignment_date') <= $batch->extended_intake_end) {
            $assignedLabel .= '_extended';
        }

        $batch->students()->attach($student, ['assigned_label' => $assignedLabel]);

        return redirect()->route('batches.show', $batch)->with('success', 'Student assigned successfully.');
    }
}
