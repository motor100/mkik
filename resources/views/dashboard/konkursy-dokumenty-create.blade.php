@extends('dashboard.layout')

@section('title', 'Добавить документ')

@section('dashboardcontent')

<div class="dashboard-content">

  <div class="news-form mb-5">
    <form class="form" action="{{ route('konkursy-dokumenty-store') }}" enctype="multipart/form-data" method="post">
      <div class="form-group mb-3">
        <div class="label-text">Конкурс</div>
        <select name="konkurs" class="form-select" required>
          <option selected disabled></option>
          @foreach($konkursy as $value)
            <option value="{{ $value->id }}">{{ $value->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mb-3">
        <label for="inputTitle" class="form-check-label">Название</label>
        <input type="text" name="title" class="form-control" id="inputTitle" minlength="3" maxlength="100" required>
      </div>
      <div class="form-group mb-5">
        <div class="label-text">Документ</div>
        <input type="file" name="input-main-file" class="inputfile" id="input-pdf-file" required accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        <label class="custom-inputfile-label" for="input-pdf-file">Выберите файл</label>
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
  navLink[5].classList.add('active');
</script>

@endsection