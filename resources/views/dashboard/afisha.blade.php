@extends('dashboard.layout')

@section('title')
Добавить мероприятие
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">
        
        <div class="afisha-form mb-5">
          <form class="form" action="/dashboard/afisha/add" enctype="multipart/form-data" method="post">
            <div class="form-group mb-3">
              <label for="inputTitle" class="form-check-label">Заголовок</label>
              <input type="text" name="title" class="form-control" id="inputTitle" maxlength="100" required>
            </div>
            <div class="form-group mb-3">
              <div class="label-text">Изображение</div>
              <input type="file" name="inputfile" class="inputfile" id="input-main-file" required accept="image/jpeg,image/png">
              <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
              <span class="main-file-text">Файл не выбран</span>
            </div>
            <div class="form-group mb-3">
              <label for="inputDate" class="form-check-label">Дата и время</label>
              <input type="text" name="datepicker" id="inputDate" class="form-control date-and-timepicker w200" readonly required value="">
            </div>
            <div class="form-group mb-3">
              <label for="inputPlace" class="form-check-label">Место</label>
              <input type="text" name="place" id="inputPlace" class="form-control" value="">
            </div>
            <div class="form-group mb-3">
              <label for="inputAddress" class="form-check-label">Адрес</label>
              <input type="text" name="address" id="inputAddress" class="form-control" value="">
            </div>
            <div class="form-group mb-3">
              <label for="inputPrice" class="form-check-label">Стоимость</label>
              <input type="text" name="price" id="inputPrice" class="form-control js-digits-only w200" value="">
            </div>
            <div class="form-group mb-3">
              <div class="label-text">Описание</div>
              <textarea name="text" id="inputText"></textarea>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>

        <div class="archive list-archive">
          <h3 class="h4 mb-4">Архив мероприятий</h3>
          @foreach($afishas as $fsh)
            <div class="item d-flex justify-content-between mb-3">
              <div class="title">{{ $fsh->title }}</div>
              <a class="list-btn delete-btn" href="/dashboard/afisha/del/{{ $fsh->id }}">
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
  navLink[1].classList.add('active');
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