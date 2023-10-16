@extends('dashboard.layout')

@section('title')
Абитуриенту направления подготовки
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

  <div class="content">
    <div class="container-fluid">

      <div class="abiturientu-napravleniya-podgotovki-form mb-5">
        <form class="form" action="/dashboard/abiturientu-napravleniya-podgotovki-update" enctype="multipart/form-data" method="post">

          <div class="form-group mb-3">
            <div class="label-text">Направление</div>
            <select name="direction" id="form-select" class="form-select" required>
              @foreach($content as $cnt)
                @if($cnt->count == 0)
                  <option value="{{ $cnt->title }}" selected>{{ $cnt->title }}</option>
                @else
                  <option value="{{ $cnt->title }}">{{ $cnt->title }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="inputChairman" class="form-check-label">Председатель</label>
            <input type="text" name="chairman" class="form-control" id="inputChairman" maxlength="150" value="{{ $content[0]->chairman }}">
          </div>
          <div class="form-group mb-3">
            <div class="label-text">Галерея</div>
            <input type="file" name="inputgallery[]" class="inputfile" id="input-gallery-file" accept="image/jpeg,image/png" multiple>
            <label class="custom-inputfile-label" for="input-gallery-file">Выберите файлы</label>
            <span class="file-text">Файлы не выбраны</span>
            <div id="image-link-wrapper" class="link-wrapper">
              @if($content[0]->glr)
                @foreach($content[0]->glr as $glr)
                  <div class="label-text mb-1">
                    <a href="{{ $glr }}" target="_blank">Изображение</a>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="inputTeachers" class="form-check-label">Преподаватели</label>
            <input type="text" name="teachers" class="form-control" id="inputTeachers" maxlength="200" value="{{ $content[0]->teachers }}">
          </div>
          <div class="form-group mb-3">
            <label for="text" class="form-check-label">Описание</label>
            <textarea name="text" id="text">{{ $content[0]->text }}</textarea>
          </div>
          <div class="form-group mb-5">
            <label for="inputDiploma" class="form-check-label">Диплом</label>
            <input type="text" name="diploma" class="form-control" id="inputDiploma" maxlength="100" value="{{ $content[0]->diploma }}">
          </div>

          <input type="hidden" name="id" id="inputId" value="{{ $content[0]->id }}">

          @csrf
          <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
      </div>

      <div class="hidden-text hidden">
        @foreach($content as $cnt)
          <div class="item">
            <div class="id">{{ $cnt->id }}</div>
            <div class="chairman">{{ $cnt->chairman }}</div>
            <div class="gallery">
              @if($cnt->glr)
                @foreach($cnt->glr as $glr)
                  <div class="label-text mb-1">
                    <a href="{{ $glr }}" target="_blank">Изображение</a>
                  </div>
                @endforeach
              @endif
            </div>
            <div class="teachers">{{ $cnt->teachers }}</div>
            <div class="text">{!! $cnt->text !!}</div>
            <div class="diploma">{{ $cnt->diploma }}</div>
          </div>
        @endforeach
      </div>

    </div>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[4].classList.add('active');
</script>
@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection