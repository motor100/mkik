@extends('dashboard.layout')

@section('title')
Архив абитуриентов
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

  <div class="content">
    <div class="container-fluid">

      <div class="people-archive">
        @foreach($people as $pl)
          <div class="item d-flex mb-3">
            <div class="date">{{ $pl->date }}</div>
            <div class="status mx-3">{{ $pl->status }}</div>
            <div class="fio">
              <a href="/dashboard/anteroom-commission/{{ $pl->id }}">{{ $pl->fio }}</a>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[10].classList.add('active');
</script>
@endsection