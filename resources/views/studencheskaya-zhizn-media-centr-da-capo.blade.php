<?php $page_title = "Медиа-центр Da Capo"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page media-centr-da-capo-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection