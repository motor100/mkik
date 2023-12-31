@extends('dashboard.layout')

@section('title', 'Архив абитуриентов')

@section('dashboardcontent')

<div class="dashboard-content">

  <div class="people-archive">
    @foreach($people as $pl)
      <div class="item d-flex mb-3">
        <div class="date mr-3">{{ $pl->date }}</div>
        <div class="status mr-3">{{ $pl->status }}</div>
        <div class="fio">
          <a href="/dashboard/anteroom-commission/{{ $pl->id }}">{{ $pl->fio }}</a>
        </div>
      </div>
    @endforeach
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[10].classList.add('active');
</script>
@endsection