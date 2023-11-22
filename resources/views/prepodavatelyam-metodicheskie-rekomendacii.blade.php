@section('title', 'Методические рекомендации')

@extends('layouts.main')

@section('content')
  <div class="page prepodavatelyam-metodicheskie-rekomendacii-page dokumenty-page">
    <div class="container">
      <div class="page-title">Методические рекомендации</div>
      <div class="documents">
        @foreach($documents as $doc)
          @include('document-list-item')
        @endforeach
      </div> 
    </div>
  </div>
@endsection