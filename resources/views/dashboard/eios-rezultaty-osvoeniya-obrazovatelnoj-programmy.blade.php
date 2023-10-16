@extends('dashboard.layout')

@section('title')
Добавить результаты
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <form class="form mb-5" action="/dashboard/eios-rezultaty-osvoeniya-obrazovatelnoj-programmy/add" enctype="multipart/form-data" method="post">

          <div class="form-group mb-3">
            <div class="label-text">Курс</div>
            <select name="course" class="form-select" id="form-select" required>
              <option value="1" selected>1 курс</option>
              <option value="2">2 курс</option>
              <option value="3">3 курс</option>
              <option value="4">4 курс</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="inputTitle" class="form-check-label">Название документа</label>
            <input type="text" name="title" class="form-control" id="inputTitle" maxlength="200" required>
          </div>
          <div class="form-group mb-5">
            <div class="label-text">Документ PDF</div>
            <input type="file" name="inputfile" class="inputfile" id="input-file" accept="application/pdf" required>
            <label class="custom-inputfile-label" for="input-file">Выберите файл</label>
            <span class="file-text">Файл не выбран</span>
          </div>

          @csrf
          <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

        <div class="archive">
          <h3 class="h4 mb-4">Архив документов</h3>
          @foreach($documents as $doc)
            <div class="item d-flex justify-content-between mb-3">
              <div class="title">{{ $doc->title }}</div>
              <a class="delete" href="/dashboard/eios-rezultaty-osvoeniya-obrazovatelnoj-programmy/del/{{$doc->id}}">
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