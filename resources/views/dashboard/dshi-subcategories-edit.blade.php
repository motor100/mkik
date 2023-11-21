@extends('dashboard.layout')

@section('title', 'Редактировать подкатегорию')

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

  @if(session()->get('status'))
    <div class="alert alert-success">
      {{ session()->get('status') }}
    </div>
  @endif

  <div class="dshi-subcategories-form">
    <form class="form" action="{{ route('dashboard.dshi-subcategories-update', $dshi_subcategory->id) }}" method="post">
      <div class="form-group mb-3">
        <label for="title" class="form-check-label">Название</label>
        <input type="text" name="title" id="title" class="form-control" minlength="3" maxlength="150" required value="{{ $dshi_subcategory->title }}">
      </div>
      <div class="form-group mb-5">
        <label for="sort" class="form-check-label">Сортировка</label>
        <input type="number" name="sort" id="sort" class="form-control input-number w200" min="1" max="1000" value="{{ $dshi_subcategory->sort }}">
      </div>

      @csrf
      <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[7].classList.add('active');
</script>
@endsection