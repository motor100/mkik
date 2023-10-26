@extends('dashboard.layout')

@section('title', 'Новости')

@section('dashboardcontent')

<div class="dashboard-content">

  <a href="{{ route('news-create') }}" class="btn btn-success mb-3">Добавить</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($news as $nw)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $nw->title }}</td>
          <td class="table-button">
            <a href="{{ route('single-news', $nw->slug) }}" class="btn btn-success" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('news-edit', $nw->id) }}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="{{ route('news-destroy', $nw->id) }}" method="get">
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
  navLink[0].classList.add('active');
</script>

@endsection