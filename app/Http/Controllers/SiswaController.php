<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Imports\SiswaImport;
use App\Exports\SiswaExport;
use Hash; //mengubah password
use Str;

class SiswaController extends Controller
{
  public function example()
  {
    $filename = 'example.xlsx';
    $path = public_path('file/' . $filename);

    // Download file with custom headers
    return response()->download($path, $filename, [
      'Content-Type' => 'application/vnd.ms-excel',
      'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
  }


  public function list()
  {
    // $data['getRecord'] = User::getSiswa();


    return view(
      'admin.siswa.list',
      ['siswas' => User::all()]
    );
  }
  // 
  // 
  public function import(Request $request)
  {
    //dd($request->all());
    $file = $request->file('file')->store('public/import');
    $import = new SiswaImport;
    $import->import($file);
    return redirect('/admin/siswa')->with('success', 'Data berhasil di Import');
  }
  // // 
  //   public function export() {
  //     return (new SiswaExport)->download('data_barang.xlsx');
  //   }
  // 
    public function create(Request $request) {
      dd($request->all());
  
      $nisArray = $request->input('nis');
      $namaArray = $request->input('nama');
      $genderArray = $request->input('gender');
      $emailArray = $request->input('email');
      $kelasArray = $request->input('kelas');
  
      // Menggunakan perulangan untuk menyimpan data siswa
      for ($i = 0; $i < count($nisArray); $i++) {
        $siswa = new User;
        $siswa->nis = $nisArray[$i];
        $siswa->name = $namaArray[$i];
        $siswa->gender = $genderArray[$i];
        $siswa->email = $emailArray[$i];
        $siswa->kelas = $kelasArray[$i];
        $siswa->save();
  
      }
  
      // Redirect atau tambahkan logika lain setelah penyimpanan data
  
      return redirect()->back()->with('success', 'Data siswa berhasil disimpan');
    }
  //   
  //   public function delete($id) {
  //     $resource = User::findOrFail($id);
  //     $resource->delete();
  // 
  //     return redirect()->back()->with('success', 'Data berhasil dihapus');
  //  }


}
