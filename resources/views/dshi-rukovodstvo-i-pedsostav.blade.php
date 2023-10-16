<?php $page_title = "Руководство и педсостав"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page istoriya-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection