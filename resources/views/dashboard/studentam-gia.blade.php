@extends('dashboard.layout')

@section('title')
Студентам ГИА
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <form class="form mb-5" action="/dashboard/studentam-gia/add" enctype="multipart/form-data" method="post">
          <div class="form-group mb-3">
            <label for="inputTitle" class="form-check-label">Название</label>
            <input type="text" name="title" class="form-control" id="inputTitle" maxlength="200" required>
          </div>
          <div class="form-group mb-5">
            <div class="label-text">Документ PDF</div>
            <input type="file" name="inputFile" class="inputfile" id="input-file" accept="application/pdf">
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
              <a class="delete" href="/dashboard/studentam-gia/del/{{$doc->id}}">
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
  let navLink = document.querySelectorAll('.nav-sidebar .nav-link');
  navLink[3].classList.add('active');
</script>


@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection