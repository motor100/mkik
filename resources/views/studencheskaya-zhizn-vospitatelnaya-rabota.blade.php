<?php $page_title = "Воспитательная работа"; ?>

@extends('layouts.main')

@section('content')
  <div class="page vospitatelnaya-rabota-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection