@extends('dashboard.layout')

@section('title', 'Направления подготовки')

@section('dashboardcontent')

<div class="dashboard-home">

  <div class="content">
    <div class="container-fluid">

      <p>{{ $learning_direction->title }}</p>

    </div>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[13].classList.add('active');
</script>

@endsection