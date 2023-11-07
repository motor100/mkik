@extends('dashboard.layout')

@section('title', 'Редактировать направление')

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

  @if(session()->get('status'))
    <div class="alert alert-success">
      {{ session()->get('status') }}
    </div>
  @endif

  <div class="abiturientu-napravleniya-podgotovki-form mb-5">
    <form class="form" action="{{ route('dashboard.abiturientu-napravleniya-podgotovki-update', $napravlenie->id) }}" enctype="multipart/form-data" method="post">

      <div class="form-group mb-3">
        <div class="label-text">Направление</div>
        <input type="text" class="form-control" name="title" required readonly value="{{ $napravlenie->learning_direction->title }}">
      </div>
      <div class="form-group mb-3">
        <label for="inputChairman" class="form-check-label">Председатель</label>
        <input type="text" name="chairman" class="form-control" id="inputChairman" maxlength="150" value="{{ $napravlenie->chairman }}">
      </div>
      <div class="form-group mb-3">
        <div class="image-preview gallery-image-preview">
          @if($napravlenie->gallery->count() > 0)
            @foreach($napravlenie->gallery as $gl)
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
        <span class="file-text">Файлы не выбраны</span>

      </div>
      <div class="form-group mb-3">
        <label for="inputTeachers" class="form-check-label">Преподаватели</label>
        <input type="text" name="teachers" class="form-control" id="inputTeachers" maxlength="200" value="{{ $napravlenie->teachers }}">
      </div>
      <div class="form-group mb-3">
        <label for="text" class="form-check-label">Описание</label>
        <textarea name="text" id="text">{{ $napravlenie->text }}</textarea>
      </div>
      <div class="form-group mb-5">
        <label for="inputDiploma" class="form-check-label">Диплом</label>
        <input type="text" name="diploma" class="form-control" id="inputDiploma" maxlength="100" value="{{ $napravlenie->diploma }}">
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
  navLink[4].classList.add('active');

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