<?php $page_title = "Информационные электронные образовательные ресурсы"; ?>

@extends('layouts.page_layout')

@section('content')
<div class="page eios-list-page informacionnye-ehlektronnye-obrazovatelnye-resursy-page">
  <div class="container">
    <div class="page-title"><?php echo $page_title; ?></div>
    
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