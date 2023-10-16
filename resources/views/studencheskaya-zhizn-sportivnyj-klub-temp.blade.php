<?php $page_title = "Спортивный клуб Темп"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page sportivnyj-klub-temp-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection