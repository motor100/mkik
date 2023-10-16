@section('title', 'ЭИОС')

@extends('layouts.main')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/eios.css') }}">
@endsection

@section('content')
<div class="page eios-page">
  <div class="container">
    <div class="page-title">ЭИОС</div>
    <div class="logout">
      <a href="/logout">Выйти</a>
    </div>
    
    <div class="category-wrapper">
      <div class="row">
        <div class="col-md-6">
          <div class="item">
            <div class="title">Банк студенческих работ</div>
            <a href="/eios/bank-studencheskih-rabot" class="btn">Смотреть работы</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="item">
            <div class="title">Портфолио</div>
            <a href="/eios/portfolio" class="btn">Смотреть портфолио</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="item">
            <div class="title">Электронные инфо-образовательные ресурсы</div>
            <a href="/eios/informacionnye-ehlektronnye-obrazovatelnye-resursy" class="btn">Смотреть ресурсы</a>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="item">
            <div class="title">Результаты освоения образовательной программы</div>
            <a href="/eios/rezultaty-osvoeniya-obrazovatelnoj-programmy" class="btn">Смотреть результаты</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="item">
            <div class="title">Методические материалы и программы</div>
            <a href="/eios/metodicheskie-materialy-i-programmy" class="btn">Смотреть материалы</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection