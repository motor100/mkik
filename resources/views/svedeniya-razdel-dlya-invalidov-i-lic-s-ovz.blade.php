<?php $page_title = "Раздел для ивалидов и лиц с ОВЗ"; ?>

@extends('layouts.main')

@section('content')
  <div class="page razdel-dlya-invalidov-i-lic-s-ovz-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection