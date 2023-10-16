<?php $page_title = "Методические материалы и программы"; ?>

@extends('layouts.main')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/eios.css') }}">
@endsection

@section('content')
<div class="page eios-page metodicheskie-materialy-programmy-page">
  <div class="container">
    <div class="page-title"><?php echo $page_title; ?></div>

    <div class="title-wrapper">
      <div class="title">Студентам</div>
      <div class="title">Преподавателям</div>
    </div>

    <div class="materialy-wrapper">
      <div class="column">
        <div class="documents">
          @foreach($category1 as $ct)
            <div class="list-item">
              <img class="icon" src="/img/pdf-icon.svg" alt="">
              <a class="name" href="{{ $ct->file }}" target="_blank">{{ $ct->title }}</a>
            </div>
          @endforeach
        </div>
      </div>
      <div class="column">
        <div class="documents">
          @foreach($category2 as $ct)
            <div class="list-item">
              <img class="icon" src="/img/pdf-icon.svg" alt="">
              <a class="name" href="{{ $ct->file }}" target="_blank">{{ $ct->title }}</a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
   

  </div>
</div>
@endsection