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
    <form class="form" action="{{ route('konkursy-dokumenty-update', $document->id) }}" enctype="multipart/form-data" method="post">
      <div class="form-group mb-3">
        <div class="label-text">Конкурс</div>
        <select name="konkurs" class="form-select" required>
          @foreach($konkursy as $value)
            <option value="{{ $value->id }}" {{ $document->konkurs->id == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mb-3">
        <label for="inputTitle" class="form-check-label">Название</label>
        <input type="text" name="title" class="form-control" id="inputTitle" minlength="3" maxlength="100" required value="{{ $document->title }}">
      </div>
      <div class="form-group mb-1">
        <div class="label-text">Документ</div>
        <input type="file" name="input-main-file" class="inputfile" id="input-pdf-file" accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        <label class="custom-inputfile-label" for="input-pdf-file">Выберите файл</label>
        <span class="file-text">Файл не выбран</span>
      </div>
      <div class="form-group mb-5">
        <a href="{{ Storage::url($document->file) }}" class="document" download="">Документ</a>
      </div>

      @csrf
      <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[5].classList.add('active');
</script>

@endsection