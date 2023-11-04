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
    <form class="form" action="{{ route('pedagogicheskij-sostav-dokumenty-store') }}" enctype="multipart/form-data" method="post">
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
        <input type="file" name="input-sig-file" class="inputfile" id="input-sig-file" required accept="application/pgp-signature">
        <label class="custom-inputfile-label" for="input-sig-file">Выберите файл</label>
        <span class="file-text">Файл не выбран</span>
      </div>
      <div class="form-group mb-5">
        <div class="label-text">Ключ</div>
        <input type="file" name="input-key-file" class="inputfile" id="input-key-file" required accept="application/pgp-keys, text/plain">
        <label class="custom-inputfile-label" for="input-key-file">Выберите файл</label>
        <span class="file-text">Файл не выбран</span>
      </div>

      @csrf
      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[12].classList.add('active');
</script>

@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection