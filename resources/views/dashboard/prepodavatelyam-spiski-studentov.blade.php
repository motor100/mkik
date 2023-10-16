@extends('dashboard.layout')

@section('title')
Списки студентов
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">

        <div class="prepodavatelyam-spiski-studentov-form mb-5">
          <form class="form" action="/dashboard/prepodavatelyam-spiski-studentov-update" method="post">
            <div class="form-group mb-3">
              <div class="label-text">Курс</div>
              <select name="course" id="form-select" class="form-select" required>
                <option value="1" selected>1 курс</option>
                <option value="2">2 курс</option>
                <option value="3">3 курс</option>
                <option value="4">4 курс</option>
              </select>
              </div>
              <div class="label-text">Описание</div>
              <textarea name="text" id="text">{{ $content[0]->text }}</textarea>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Обновить</button>
          </form>

          <div class="hidden-text hidden">
            @foreach($content as $cnt)
              <div class="item">{!! $cnt->text !!}</div>
            @endforeach
          </div>

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