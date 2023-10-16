@section('title', 'Аннотации к программам ППССЗ')

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-pdf-list">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Аннотации к программам ППССЗ</div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection