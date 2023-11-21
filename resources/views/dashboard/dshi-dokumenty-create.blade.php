@extends('dashboard.layout')

@section('title', 'Добавить документ')

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
    <form class="form" action="{{ route('dashboard.dshi-dokumenty-store') }}" enctype="multipart/form-data" method="post">
      <div class="form-group mb-3">
        <label for="inputTitle" class="form-check-label">Заголовок (250 символов)</label>
        <input type="text" name="title" class="form-control" id="inputTitle" maxlength="250" required>
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Документ</div>
        <input type="file" name="input-main-file" class="inputfile" id="input-main-file" required accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
        <span class="file-text">Файл не выбран</span>
      </div>
      <div class="form-group mb-3">
        <div class="label-text">Подпись</div>
        <input type="file" name="input-sig-file" class="inputfile" id="input-sig-file" accept="application/pgp-signature">
        <label class="custom-inputfile-label" for="input-sig-file">Выберите файл</label>
        <span class="file-text">Файл не выбран</span>
      </div>
      <div class="form-group mb-5">
        <div class="label-text">Ключ</div>
        <input type="file" name="input-key-file" class="inputfile" id="input-key-file" accept="application/pgp-keys, text/plain">
        <label class="custom-inputfile-label" for="input-key-file">Выберите файл</label>
        <span class="file-text">Файл не выбран</span>
      </div>

      <input type="hidden" name="subcategory_id" value="{{ $subcategory_id }}">

      @csrf
      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[7].classList.add('active');
</script>

@endsection