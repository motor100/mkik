@extends('dashboard.layout')

@section('title', 'Добавить преподавателя')

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

  <div class="prepodavateli-form mb-5">
    <form class="form" action="{{ route('dashboard.prepodavateli-store') }}" enctype="multipart/form-data" method="post">

      <div class="form-group mb-3">
        <label for="inputTitle" class="form-check-label">ФИО</label>
        <input type="text" name="title" class="form-control" id="inputTitle" minlength="4" maxlength="100" required>
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Изображение</div>
        <input type="file" name="input-main-file" class="inputfile" id="input-main-file" required accept="image/jpeg,image/png">
        <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
        <span class="main-file-text file-text">Файл не выбран</span>
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Описание</div>
        <textarea name="text" id="inputText"></textarea>
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Отделение</div>
        <select name="category" class="form-select" required>
          @foreach($prepodavateli_categories as $value)
            <option value="{{ $value->id }}">{{ $value->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mb-3">
        <label for="post" class="form-check-label">Должность</label>
        <input type="text" name="post" class="form-control" id="post" minlength="4" maxlength="150" required>
      </div>
      <div class="form-group mb-3">
        <label for="phone" class="form-check-label">Телефон</label>
        <input type="text" name="phone" class="form-control w200" id="phone" maxlength="20">
      </div>
      <div class="form-group mb-3">
        <label for="email" class="form-check-label">Email</label>
        <input type="email" name="email" class="form-control w200" id="email" maxlength="150">
      </div>
      <div class="form-group mb-5">
        <label for="sort" class="form-check-label">Сортировка</label>
        <input type="text" name="sort" class="form-control js-digits-only w200" id="sort" minlength="0" maxlength="20">
      </div>

      @csrf
      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
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