<?php $page_title = "Коллективы"; ?>

@extends('layouts.main')

@section('content')
  <div class="page kollektivy-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection