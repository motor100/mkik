@extends('dashboard.layout')

@section('title')
Добавить ресурс
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <div class="form mb-5">
          <form class="form" action="/dashboard/eios-informacionnye-ehlektronnye-obrazovatelnye-resursy/add" method="post">
            <div class="form-group mb-3">
              <label for="inputTitle" class="form-check-label">Название</label>
              <input type="text" name="title" class="form-control" id="inputTitle" maxlength="200" required>
            </div>

            <div class="form-group mb-5">
              <label for="inputLink" class="form-check-label">Ссылка</label>
              <input type="text" name="link" class="form-control" id="inputLink" maxlength="200" required>
            </div>

            @csrf
            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>

        <div class="archive">
          <h3 class="h4 mb-4">Архив ресурсов</h3>
          @foreach($resursies as $rsr)
            <div class="item d-flex justify-content-between mb-3">
              <div class="title">{{ $rsr->title }}</div>
              <a class="delete" href="/dashboard/resursies/del/{{$rsr->id}}">
                <i class="far fa-times-circle"></i>
              </a>
            </div>
          @endforeach
        </div>

      </div>
    </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[9].classList.add('active');
</script>
@endsection