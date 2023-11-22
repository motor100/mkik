@section('title', 'Документы')

@extends('layouts.main')

@section('content')
  <div class="page abiturientu-dokumenty-page dokumenty-page">
    <div class="container">
      <div class="page-title">Документы</div>
      <div class="documents">
        @foreach($documents as $doc)
          @include('document-list-item')
        @endforeach
      </div>
    </div>
  </div>
@endsection