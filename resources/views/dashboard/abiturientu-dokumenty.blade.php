@extends('dashboard.layout')

@section('title')
Абитуриенту документы
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

  <div class="content">
    <div class="container-fluid">

      <div class="form-wrapper mb-5">
        <form class="form" action="/dashboard/abiturientu-dokumenty/add" enctype="multipart/form-data" method="post">

          <div class="form-group mb-3">
            <label for="inputTitle" class="form-check-label">Название документа (250 символов)</label>
            <input type="text" name="title" class="form-control" id="inputTitle" maxlength="250" required>
          </div>
          <div class="form-group mb-5">
            <div class="label-text">Документ</div>
            <input type="file" name="inputfile" class="inputfile" id="input-main-file" required accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
            <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
            <span class="main-file-text">Файл не выбран</span>
          </div>

          @csrf
          <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
      </div>

      <div class="archive list-archive">
        <h3 class="h4 mb-4">Архив документов</h3>
        @foreach($documents as $doc)
          <div class="item d-flex justify-content-between mb-3">
            <div class="title">{{ $doc->title }}</div>
            <a class="list-btn delete-btn" href="/dashboard/abiturientu-dokumenty/del/{{$doc->id}}">
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
  navLink[4].classList.add('active');
</script>

<script>
  // Выбор файла Изображение
  let inputMainFile = document.querySelector('#input-main-file'),
      mainFileText = document.querySelector('.main-file-text');

  if (inputMainFile) {
    inputMainFile.onchange = function() {
      mainFileText.innerHTML = this.files[0].name;
    }
  }
</script>
@endsection