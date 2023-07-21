@extends('layouts.app')
@section('style')
<!-- General CSS Files -->
<link rel="stylesheet" href="{{url('')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{url('')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('main')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Siswa</h4>
            </div>
            <div class="card-body">
              <div class="buttons mb-3">
                <button type="button" class="btn btn-icon icon-left btn-primary " data-toggle="modal"
                  data-target=".bd-example-modal-lg">
                  <i class="far fa-edit"></i>
                  Tambah
                </button>
                <button type="button" class="btn btn-icon icon-left btn-success" data-toggle="modal"
                  data-target=".bd-example-modal-sm">
                  <i class="far fa-edit"></i>
                  Import Excel
                </button>
                <a href="{{url('admin/siswa/excel')}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Export Excel</a>
              </div>
              
              <div class="table-responsive">

                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                  <thead>
                    <tr>
                      <th>NIS</th>
                      <th>NAMA</th>
                      <th>GENDER</th>
                      <th>EMAIL</th>
                      <th>KELAS</th>
                      <th>OPSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->nis }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->gender }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->kelas }}</td>
                      <td>
                        <div class="row buttons">

                          <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                          <form action="{{ url('admin/siswa/'.$user->id)}}" method="POST" id="deleteForm-{{$user->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon btn-danger" onclick="showConfirmation(event, {{$user->id}})"><i class="fas fa-times"></i></button>
                          </form>

                      </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Create modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{url('/admin/siswa')}}" method="POST" class="form-group">
        @csrf
        <div class="modal-body">
          <button type="button" class="btn btn-success mb-3" id="btnTambahBaris">Tambah Baris</button>
          <table id="dataTable" class="table table-striped table-hover" style="width:100%;">
            <thead>
              <tr>
                <th>NIS</th>
                <th>NAMA</th>
                <th>GENDER</th>
                <th>EMAIL</th>
                <th>KELAS</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
              <tr
                <td>
                  <input wire:model="body" name="nis[]" type="text" class="form-control">
                </td>
                <td>
                  <input name="nama[]" type="text" class="form-control">
                </td>
                <td>
                  <select name="gender[]" class="custom-select" id="inputGroupSelect04">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </td>
                <td>
                  <input name="email[]" type="text" class="form-control">
                </td>
                <td>
                  <select name="kelas[]" class="custom-select" id="inputGroupSelect04">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </td>
                <td>
                  <button type="button" class="btn btn-icon btn-danger btn-delete-row"><i class="fas fa-times"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- End Create modal -->
<!-- Small Modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mySmallModalLabel">Import Siswa Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{ url('/admin/siswa/excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Download Template</label>
            <div class="input-group">
              <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
            </div>
          </div>
          <div class="form-group">
            <label>File Excel</label>
            <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Small Modal -->
@endsection
@section('script')
<!-- JS Libraies -->
<script src="{{url('')}}/assets/bundles/datatables/datatables.min.js"></script>
<script src="{{url('')}}/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('')}}/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="{{url('')}}/assets/js/page/datatables.js"></script>
@endsection
