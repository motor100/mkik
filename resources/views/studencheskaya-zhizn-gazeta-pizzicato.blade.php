@section('title', 'Газета Pizzicato')

@extends('layouts.main')

@section('content')
  <div class="page gazeta-pizzicato-page">
    <div class="container">
      <div class="page-title">Газета Pizzicato</div>

      <div class="newspapers">
        @foreach($newspapers as $nwpr)
          <div class="item">
            <a href="{{ Storage::url($nwpr->pdf) }}" target="_blank">
              <img src="{{ Storage::url($nwpr->image) }}" alt="">
            </a>
          </div>
        @endforeach
      </div>
      
    </div>
  </div>
@endsection