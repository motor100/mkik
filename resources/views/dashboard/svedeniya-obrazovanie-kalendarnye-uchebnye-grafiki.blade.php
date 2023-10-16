@extends('dashboard.layout')

@section('title')
Календарные учебные графики
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">
        
        <div class="afisha-form mb-5">
          <form class="form" action="/dashboard/svedeniya-ob-obrazovatelnoj-organizacii/kalendarnye-uchebnye-grafiki-update" method="post">
            <div class="form-group mb-3">
              <div class="label-text">Описание</div>
              <textarea name="text">{{ $text }}</textarea>
            </div>
            
            @csrf
            <button type="submit" class="btn btn-primary">Обновить</button>
          </form>
        </div>

      </div>
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