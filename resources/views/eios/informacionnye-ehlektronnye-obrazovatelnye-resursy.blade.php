@section('title', 'Информационные электронные образовательные ресурсы')

@extends('layouts.main')

@section('content')
<div class="page eios-list-page informacionnye-ehlektronnye-obrazovatelnye-resursy-page">
  <div class="container">
    <div class="page-title">Информационные электронные образовательные ресурсы</div>
    
    @if(count($resources) > 0)
      <div class="documents">
        @foreach($resources as $rsr)
          <div class="list-item">
            <img class="icon" src="/img/world-icon.svg" alt="">
            <a class="name" href="{{ $rsr->link }}" target="_blank">{{ $rsr->title }}</a>
          </div>
        @endforeach
      </div>
    @endif
    
  </div>
</div>
@endsection