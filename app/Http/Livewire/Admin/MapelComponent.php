<?php

namespace App\Http\Livewire\Admin;

use App\Models\Mapel;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;
use Livewire\WithPagination;


class MapelComponent extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';


  public
    $nama,

    $kelas_pendek,
  // $nis,
  // $nama,
  // $gender,
  // $email,
  // $kelas,
  $student_edit_id,
  $student_delete_id;

  public $view_student_nis,
  $view_student_name,
  $view_student_gender,
  $view_student_email,
  $view_student_kelas;


  public $searchTerm,
  $searchColumnsCategoryId;

  //live validasi
  // public function updated($fields) {
  //   $this->validateOnly($fields, [
  //     'nis' => 'required|unique:users,nis,'.$this->student_edit_id.'', //Validation with ignoring own data
  //     'nama' => 'required',
  //     'gender' => 'required',
  //     'email' => 'required|email',
  //     'kelas' => 'required',
  //   ]);
  // }

  public function storeStudentData() {
    //on form submit validation
    // $this->validate([
    //   'kode_kelas' => 'required|unique:kelas,kelas_pendek,'.$this->student_edit_id.'', //Validation with ignoring own data
    //   'kelas_pendek' => 'required',
    //   // 'gender' => 'required',
    //   // 'email' => 'required|email',
    //   // 'kelas' => 'required',
    // ]);

    //Add Student Data
    $student = new Mapel();
    $student->nama = $this->nama;
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

    $this->nama = '';
    // $this->gender = '';
    // $this->email = '';
    // $this->kelas = '';

    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');

  }
  //
  // public function resetInputs() {
  //   $this->nis = '';
  //   $this->nama = '';
  //   $this->gender = '';
  //   $this->email = '';
  //   $this->kelas = '';
  // }
  //
  // public function close() {
  //   $this->resetInputs();
  // }
  //
  // public function editStudents($id) {
  //   $student = User::where('id', $id)->first();
  //   $this->nis = $student->nis;
  //   $this->nama = $student->name;
  //   $this->gender = $student->gender;
  //   $this->email = $student->email;
  //   $this->kelas = $student->kelas;
  //
  //   $this->dispatchBrowserEvent('show-edit-student-modal');
  // }
  //
  // public function editStudentData() {
  //   //on form submit validation
  //   $this->validate([
  //     //'student_id' => 'required|unique:students,student_id,'.$this->student_edit_id.'', //Validation with ignoring own data
  //     'nis' => 'required|unique:users,nis,'.$this->student_edit_id.'', //Validation with ignoring own data
  //     'nama' => 'required',
  //     'gender' => 'required',
  //     'email' => 'required|email',
  //     'kelas' => 'required',
  //   ]);
  //
  //   $student = User::where('id', $this->student_edit_id)->first();
  //   $student->nis = $this->nis;
  //   $student->name = $this->nama;
  //   $student->gender = $this->gender;
  //   $student->email = $this->email;
  //   $student->kelas = $this->kelas;
  //
  //   $student->save();
  //
  //   $this->dispatchBrowserEvent('swal:modal', [
  //     'type' => 'success',
  //     'title' => 'Record added successfully',
  //     'text' => '',
  //   ]);
  //
  //   //For hide modal after add student success
  //   $this->dispatchBrowserEvent('close-modal');
  // }
  //
  // protected $listeners = ['deleteConfirmed' => 'deleteStudentData'];
  // //Delete Confirmation
  // public function deleteConfirmation($id) {
  //   $this->student_delete_id = $id; //student id
  //
  //   $this->dispatchBrowserEvent('swal:confirm', [
  //     'type' => 'warning',
  //     'title' => 'Apakah Anda yakin?',
  //     'text' => 'Data akan dihapus permanen',
  //   ]);
  // }
  //
  // public function deleteStudentData() {
  //   $student = User::where('id', $this->student_delete_id)->first();
  //   $student->delete();
  //
  //   //         session()->flash('message', 'Student has been deleted successfully');
  //
  //   $this->dispatchBrowserEvent('swal:modal', [
  //     'type' => 'success',
  //     'title' => 'Record amodalbababs',
  //     'text' => '',
  //   ]);
  //   $this->student_delete_id = '';
  // }
  //
  // public function viewStudentDetails($id) {
  //   $student = User::where('id', $id)->first();
  //
  //   $this->view_student_nis = $student->nis;
  //   $this->view_student_name = $student->name;
  //   $this->view_student_gender = $student->gender;
  //   $this->view_student_email = $student->email;
  //   $this->view_student_kelas = $student->kelas;
  //
  //   $this->dispatchBrowserEvent('show-view-student-modal');
  // }
  //
  // public function closeViewStudentModal() {
  //   $this->view_student_nis = '';
  //   $this->view_student_name = '';
  //   $this->view_student_nis = '';
  //   $this->view_student_email = '';
  //   $this->view_student_kelas = '';
  // }


  public function render() {
    $query = Mapel::query();
    $query->when($this->searchTerm != "", function($q) {
      return $q->where('mapel', 'like', '%'.$this->searchTerm.'%');
      // ->orWhere('gender', 'like', '%'.$this->searchTerm.'%')
      // ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
      // ->orWhere('kelas', 'like', '%'.$this->searchTerm.'%');
    });
    // $query->when($this->searchColumnsCategoryId != "", function($q) {
    //   return $q->where('id', $this->searchColumnsCategoryId);
    // });

    $siswas = $query->latest()->paginate(20);;

    return view('livewire.admin.mapel-component', compact('siswas'));
  }
}
