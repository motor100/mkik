<?php $page_title = "Преподавателям"; ?>

@extends('layouts.page_layout')

@section('style')
@endsection

@section('content')
  <div class="page istoriya-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>

      <div class="item">
        <a href="/prepodavatelyam/makety">Преподавателям Макеты</a>
      </div>
      <div class="item">
        <a href="/prepodavatelyam/metodicheskie-rekomendacii">Преподавателям Методические рекомендации</a>
      </div>
      <div class="item">
        <a href="/prepodavatelyam/spiski-studentov">Преподавателям Списки студентов</a>
      </div>     

    </div>
  </div>
@endsection

@section('script')
@endsection