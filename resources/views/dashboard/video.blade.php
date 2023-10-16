@extends('dashboard.layout')

@section('title')
Добавить видео
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <div class="video-form mb-5">
          <form class="form" action="/dashboard/video/add" enctype="multipart/form-data" method="post">
            <div class="form-group mb-3">
              <label for="inputTitle" class="form-check-label">Заголовок</label>
              <input type="text" name="title" class="form-control" id="inputTitle" maxlength="200" required>
            </div>
            <div class="form-group mb-3">
              <div class="label-text">Изображение</div>
              <input type="file" name="inputfile" class="inputfile" id="input-main-file" required accept="image/jpeg,image/png">
              <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
              <span class="main-file-text">Файл не выбран</span>
            </div>
            <div class="form-group mb-3">
              <label for="inputDate" class="form-check-label">Дата</label>
              <input type="text" name="datepicker" id="inputDate" class="form-control datepicker-here  w200" readonly required value="">
            </div>
            <div class="form-group mb-3">
              <label for="inputVideo" class="form-check-label">Ссылка на видео</label>
              <input type="text" name="video" class="form-control" id="inputVideo" required>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>

        <div class="news-archive">
          <h3 class="h4 mb-4">Архив видео</h3>
          @foreach($videos as $vds)
            <div class="item d-flex justify-content-between mb-3">
              <div class="title">{{ $vds->title }}</div>
              <a class="delete-video" href="/dashboard/video/del/{{$vds->id}}">
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
  navLink[6].classList.add('active');
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

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection