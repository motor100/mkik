<?php $page_title = "Центр содействия трудоустройству"; ?>

@extends('layouts.main')

@section('content')
  <div class="page centr-sodejstviya-trudoustrojstvu-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection