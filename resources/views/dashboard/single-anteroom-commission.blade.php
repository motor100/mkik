@extends('dashboard.layout')

@section('title')
{{ $abit->fio }}
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

  <div class="content">
    <div class="container-fluid">

      <div class="abit">
        <p>{{ $abit->date }}</p>
        <p>{{ $abit->fio }}</p>
        <p>{{ $abit->birth_date }}</p>
        <p>{{ $abit->phone }}</p>
        <p>{{ $abit->email }}</p>
        <p>
          <a href="{{ $abit->attestat }}" target="_blank">Аттестат</a>
        </p>
        <p>
          <a href="{{ $abit->passport }}" target="_blank">Паспорт</a>
        </p>
        <p>{{ $abit->status }}</p>
      </div>

      <div class="abit-edit">
        <form class="form" action="/dashboard/abit-update" method="post">
          <div class="form-group mb-5">
            <div class="label-text mb-1">Статус</div>
            <select name="status" class="form-select">
              <option value="В обработке">В обработке</option>
              <option value="Принято">Принято</option>
            </select>
          </div>
          <input type="hidden" name="id" value="{{ $abit->id }}">
          @csrf
          <input type="submit" class="btn btn-primary" value="Сохранить">
        </form>
      </div>
    </div>
  </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[10].classList.add('active');
</script>
@endsection