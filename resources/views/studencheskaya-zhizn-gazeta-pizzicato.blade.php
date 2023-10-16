<?php $page_title = "Газета Pizzicato"; ?>

@extends('layouts.main')

@section('style')
@endsection

@section('content')
  <div class="page gazeta-pizzicato-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>

      <div class="newspapers">
        @foreach($newspapers as $nwpr)
          <div class="item">
            <a href="{{ $nwpr->pdf }}" target="_blank">
              <img src="{{ $nwpr->image }}" alt="">
            </a>
          </div>
        @endforeach
      </div>
      
    </div>
  </div>
@endsection

@section('script')
@endsection