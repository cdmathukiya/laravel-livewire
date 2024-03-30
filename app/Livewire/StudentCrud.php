<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentCrud extends Component
{
    public $students, $name, $email, $student_id;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:students,email'
    ];

    public function render()
    {
        $this->students = Student::all();
        return view('livewire.student-crud');
    }

    public function save()
    {
        $this->validate();

        Student::create([
            'name' => $this->name,
            'email' => $this->email
        ]);

        session()->flash('message', 'Student created successfully.');
        $this->resetInputFields();
        return $this->redirect('/students');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        $student = Student::find($this->student_id);
        $student->update([
            'name' => $this->name,
            'email' => $this->email
        ]);

        session()->flash('message', 'Student updated successfully.');
        $this->resetInputFields();
        return $this->redirect('/students');
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Student deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->updateMode = false;
    }
}
