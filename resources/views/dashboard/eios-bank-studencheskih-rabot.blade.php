@extends('dashboard.layout')

@section('title')
Добавить работу
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <div class="bank-form mb-5">
          <form class="form" action="/dashboard/eios-bank-studencheskih-rabot/add" enctype="multipart/form-data" method="post">

            <div class="form-group mb-3">
              <div class="label-text">Курс</div>
              <select name="course" class="form-select" required>
                <option value="1" selected>1 курс</option>
                <option value="2">2 курс</option>
                <option value="3">3 курс</option>
                <option value="4">4 курс</option>
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="inputTitle" class="form-check-label">Заголовок</label>
              <input type="text" name="title" class="form-control" id="inputTitle" maxlength="200" required>
            </div>            

            <div class="form-group mb-3">
              <div class="label-text">Описание</div>
              <textarea name="text" id="inputText"></textarea>
            </div>           

            <div class="form-group mb-5">
              <div class="label-text">Документ PDF</div>
              <input type="file" name="inputpdf" class="inputfile" id="input-pdf-file" required accept="application/pdf">
              <label class="custom-inputfile-label" for="input-pdf-file">Выберите файл</label>
              <span class="file-text">Файл не выбран</span>
            </div>

            @csrf
            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>

        <div class="bank-archive">
          <h3 class="h4 mb-4">Архив работ</h3>
          @foreach($works as $wrk)
            <div class="item d-flex justify-content-between mb-3">
              <div class="title">{{ $wrk->short_title }}</div>
              <a class="delete-works" href="/dashboard/eios-bank-studencheskih-rabot/del/{{$wrk->id}}">
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