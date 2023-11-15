@extends('dashboard.layout')

@section('title', 'Добавить подкатегорию')

@section('dashboardcontent')

<div class="dashboard-content">

  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="svedeniya-subcategories-form">
    <form class="form" action="{{ route('dashboard.svedeniya-subcategories-store') }}" method="post">
      <div class="form-group mb-3">
        <label for="title" class="form-check-label">Название</label>
        <input type="text" name="title" id="title" class="form-control" minlength="3" maxlength="150" required>
      </div>
      <div class="form-group mb-5">
        <label for="sort" class="form-check-label">Сортировка</label>
        <input type="number" name="sort" id="sort" class="form-control input-number w200" min="1" max="1000">
      </div>

      <input type="hidden" name="category_id" value="{{ $category_id }}">

      @csrf
      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[12].classList.add('active');
</script>
@endsection