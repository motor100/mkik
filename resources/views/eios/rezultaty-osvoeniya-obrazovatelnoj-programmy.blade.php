@section('title', 'Результаты освоения образовательной программы')

@extends('layouts.main')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/eios.css') }}">
@endsection

@section('content')
<div class="page eios-table-page rezultaty-osvoeniya-obrazovatelnoj-programmy-page">
  <div class="container">
    <div class="page-title">Результаты освоения образовательной программы</div>
      <div class="course-wrapper">
        <div class="item">
          <span class="course-number">1</span>
          <span class="course-text">курс</span>
        </div>
        <div class="item">
          <span class="course-number">2</span>
          <span class="course-text">курс</span>
        </div>
        <div class="item">
          <span class="course-number">3</span>
          <span class="course-text">курс</span>
        </div>
        <div class="item">
          <span class="course-number">4</span>
          <span class="course-text">курс</span>
        </div>
      </div>

      <div class="documents-wrapper">
        <div class="item">
          @foreach($course1 as $cr)
            <div class="documents">
              <div class="list-item">
                <img class="icon" src="/img/pdf-icon.svg" alt="">
                <a class="name" href="{{ $cr->file }}" target="_blank">{{ $cr->title }}</a>
              </div>
            </div>
          @endforeach
        </div>
        <div class="item">
          @foreach($course2 as $cr)
            <div class="documents">
              <div class="list-item">
                <img class="icon" src="/img/pdf-icon.svg" alt="">
                <a class="name" href="{{ $cr->file }}" target="_blank">{{ $cr->title }}</a>
              </div>
            </div>
          @endforeach
        </div>
        <div class="item">
          @foreach($course3 as $cr)
            <div class="documents">
              <div class="list-item">
                <img class="icon" src="/img/pdf-icon.svg" alt="">
                <a class="name" href="{{ $cr->file }}" target="_blank">{{ $cr->title }}</a>
              </div>
            </div>
          @endforeach
        </div>
        <div class="item">
          @foreach($course4 as $cr)
            <div class="documents">
              <div class="list-item">
                <img class="icon" src="/img/pdf-icon.svg" alt="">
                <a class="name" href="{{ $cr->file }}" target="_blank">{{ $cr->title }}</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>

  </div>
</div>
@endsection