@extends('dashboard.layout')

@section('title', 'Абитуриенту направления подготовки')

@section('dashboardcontent')

<div class="dashboard-content">

  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($learning_directions as $ld)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $ld->title }}</td>
          <td class="table-button">
            <a href="/abiturientu/napravleniya-podgotovki/{{ $ld->slug }}" class="btn btn-success" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('dashboard.abiturientu-napravleniya-podgotovki-edit', $ld->id) }}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="" method="get">
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
  navLink[4].classList.add('active');
</script>
@endsection