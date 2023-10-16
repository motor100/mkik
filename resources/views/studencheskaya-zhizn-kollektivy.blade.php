<?php $page_title = "Коллективы"; ?>

@extends('layouts.page_layout')

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