@extends('layouts.app')

@push('style')
@livewireStyles
@endpush

@section('main')
@livewire('admin.kelas-component')
@endsection

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
<script src="{{url('')}}/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
@livewireScripts
@endpush