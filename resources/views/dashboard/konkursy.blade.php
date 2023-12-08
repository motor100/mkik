@extends('dashboard.layout')

@section('title', 'Конкурсы')

@section('dashboardcontent')

<div class="dashboard-content">

  <a href="{{ route('konkursy-create') }}" class="btn btn-success mb-3">Добавить</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column" scope="col">№</th>
        <th scope="col">Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($konkursy as $value)
        <tr>
          <th scope="row">{{ $loop->index + 1 }}</th>
          <td>{{ $value->title }}</td>
          <td class="table-button">
            <a href="/konkursy/{{ $value->slug }}" class="btn btn-success" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('konkursy-edit', $value->id) }}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="{{ route('konkursy-destroy', $value->id) }}" method="get">
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