@extends('dashboard.layout')

@section('title', 'Учеба Преподавателям Макеты')

@section('dashboardcontent')

<div class="dashboard-content">

  <a href="{{ route('dashboard.ucheba-prepodavatelyam-makety-create') }}" class="btn btn-success mb-3">Добавить</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($documents as $doc)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $doc->title }}</td>
          <td class="table-button">
            <a href="{{ Storage::url($doc->file) }}" class="btn btn-success" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('dashboard.ucheba-prepodavatelyam-makety-edit', $doc->id) }}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="{{ route('dashboard.ucheba-prepodavatelyam-makety-destroy', $doc->id) }}" method="get">
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
  let navLink = document.querySelectorAll('.nav-sidebar .nav-link');
  navLink[3].classList.add('active');
</script>
@endsection 