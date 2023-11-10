@extends('dashboard.layout')

@section('title')
{{ $feedback->fio }}
@endsection

@section('dashboardcontent')

<div class="dashboard-content">

  <div class="feedback">
    <p>{{ $feedback->created_at->format("d.m.Y") }}</p>
    <p>{{ $feedback->name }}</p>
    <p>{{ $feedback->phone }}</p>
    <p>{{ $feedback->email }}</p>
    <p>{{ $feedback->message }}</p>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[13].classList.add('active');
</script>
@endsection