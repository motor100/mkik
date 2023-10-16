@extends('dashboard.layout')

@section('title')
Добавить газету Pizzicato
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <div class="news-form mb-5">
          <form class="form" action="/dashboard/gazeta-pizzicato/add" enctype="multipart/form-data" method="post">
            <div class="form-group mb-3">
              <div class="label-text">Изображение</div>
              <input type="file" name="inputimage" class="inputfile" id="input-image-file" required accept="image/jpeg,image/png">
              <label class="custom-inputfile-label" for="input-image-file">Выберите файл</label>
              <span class="image-file-text">Файл не выбран</span>
            </div>
            <div class="form-group mb-5">
              <div class="label-text">Файл PDF</div>
              <input type="file" name="inputpdf" class="inputfile" id="input-pdf-file" required accept="application/pdf">
              <label class="custom-inputfile-label" for="input-pdf-file">Выберите файл</label>
              <span class="pdf-file-text">Файл не выбран</span>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>
        
        <div class="newspapers-archive">
          <h3 class="h4 mb-4">Архив газет</h3>
          @foreach($newspapers as $nwpr)
            <div class="item d-flex justify-content-between mb-3">
              <div class="image">
                <a href="{{ $nwpr->pdf }}" target="_blank">
                  <img src="{{ $nwpr->image }}" alt="">
                </a>
              </div>
              <a class="delete-newspapers" href="/dashboard/gazeta-pizzicato/del/{{$nwpr->id}}">
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
  let inputImageFile = document.querySelector('#input-image-file'),
      imageFileText = document.querySelector('.image-file-text');

  if (inputImageFile) {
    inputImageFile.onchange = function() {
      imageFileText.innerHTML = this.files[0].name;
    }
  }

  // Выбор файла Изображение
  let inputPdfFile = document.querySelector('#input-pdf-file'),
        pdfFileText = document.querySelector('.pdf-file-text');

  if (inputPdfFile) {
    inputPdfFile.onchange = function() {
      pdfFileText.innerHTML = this.files[0].name;
    }
  }
</script>
@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection