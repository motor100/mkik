@extends('dashboard.layout')

@section('title', 'Редактировать документ')

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

  <div class="news-form mb-5">
    <form class="form" action="{{ route('dashboard.ucheba-prepodavatelyam-makety-update', $document->id) }}" enctype="multipart/form-data" method="post">
      <div class="form-group mb-3">
        <label for="inputTitle" class="form-check-label">Заголовок (250 символов)</label>
        <input type="text" name="title" class="form-control" id="inputTitle" maxlength="250" required value="{{ $document->title }}">
      </div>
      <div class="form-group mb-1">
        <div class="label-text">Документ</div>
        <input type="file" name="input-main-file" class="inputfile" id="input-main-file" accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
        <span class="file-text">Файл не выбран</span>
      </div>
      <div class="form-group mb-3">
        <a href="{{ Storage::url($document->file) }}" class="document" download="">Документ</a>
      </div>
      <div class="form-group mb-1">
        <div class="label-text">Подпись</div>
        <input type="file" name="input-sig-file" class="inputfile" id="input-sig-file" accept=".sig, application/pgp-signature, text/plain">
        <label class="custom-inputfile-label" for="input-sig-file">Выберите файл</label>
        <span class="file-text">Файл не выбран</span>
      </div>
      <div class="form-group mb-3">
        @if($document->sig_file)
          <a href="{{ Storage::url($document->sig_file) }}" class="document" download="">Подпись</a>
        @endif
      </div>
      <div class="form-group mb-1">
        <div class="label-text">Ключ</div>
        <input type="file" name="input-key-file" class="inputfile" id="input-key-file" accept=".key, application/pgp-keys, text/plain">
        <label class="custom-inputfile-label" for="input-key-file">Выберите файл</label>
        <span class="file-text">Файл не выбран</span>
      </div>
      <div class="form-group mb-5">
        @if($document->key_file)
          <a href="{{ Storage::url($document->key_file) }}" class="document" download="">Ключ</a>
        @endif
      </div>      

      @csrf
      <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[3].classList.add('active');
</script>

@endsection