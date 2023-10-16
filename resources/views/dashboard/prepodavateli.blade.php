@extends('dashboard.layout')

@section('title')
@if(isset($teacher))
  Редактировать преподавателя
@else
  Добавить преподавателя
@endif
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <div class="prepodavateli-form mb-5">
          @if(isset($teacher))
            <form class="form" action="/dashboard/prepodavateli/update/{{ $teacher->id }}" enctype="multipart/form-data" method="post">
          @else
            <form class="form" action="/dashboard/prepodavateli/add" enctype="multipart/form-data" method="post">
          @endif
            <div class="form-group mb-3">
              <label for="inputTitle" class="form-check-label">ФИО</label>
              @if(isset($teacher))
                <input type="text" name="title" class="form-control" id="inputTitle" maxlength="100" required value="{{ $teacher->title }}">
              @else
                <input type="text" name="title" class="form-control" id="inputTitle" maxlength="100" required>
              @endif
            </div>
            <div class="form-group mb-3">
              <div class="label-text">Изображение</div>
              @if(isset($teacher))
                <input type="file" name="inputfile" class="inputfile" id="input-main-file" accept="image/jpeg,image/png">
              @else
                <input type="file" name="inputfile" class="inputfile" id="input-main-file" required accept="image/jpeg,image/png">
              @endif
              <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
              <span class="main-file-text file-text">Файл не выбран</span>
              @if(isset($teacher))
                <div id="image-link-wrapper" class="link-wrapper">
                  <div class="label-text mb-1">
                    <a href="{{ $teacher->image }}" target="_blank">Изображение</a>
                  </div>
                </div>
              @endif
            </div>
            <div class="form-group mb-3">
              <div class="label-text">Описание</div>
              @if(isset($teacher))
                <textarea name="text" id="inputText">{{ $teacher->text }}</textarea>
              @else
                <textarea name="text" id="inputText"></textarea>
              @endif
            </div>
            <div class="form-group mb-3">
              <div class="label-text">Отделение</div>
              <select name="category" class="form-select" required>
                <option selected disabled></option>
                @if(isset($teacher))
                  @if($teacher->category_title)
                    <option value="{{ $teacher->category_id }}" selected>{{ $teacher->category_title }}</option>
                  @endif
                @endif
                @foreach($categories as $ct)
                  <option value="{{ $ct->id }}">{{ $ct->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="post" class="form-check-label">Должность</label>
              @if(isset($teacher))
                <input type="text" name="post" class="form-control" id="post" maxlength="150" required value="{{ $teacher->post }}">
              @else
                <input type="text" name="post" class="form-control" id="post" maxlength="150" required>
              @endif
            </div>
            <div class="form-group mb-3">
              <label for="phone" class="form-check-label">Телефон</label>
              @if(isset($teacher))
                <input type="text" name="phone" class="form-control w200" id="phone" maxlength="20" value="{{ $teacher->phone }}">
              @else
                <input type="text" name="phone" class="form-control w200" id="phone" maxlength="20">
              @endif              
            </div>
            <div class="form-group mb-3">
              <label for="email" class="form-check-label">Email</label>
              @if(isset($teacher))
                <input type="email" name="email" class="form-control w200" id="email" maxlength="150" value="{{ $teacher->email }}">
              @else
                <input type="email" name="email" class="form-control w200" id="email" maxlength="150">
              @endif
            </div>
            <div class="form-group mb-5">
              <label for="sort" class="form-check-label">Сортировка</label>
              @if(isset($teacher))
                <input type="text" name="sort" class="form-control js-digits-only w200" id="sort" minlength="0" maxlength="20" value="{{ $teacher->sort }}">
              @else
                <input type="text" name="sort" class="form-control js-digits-only w200" id="sort" minlength="0" maxlength="20">
              @endif              
            </div>

            @if(isset($teacher))
              <input type="hidden" name="id" value="{{ $teacher->id }}">
            @endif

            @csrf
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </form>
        </div>

        <div class="list-archive">
          <h3 class="h4 mb-4">Преподаватели</h3>
          @foreach($teachers as $tcr)
            <div class="item d-flex justify-content-between mb-3">
              <div class="title">{{ $tcr->title }}</div>
              <span class="btns">
                <a class="list-btn edit-btn" href="/dashboard/prepodavateli/edit/{{$tcr->id}}">
                  <i class="far fas fa-pen"></i>
                </a>
                <a class="list-btn delete-btn" href="/dashboard/prepodavateli/del/{{$tcr->id}}">
                  <i class="far fa-times-circle"></i>
                </a>
              </span>              
            </div>
          @endforeach
        </div>

      </div>
    </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[8].classList.add('active');
</script>
@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
  <script src="{{ asset('/admin/js/imask.js') }}"></script>
@endsection