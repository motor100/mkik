@extends('dashboard.layout')

@section('title')
Направления подготовки
@endsection

@section('dashboardcontent')

<div class="dashboard-home">

    <div class="content">
      <div class="container-fluid">
        
        <a href="{{ route('learning-directions-create') }}" class="btn btn-success mb-3">Добавить</a>
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="number-column" scope="col">№</th>
              <th scope="col">Направление</th>
              <th class="button-column"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($learning_directions as $ld)
              <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $ld->title }}</td>
                <td class="table-button">
                  <a href="{{ route('learning-directions-show', $ld->id) }}" class="btn btn-success">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route('learning-directions-edit', $ld->id) }}" class="btn btn-primary">
                    <i class="fas fa-pen"></i>
                  </a>
                  <form class="form" action="{{ route('learning-directions-destroy', $ld->id) }}" method="get">
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
    </div>

</div>

<script>
  // Изменение цвета активного пункта меню
  let navLink = document.querySelectorAll('.nav-sidebar .menu-item > .nav-link');
  navLink[13].classList.add('active');
</script>

@endsection