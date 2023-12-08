@extends('dashboard.layout')

@section('title', 'Добавить документы')

@section('dashboardcontent')

<div class="dashboard-content">

  <a href="{{ route('konkursy-dokumenty-create') }}" class="btn btn-success mb-3">Добавить</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column" scope="col">№</th>
        <th scope="col">Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($konkursy_dokumenty as $value)
        <tr>
          <th scope="row">{{ $loop->index + 1 }}</th>
          <td>{{ $value->title }} , {{ $value->konkurs->title }}</td>
          <td class="table-button">
            <a href="{{ Storage::url($value->file) }}" class="btn btn-success" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('konkursy-dokumenty-edit', $value->id) }}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="{{ route('konkursy-dokumenty-destroy', $value->id) }}" method="get">
              @csrf
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[5].classList.add('active');
</script>

@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection