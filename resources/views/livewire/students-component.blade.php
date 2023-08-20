@push('style')
<link rel="stylesheet" href="{{url('')}}/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{url('')}}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endpush

<div>
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
                  <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#addStudentModal">
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th style="text-align: center;">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      @if ($students->count() > 0)
                      @foreach ($students as $student)
                      <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td style="text-align: center;">
                          <button class="btn btn-sm btn-secondary" wire:click="viewStudentDetails({{ $student->id }})">View</button>
                          <button class="btn btn-sm btn-primary" wire:click="editStudents({{ $student->id }})">Edit</button>
                          <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $student->id }})">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td colspan="4" style="text-align: center;"><small>No Student Found</small></td>
                      </tr>
                      @endif
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
  <!-- Modal -->
  <!-- Excel Modal -->
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
  <!-- End Excel Modal -->
  <div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form wire:submit.prevent="storeStudentData">
            <div class="form-group row">
              <label for="student_id" class="col-3">Student ID</label>
              <div class="col-9">
                <input type="number" id="student_id" class="form-control" wire:model="student_id">
                @error('student_id')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-3">Name</label>
              <div class="col-9">
                <input type="text" id="name" class="form-control" wire:model="name">
                @error('name')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-3">Email</label>
              <div class="col-9">
                <input type="email" id="email" class="form-control" wire:model="email">
                @error('email')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-3">Phone</label>
              <div class="col-9">
                <input type="number" id="phone" class="form-control" wire:model="phone">
                @error('phone')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-3"></label>
              <div class="col-9">
                <button type="submit" class="btn btn-sm btn-primary">Add Student</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form wire:submit.prevent="editStudentData">
            <div class="form-group row">
              <label for="student_id" class="col-3">Student ID</label>
              <div class="col-9">
                <input type="number" id="student_id" class="form-control" wire:model="student_id">
                @error('student_id')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-3">Name</label>
              <div class="col-9">
                <input type="text" id="name" class="form-control" wire:model="name">
                @error('name')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-3">Email</label>
              <div class="col-9">
                <input type="email" id="email" class="form-control" wire:model="email">
                @error('email')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-3">Phone</label>
              <div class="col-9">
                <input type="number" id="phone" class="form-control" wire:model="phone">
                @error('phone')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-3"></label>
              <div class="col-9">
                <button type="submit" class="btn btn-sm btn-primary">Edit Student</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div wire:ignore.self class="modal fade" id="viewStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Student Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewStudentModal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>ID: </th>
                <td>{{ $view_student_id }}</td>
              </tr>

              <tr>
                <th>Name: </th>
                <td>{{ $view_student_name }}</td>
              </tr>

              <tr>
                <th>Email: </th>
                <td>{{ $view_student_email }}</td>
              </tr>

              <tr>
                <th>Phone: </th>
                <td>{{ $view_student_phone }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  window.addEventListener('close-modal', event =>{
  $('#addStudentModal').modal('hide');
  $('#editStudentModal').modal('hide');
  });
  window.addEventListener('show-edit-student-modal', event =>{
  $('#editStudentModal').modal('show');
  });
  window.addEventListener('show-view-student-modal', event =>{
  $('#viewStudentModal').modal('show');
  });
</script>
<script src="{{url('')}}/assets/bundles/datatables/datatables.min.js"></script>
<script src="{{url('')}}/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('')}}/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="{{url('')}}/assets/js/page/datatables.js"></script>

@endpush