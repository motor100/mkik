@extends('dashboard.layout')

@section('title', 'Редактировать новость')

@section('dashboardcontent')

<div class="dashboard-content">

  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="news-form mb-5">
    <form class="form" action="{{ route('news-update', $news->id) }}" enctype="multipart/form-data" method="post">
      <div class="form-group mb-3">
        <label for="inputTitle" class="form-check-label">Заголовок (100 символов)</label>
        <input type="text" name="title" class="form-control" id="inputTitle" maxlength="100" value="{{ $news->title }}">
      </div>
      <div class="form-group mb-3">
        <div class="image-preview">
          <img src="{{ Storage::url($news->image) }}" alt="">
        </div>
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Изображение</div>
        <input type="file" name="input-main-file" class="inputfile" id="input-main-file" accept="image/jpeg,image/png">
        <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
        <span class="file-text main-file-text">Файл не выбран</span>
      </div>
      <div class="form-group mb-3">
        <div class="image-preview gallery-image-preview">
          @if($news->gallery->count() > 0)
            @foreach($news->gallery as $gl)
              <img src="{{ Storage::url($gl->image) }}" alt="">
            @endforeach
            <div class="gallery-delete">Удалить галерею</div>
          @endif
        </div>
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Галерея</div>
        <input type="file" name="input-gallery-file[]" class="inputfile" id="input-gallery-file" accept="image/jpeg,image/png" multiple>
        <label class="custom-inputfile-label" for="input-gallery-file">Выберите файлы</label>
        <span class="file-text gallery-file-text">Файлы не выбраны</span>
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Описание</div>
        <textarea name="text" id="inputText">{{ $news->text }}</textarea>
      </div>

      <input type="hidden" name="delete-gallery" id="delete-gallery" value="">

      @csrf
      <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[0].classList.add('active');
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

  // Выбор файлов Галерея
  let inputGalleryFile = document.querySelector('#input-gallery-file'),
      galleryFileText = document.querySelector('.gallery-file-text');

  inputGalleryFile.onchange = function() {
    let filesName = '';
    for (let i = 0; i < this.files.length; i++) {
      filesName += this.files[i].name + ' ';
    }
    galleryFileText.innerHTML = filesName;
  }

  // Удаление всех файлов из галереи
  const galleryDelete = document.querySelector('.gallery-delete');
  const galleryImagePreview = document.querySelector('.gallery-image-preview');
  const inputDeleteGallery = document.querySelector('#delete-gallery');

  if (galleryDelete) {
    galleryDelete.onclick = function() {
      galleryDelete.classList.add('hidden');
      galleryImagePreview.innerHTML = '';
      inputDeleteGallery.value = 1;
    }
  }
</script>
@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection