@section('title', 'Финансово-хозяйственная деятельность')

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-list svedeniya-pdf-list svedeniya-dokumenty-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Финансово-хозяйственная деятельность</div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
@endsection