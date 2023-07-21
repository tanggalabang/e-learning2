<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Relasi;
use phpDocumentor\Reflection\Types\This;


class RelasiEditComponent extends Component
{
  public $selectedCheckboxes = [];
  public $selectedCheckboxes2 = [];
 
  public function updatedSelectedCheckboxes($value) {
    dd($this->selectedCheckboxes);

  }
  public function updatedSelectedCheckboxes2($value) {
    dd($this->selectedCheckboxes2);
                foreach ($selectedCheckboxes2 as $subject_id) {
//                 $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
//                 if (! empty($getAlreadyFirst)) {
//                     $getAlreadyFirst->status = $request->status;
//                     $getAlreadyFirst->save();
//                 //dd($request->subject_id);
//                 } else {
                    $save = new Relasi;
                    $save->kelas_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
               //  }
            }


  }
  
    public function storeStudentData() {
    //on form submit validation
    $this->validate([
      'kode_kelas' => 'required|unique:kelas,kelas_pendek,'.$this->student_edit_id.'', //Validation with ignoring own data
      'kelas_pendek' => 'required',
      // 'gender' => 'required',
      // 'email' => 'required|email',
      // 'kelas' => 'required',
    ]);

    //Add Student Data
    $student = new Kelas();
    $student->kode_kelas = $this->kode_kelas;
    $student->kelas_pendek = $this->kelas_pendek;
    // $student->gender = $this->gender;
    // $student->email = $this->email;
    // $student->kelas = $this->kelas;

    $student->save();

    // session()->flash('message', 'New student has been added successfully');
    $this->dispatchBrowserEvent('swal:modal', [
      'type' => 'success',
      'title' => 'Record added successfully',
      'text' => '',
    ]);

    $this->kode_kelas = '';
    $this->kelas_pendek = '';
    // $this->gender = '';
    // $this->email = '';
    // $this->kelas = '';

    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');

  }



  public function render() {
    $query = Kelas::query();
    $query2 = Mapel::query();
    // $query->when($this->searchColumnsCategoryId != "", function($q) {
    //   return $q->where('id', $this->searchColumnsCategoryId);
    // });

    $siswas = $query->latest()->get();
    $mapels = $query2->latest()->get();

    return view('livewire.admin.relasi-edit-component', compact('siswas', 'mapels'));
  }

}