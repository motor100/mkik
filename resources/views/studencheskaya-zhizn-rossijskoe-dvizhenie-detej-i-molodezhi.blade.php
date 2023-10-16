<?php $page_title = "Российское движение детей и молодежи"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page rossijskoe-dvizhenie-detej-i-molodezhi-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection