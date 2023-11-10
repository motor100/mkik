@extends('dashboard.layout')

@section('title', 'Обращения')

@section('dashboardcontent')

<div class="dashboard-content">

  <div class="feedbacks">
    @foreach($feedbacks as $fb)
      <div class="item d-flex mb-3">
        <div class="date mr-3">{{ $fb->created_at->format("d.m.Y") }}</div>
        <div class="name">
          <a href="/dashboard/feedbacks/{{ $fb->id }}">{{ $fb->name }}</a>
        </div>
      </div>
    @endforeach
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[13].classList.add('active');
</script>
@endsection