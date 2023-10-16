@extends('dashboard.layout')

@section('title')
Расписание
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <div class="studentam-raspisanie-form">
          <form class="form" action="/dashboard/studentam-raspisanie-update" enctype="multipart/form-data" method="post">
            <div class="form-group mb-3">
              <div class="label-text">Курс</div>
              <select name="course" class="form-select" id="form-select" required>
                <option value="1" selected>1 курс</option>
                <option value="2">2 курс</option>
                <option value="3">3 курс</option>
                <option value="4">4 курс</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <div class="label-text">Расписание PDF</div>
              <input type="file" name="inputshedule" class="inputfile" id="input-shedule-file" accept="application/pdf">
              <label class="custom-inputfile-label" for="input-shedule-file">Выберите файл</label>
              <span class="file-text">Файл не выбран</span>
              @if($content[0]->shedule)
                <div id="shedule-link-wrapper" class="link-wrapper">
                  <div class="label-text mb-1">
                    <a href="{{ $content[0]->shedule }}" target="_blank">Файл</a>
                  </div>
                </div>
              @endif
            </div>
            <div class="form-group mb-5">
              <div class="label-text">Форма аттестации PDF</div>
              <input type="file" name="inputattestation" class="inputfile" id="input-attestation-file" accept="application/pdf">
              <label class="custom-inputfile-label" for="input-attestation-file">Выберите файл</label>
              <span class="file-text">Файл не выбран</span>
              @if($content[0]->attestation)
                <div id="attestation-link-wrapper" class="link-wrapper">
                  <div class="label-text mb-1">
                    <a href="{{ $content[0]->attestation }}" target="_blank">Файл</a>
                  </div>
                </div>
              @endif
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
              <div class="shedule">
                @if ( $cnt->shedule )
                  <div class="label-text mb-1">
                    <a href="{{ $cnt->shedule }}" target="_blank">Файл</a>
                  </div>
                @endif
              </div>
              <div class="attestation">
                @if ( $cnt->attestation )
                  <div class="label-text mb-1">
                    <a href="{{ $cnt->attestation }}" target="_blank">Файл</a>
                  </div>
                @endif
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .nav-link');
  navLink[3].classList.add('active');
</script>


@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('admin/js/tiny-file-upload.js') }}"></script>
@endsection