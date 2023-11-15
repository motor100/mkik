@extends('dashboard.layout')

@section('title', $svedeniya_subcategory->title)

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
  
  <a href="{{ route('dashboard.svedeniya-dokumenty-create', $svedeniya_subcategory->id) }}" class="btn btn-success mb-3">Добавить</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($svedeniya_subcategory->documents as $doc)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $doc->title }}</td>
          <td class="table-button">
            <a href="{{-- route('svedeniya-subcategories-show', $doc->id) --}}" class="btn btn-success" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{-- route('svedeniya-subcategories-edit', $doc->id) --}}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="{{-- route('svedeniya-subcategories-destroy', $doc->id) --}}" method="get">
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