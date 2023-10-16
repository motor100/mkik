@extends('dashboard.layout')

@section('title', 'Направления подготовки')

@section('dashboardcontent')

<div class="dashboard-home">

  <div class="content">
    <div class="container-fluid">

      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form class="form" action="{{ route('learning-directions-update', $learning_direction->id) }}" method="post">

        <div class="form-group mb-3">
          <label for="title" class="form-check-label mb-1">Направление</label>
          <input type="text" name="title" id="title" class="form-control" required value="{{ $learning_direction->title }}">
        </div>

        @csrf
        <button type="submit" class="btn btn-primary">Обновить</button>

      </form>

    </div>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[13].classList.add('active');
</script>

@endsection