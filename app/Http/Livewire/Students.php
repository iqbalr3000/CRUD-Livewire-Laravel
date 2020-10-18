<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class Students extends Component
{
    public $students, $name, $study_group, $student_id;
    public $UpdateMode = false;

    public function render()
    {
        $this->students = Student::all();
        return view('livewire.students');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->study_group = ''; 
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'study_group' => 'required',
        ]);

        Student::create($validatedData);

        session()->flash('message', 'Student created succesfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $id;
        $this->name = $student->name;
        $this->study_group = $student->study_group;

        $this->UpdateMode = true;
    }

    public function cancel()
    {
        $this->UpdateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'study_group' => 'required',
        ]);

        $student = Student::find($this->student_id);
        $student->update([
            'name' => $this->name,
            'study_group' => $this->study_group,
        ]);

        $this->UpdateMode = false;

        session()->flash('message', 'Student updated succesfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Student deleted succesfully.');

    }

}
