@extends('dashboard.layout')

@section('title')
Конкурсы
@endsection

@section('dashboardcontent')

<div class="dashboard-home">
  <div class="content">
    <div class="container-fluid">

      <a href="{{ route('konkursy-create') }}" class="btn btn-success mb-3">Добавить</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="number-column" scope="col">№</th>
            <th scope="col">Название</th>
            <th class="button-column"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($konkursy as $nw)
            <tr>
              <th scope="row">{{ $nw->id }}</th>
              <td>{{ $nw->title}}</td>
              <td class="table-button">
                <a href="/konkursy/{{ $nw->slug }}" class="btn btn-success" target="_blank">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('konkursy-edit', $nw->id) }}" class="btn btn-primary">
                  <i class="fas fa-pen"></i>
                </a>
                <form class="form" action="{{ route('konkursy-destroy', $nw->id) }}" method="get">
                  @csrf
                  <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  
    </div>
  </div>
</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[5].classList.add('active');
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

  // Выбор файла Документ PDF
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