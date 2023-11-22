@section('title', 'Макеты')

@extends('layouts.main')

@section('content')
  <div class="page prepodavatelyam-makety-page dokumenty-page">
    <div class="container">
      <div class="page-title">Макеты</div>
      <div class="documents">
        @foreach($documents as $doc)
          @include('document-list-item')
        @endforeach
      </div>
    </div>
  </div>
@endsection