@extends('dashboard.layout')

@section('title', 'Подкатегории')

@section('dashboardcontent')

<div class="dashboard-content">

  <a href="{{ route('dashboard.svedeniya-subcategories-create', $svedeniya_category->id) }}" class="btn btn-success mb-3">Добавить</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($svedeniya_category->subcategories as $subcat)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $subcat->title }}</td>
          <td class="table-button">
            <a href="{{ route('dashboard.svedeniya-subcategories-show', $subcat->id) }}" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('dashboard.svedeniya-subcategories-edit', $subcat->id) }}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="{{-- route('dashboard.svedeniya-subcategories-destroy', $subcat->id) --}}" method="get">
              @csrf
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[12].classList.add('active');
</script>
@endsection