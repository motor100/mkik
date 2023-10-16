@extends('dashboard.layout')

@section('title')
Добавить категорию
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">
        
        <div class="afisha-form mb-5">
          <form class="form" action="/dashboard/svedeniya/kategorii/add" method="post">
            <div class="form-group mb-3">
              <label for="inputTitle" class="form-check-label">Название</label>
              <input type="text" name="title" class="form-control" id="inputTitle" maxlength="200" required>
            </div>
            
            @csrf
            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>

        <div class="archive list-archive">
          <h3 class="h4 mb-4">Категории</h3>
          @if (isset($categories))
            @foreach($categories as $cat)
              <div class="item d-flex justify-content-between mb-3">
                <div class="title">{{ $cat->title }}</div>
                <a class="list-btn delete-btn" href="/dashboard/svedeniya/kategorii/del/{{ $cat->id }}">
                  <i class="far fa-times-circle"></i>
                </a>
              </div>
            @endforeach
          @endif
        </div>

      </div>
    </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[12].classList.add('active');
</script>
@endsection