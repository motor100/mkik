@extends('dashboard.layout')

@section('title')
Добавить программу
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <form class="form mb-5" action="/dashboard/eios-metodicheskie-materialy-i-programmy/add" enctype="multipart/form-data" method="post">

          <div class="form-group mb-3">
            <div class="label-text">Категория</div>
            <select name="category" class="form-select" required>
              <option value="Студентам">Студентам</option>
              <option value="Преподавателям">Преподавателям</option>
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="inputTitle" class="form-check-label">Название документа</label>
            <input type="text" name="title" class="form-control" id="inputTitle" maxlength="200" required>
          </div>

          <div class="form-group mb-5">
            <div class="label-text">Документ PDF</div>
            <input type="file" name="inputfile" class="inputfile" id="input-file" required accept="application/pdf">
            <label class="custom-inputfile-label" for="input-file">Выберите файл</label>
            <span class="file-text">Файл не выбран</span>
          </div>

          <!-- 
          <div class="form-group mb-3">
            <label for="inputCode" class="form-check-label">Шифр</label>
            <input type="text" name="code" class="form-control" id="inputCode" maxlength="200" required>
          </div>
          <div class="form-group mb-3">
            <label for="inputSpecialization" class="form-check-label">Специализация</label>
            <input type="text" name="specialization" class="form-control" id="inputSpecialization" maxlength="200" required>
          </div>
          <div class="form-group mb-3">
            <div class="label-text">Описание</div>
            <textarea name="text" id="inputText"></textarea>
          </div> -->

          @csrf
          <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

        <div class="archive">
          <h3 class="h4 mb-4">Архив</h3>
          @foreach($materials as $mt)
            <div class="item d-flex justify-content-between mb-3">
              <div class="title">{{ $mt->short_title }}</div>
              <a class="delete" href="/dashboard/eios-metodicheskie-materialy-i-programmy/del/{{$mt->id}}">
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

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection