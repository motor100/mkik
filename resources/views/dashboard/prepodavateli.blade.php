@extends('dashboard.layout')

@section('title', 'Преподаватели')

@section('dashboardcontent')

<div class="dashboard-content">

  <form class="form mb-5" action="/dashboard/prepodavateli" method="get">
    <div class="form-group mb-3">
      <label for="search_query">Поиск</label>
      <input type="text" class="form-control input-number" name="search_query" id="search_query" maxlength="200" required>
    </div>
    <button type="submit" class="btn btn-primary">Найти</button>
  </form>

  <a href="{{ route('dashboard.prepodavateli-create') }}" class="btn btn-success mb-3">Добавить</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Имя</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($prepodavateli as $value)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $value->title }}</td>
          <td class="table-button">
            <a href="/o-kolledzhe/pedagogicheskij-sostav/{{ $value->slug }}" class="btn btn-success" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('dashboard.prepodavateli-edit', $value->id) }}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="{{ route('dashboard.prepodavateli-destroy', $value->id) }}" method="get">
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
  navLink[8].classList.add('active');
</script>

@endsection