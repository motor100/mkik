<?php $page_title = "Подготовительные курсы"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page podgotovitelnye-kursy-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection