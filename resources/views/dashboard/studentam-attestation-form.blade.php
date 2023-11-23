@extends('dashboard.layout')

@section('title', 'Форма аттестации')

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

    <div class="studentam-attestation-form mb-5">
      <form class="form" action="/dashboard/studentam-attestation-form-update" enctype="multipart/form-data" method="post">
        <div class="form-group mb-3">
          <div class="label-text">Курс</div>
          <select name="course" class="form-select" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <div class="label-text">Направление</div>
          <select name="learning_direction" class="form-select" required>
            @foreach($learning_directions as $ld)
              <option value="{{ $ld->id }}">{{ $ld->title }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mb-3">
          <div class="label-text">Документ</div>
          <input type="file" name="input-main-file" class="inputfile" id="input-main-file" required accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
          <label class="custom-inputfile-label" for="input-main-file">Выберите файл</label>
          <span class="file-text">Файл не выбран</span>
        </div>
        <div class="form-group mb-3">
          <div class="label-text">Подпись</div>
          <input type="file" name="input-sig-file" class="inputfile" id="input-sig-file" accept="application/pgp-signature, text/plain">
          <label class="custom-inputfile-label" for="input-sig-file">Выберите файл</label>
          <span class="file-text">Файл не выбран</span>
        </div>
        <div class="form-group mb-5">
          <div class="label-text">Ключ</div>
          <input type="file" name="input-key-file" class="inputfile" id="input-key-file" accept="application/pgp-keys, text/plain">
          <label class="custom-inputfile-label" for="input-key-file">Выберите файл</label>
          <span class="file-text">Файл не выбран</span>
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