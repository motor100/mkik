@extends('dashboard.layout')

@section('title', 'Редактировать преподавателя')

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

  <div class="prepodavateli-form mb-5">
    <form class="form" action="{{ route('dashboard.prepodavateli-update', $prepodavatel->id) }}" enctype="multipart/form-data" method="post">
      <div class="form-group mb-3">
        <label for="title" class="form-check-label">ФИО</label>
        <input type="text" name="title" class="form-control" id="title" maxlength="100" required value="{{ $prepodavatel->title }}">
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Изображение</div>
        <input type="file" name="input-main-file" class="inputfile" id="input-main-file" accept="image/jpeg,image/png">
        <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
        <span class="main-file-text file-text">Файл не выбран</span>
        @if($prepodavatel->image)
          <div id="image-link-wrapper" class="link-wrapper">
            <div class="label-text mb-1">
              <a href="{{ Storage::url($prepodavatel->image) }}" target="_blank">Изображение</a>
            </div>
          </div>
        @endif
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Описание</div>
        <textarea name="text" id="inputText">{{ $prepodavatel->text }}</textarea>
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Отделение</div>
        <select name="category" class="form-select" required>
          @foreach($prepodavateli_categories as $value)
            <option value="{{ $value->id }}" {{ $prepodavatel->category_id == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mb-3">
        <label for="post" class="form-check-label">Должность</label>
        <input type="text" name="post" class="form-control" id="post" maxlength="150" required value="{{ $prepodavatel->post }}">
      </div>
      <div class="form-group mb-3">
        <label for="phone" class="form-check-label">Телефон</label>
        <input type="text" name="phone" class="form-control w200" id="phone" maxlength="20" value="{{ $prepodavatel->phone }}">
      </div>
      <div class="form-group mb-3">
        <label for="email" class="form-check-label">Email</label>
        <input type="email" name="email" class="form-control w200" id="email" maxlength="150" value="{{ $prepodavatel->email }}">
      </div>
      <div class="form-group mb-5">
        <label for="sort" class="form-check-label">Сортировка</label>
        <input type="text" name="sort" class="form-control js-digits-only w200" id="sort" minlength="0" maxlength="20" value="{{ $prepodavatel->sort }}">
      </div>

      @csrf
      <button type="submit" class="btn btn-primary">Обновить</button>
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