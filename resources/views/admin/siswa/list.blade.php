@extends('layouts.app')


@section('main')
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

                                        <button class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                                            data-target="#addStudentModal">
                                            Tambah
                                        </button>

                                        <button type="button" class="btn btn-icon icon-left btn-success"
                                            data-toggle="modal" data-target=".bd-example-modal-sm">
                                            Import Excel
                                        </button>
                                        <a href="{{ url('admin/siswa/excel') }}" class="btn btn-icon icon-left btn-warning">
                                            Export Excel</a>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <select wire:model="searchColumnsCategoryId" class="form-control w-25"
                                                style="float: right;">
                                                <option value="" selected>Kelas</option>
                                                @foreach (App\Models\User::pluck('kelas', 'id') as $id => $kelas)
                                                    <option value="{{ $id }}">{{ $kelas }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <input type="search" class="form-control" placeholder="Cari Data..."
                                                wire:model="searchTerm" />
                                        </div>
                                    </div>

                                    <table class="table table-striped table-hover" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>NAMA</th>
                                                <th>GENDER</th>
                                                <th>EMAIL</th>
                                                <th>KELAS</th>
                                                <th style="text-align: center;">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($siswas->count() > 0)
                                                @foreach ($siswas as $siswa)
                                                    <tr>
                                                        <td>{{ $siswa->nis }}</td>
                                                        <td>{{ $siswa->name }}</td>
                                                        <td>{{ $siswa->gender }}</td>
                                                        <td>{{ $siswa->email }}</td>
                                                        <td>{{ $siswa->kelas }}</td>
                                                        <td style="text-align: center;">
                                                            {{-- <button class="btn btn-sm btn-secondary"
                                                                wire:click="viewStudentDetails({{ $siswa->id }})">Lihat</button>
                                                            <button class="btn btn-sm btn-primary"
                                                                wire:click="editStudents({{ $siswa->id }})">Edit</button>
                                                            <button class="btn btn-sm btn-danger"
                                                                wire:click="deleteConfirmation({{ $siswa->id }})">Hapus</button> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4" style="text-align: center;"><small>No Student
                                                            Found</small></td>
                                                </tr>
                                            @endif
                                        </tbody>

                                    </table>

                                    <div style="float:right;">
                                        {{-- {{ $siswas->links() }} --}}
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

                    <form class="" action="{{ url('/admin/siswa/excel') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Download Template</label>
                                <div class="input-group">
                                    <a href="{{ url('/admin/siswa/excel-example') }}" class="btn btn-icon btn-primary"><i
                                            class="far fa-edit"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>File Excel</label>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <small>Note <b class="text-danger">*</b> : Type file harus xlsl, xls</small>
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
        <!-- Add Modal -->
        <div wire:ignore.self class="modal fade bd-example-modal-lg" id="addStudentModal" tabindex="-1"
            data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ url('admin/siswa') }}" method="post">
                            {{ csrf_field() }}
                            <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success buttons mb-3 addRow">
                                Tambah baris</a>
                            <table class="table table-striped table-hover" style="width:100%;">
                                <thead id="thead">
                                    <tr>
                                        <th>NIS</th>
                                        <th>NAMA</th>
                                        <th>GENDER</th>
                                        <th>EMAIL</th>
                                        <th>KELAS</th>
                                        <th style="text-align: center;">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group">
                                                <input type="text" class="form-control" name="nis[]">
                                            </div>
                                        </td>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group" >
                                                <input type="text" class="form-control" name="nama[]">
                                            </div>
                                        </td>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group" >
                                                <select class="form-control" name="gender[]">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group" >
                                                <input type="text" class="form-control" name="email[]">
                                            </div>
                                        </td>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group" >
                                                <select class="form-control" name="kelas[]">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="btn btn-icon icon-left btn-danger deleteRow">
                                                Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-sm btn-primary mb-3">Simpan</button>

                        </form>


                        {{-- <form wire:submit.prevent="storeStudentData">

                            <div class="form-group row">
                                <label for="nis" class="col-3">NIS</label>
                                <div class="col-9">
                                    <input type="number" id="nis" class="form-control" wire:model="nis">
                                    @error('nis')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama" class="col-3">NAMA</label>
                                <div class="col-9">
                                    <input type="text" id="nama" class="form-control" wire:model="nama">
                                    @error('nama')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-3">GENDER</label>
                                <div class="col-9">
                                    <select class="form-control" id="gender" wire:model="gender">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-3">EMAIL</label>
                                <div class="col-9">
                                    <input type="email" id="email" class="form-control" wire:model="email">
                                    @error('email')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kelas" class="col-3">KELAS</label>
                                <div class="col-9">
                                    <select class="form-control" id="kelas" wire:model="kelas">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    @error('kelas')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-3"></label>
                                <div class="col-9">
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form> --}}

                    </div>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->
        {{-- <div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" data-backdrop="static"
            data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            wire:click="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">




                        <form wire:submit.prevent="editStudentData">

                            <div class="form-group row">
                                <label for="nis" class="col-3">NIS</label>
                                <div class="col-9">
                                    <input type="number" id="nis" class="form-control" wire:model="nis">
                                    @error('nis')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama" class="col-3">NAMA</label>
                                <div class="col-9">
                                    <input type="text" id="nama" class="form-control" wire:model="nama">
                                    @error('nama')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-3">GENDER</label>
                                <div class="col-9">
                                    <select class="form-control" id="gender" wire:model="gender">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-3">EMAIL</label>
                                <div class="col-9">
                                    <input type="email" id="email" class="form-control" wire:model="email">
                                    @error('email')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kelas" class="col-3">KELAS</label>
                                <div class="col-9">
                                    <select class="form-control" id="kelas" wire:model="kelas">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    @error('kelas')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-3"></label>
                                <div class="col-9">
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="viewStudentModal" tabindex="-1" data-backdrop="static"
            data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Informasi Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            wire:click="closeViewStudentModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>NIS: </th>
                                    <td>{{ $view_student_nis }}</td>
                                </tr>
                                <tr>
                                    <th>NAMA: </th>
                                    <td>{{ $view_student_name }}</td>
                                </tr>
                                <tr>
                                    <th>GENDER: </th>
                                    <td>{{ $view_student_gender }}</td>
                                </tr>
                                <tr>
                                    <th>EMAIL: </th>
                                    <td>{{ $view_student_email }}</td>
                                </tr>
                                <tr>
                                    <th>KELAS: </th>
                                    <td>{{ $view_student_kelas }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

@endsection

@push('scripts')
    <script>
        $('.modal-body').on('click', '.addRow', function() {
            var tr = "<tr>" +
                "<td>" +
                "<div style='margin-bottom: 0 !important'  class='form-group' wire:model='nis[]'>" +
                "<input type='text' class='form-control'>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<di style='margin-bottom: 0 !important'  style='margin-bottom: 0 !important'  class='form-group' wire:model='nama[]'>" +
                "<input type='text' class='form-control'>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<div style='margin-bottom: 0 !important'  class='form-group' wire:model='gender[]'>" +
                "<select class='form-control'>" +
                "<option>Option 1</option>" +
                "<option>Option 2</option>" +
                "<option>Option 3</option>" +
                "</select>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<div style='margin-bottom: 0 !important'  class='form-group' wire:model='email[]'>" +
                "<input type='text' class='form-control'>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<div style='margin-bottom: 0 !important' class='form-group' wire:model='kelas[]'>" +
                "<select class='form-control'>" +
                "<option>Option 1</option>" +
                "<option>Option 2</option>" +
                "<option>Option 3</option>" +
                "</select>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<a href='javascript:void(0)' class='btn btn-icon icon-left btn-danger deleteRow'>Hapus</a>" +
                "</td>" +
                "</tr>"
            $('.tbody').append(tr);
        });
        $('.tbody').on('click', '.deleteRow', function() {
            $(this).parent().parent().remove();
        })
    </script>
    <script>
        window.addEventListener('close-modal', event => {
            $('#addStudentModal').modal('hide');
            $('#editStudentModal').modal('hide');
        });
        window.addEventListener('show-edit-student-modal', event => {
            $('#editStudentModal').modal('show');
        });
        window.addEventListener('show-view-student-modal', event => {
            $('#viewStudentModal').modal('show');
        });
    </script>
    <script src="{{ url('') }}/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
@endpush
