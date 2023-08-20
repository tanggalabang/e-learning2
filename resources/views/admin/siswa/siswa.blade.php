@extends('layouts.app')

@push('style')
    @livewireStyles
@endpush

@section('main')
    @livewire('admin.siswa-component')
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
    @livewireScripts
@endpush
