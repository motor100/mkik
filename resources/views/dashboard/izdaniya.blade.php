@extends('dashboard.layout')

@section('title')
Добавить издание
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <div class="news-form mb-5">
          <form class="form" action="/dashboard/studencheskaya-zhizn-izdaniya/add" enctype="multipart/form-data" method="post">
            <div class="form-group mb-3">
              <label for="inputTitle" class="form-check-label">Заголовок</label>
              <input type="text" name="title" class="form-control" id="inputTitle" maxlength="250" required>
            </div>
            <div class="form-group mb-3">
              <div class="label-text">Изображение</div>
              <input type="file" name="inputfile" class="inputfile" id="input-main-file" required accept="image/jpeg,image/png">
              <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
              <span class="main-file-text">Файл не выбран</span>
            </div>
            <div class="form-group mb-3">
              <div class="label-text">Описание</div>
              <textarea name="text" id="inputText"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="inputAuthor" class="form-check-label">Автор</label>
              <input type="text" name="author" class="form-control" id="inputAuthor" maxlength="100" required>
            </div>
            <div class="form-group mb-3">
              <label for="inputCategory" class="form-check-label">Категория</label>
              <input type="text" name="category" class="form-control" id="inputCategory" maxlength="100">
            </div>
            <div class="form-group mb-3">
              <label for="inputPublishing" class="form-check-label">Издательство</label>
              <input type="text" name="publishing" class="form-control" id="inputPublishing" maxlength="100">
            </div>
            <div class="form-group mb-3">
              <label for="inputYear" class="form-check-label">Год</label>
              <input type="text" name="year" class="form-control datepicker-year" id="inputYear" maxlength="4" readonly>
            </div>
            <div class="form-group mb-3">
              <label for="inputPrice" class="form-check-label">Цена</label>
              <input type="text" name="price" class="form-control input-price" id="inputPrice" maxlength="10000">
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>

        <div class="archive list-archive">
          <h3 class="h4 mb-4">Архив изданий</h3>
          @foreach($izdaniya as $zdn)
            <div class="item d-flex justify-content-between mb-3">
              <div class="title">{{ $zdn->title }}</div>
              <a class="list-btn delete-btn" href="/dashboard/studencheskaya-zhizn-izdaniya/del/{{$zdn->id}}">
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