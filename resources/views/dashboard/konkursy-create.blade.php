@extends('dashboard.layout')

@section('title')
Добавить конкурс
@endsection

@section('dashboardcontent')

<div class="dashboard-home">
  <div class="content">
    <div class="container-fluid">

      <div class="news-form mb-5">
        <form class="form" action="{{ route('konkursy-store') }}" enctype="multipart/form-data" method="post">
          <div class="form-group mb-3">
            <label for="inputTitle" class="form-check-label">Заголовок</label>
            <input type="text" name="title" class="form-control" id="inputTitle" maxlength="100" required>
          </div>
          <div class="form-group mb-3">
            <div class="label-text">Изображение</div>
            <input type="file" name="inputimage" class="inputfile" id="input-image-file" required accept="image/jpeg,image/png">
            <label class="custom-inputfile-label" for="input-image-file">Выберите файл</label>
            <span class="image-file-text file-text">Файл не выбран</span>
          </div>
          <div class="form-group mb-3">
            <label for="inputStartDate" class="form-check-label">Дата начала</label>
            <input type="text" name="datepicker-start" id="inputStartDate" class="form-control datepicker-here w200" readonly required value="">
          </div>
          <div class="form-group mb-3">
            <label for="inputFinishDate" class="form-check-label">Дата завершения</label>
            <input type="text" name="datepicker-stop" id="inputFinishDate" class="form-control datepicker-here w200" readonly required value="">
          </div>
          <!-- <div class="form-group mb-3">
            <label for="inputPlace" class="form-check-label">Место</label>
            <input type="text" name="place" id="inputPlace" class="form-control" value="">
          </div> -->
          <div class="form-group mb-5">
            <div class="label-text">Описание</div>
            <textarea name="text" id="inputText"></textarea>
          </div>
          <!-- <div class="form-group mb-3">
            <div class="label-text mb-1">Документы</div>
            <input type="file" name="input-documents-file[]" id="input-documents-file" class="inputfile" accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" multiple>
            <label for="input-documents-file" class="custom-inputfile-label">Выберите файлы</label>
            <span class="namefile file-text documents-file-text">Файлы не выбраны</span>
          </div> -->

          @csrf
          <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[5].classList.add('active');
</script>
@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection