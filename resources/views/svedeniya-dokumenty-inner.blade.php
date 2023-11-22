@section('title', $svedeniya_subcategory->title)

@extends('layouts.main')

@section('content')
  <div class="page dokumenty-page">
    <div class="container">
      <div class="page-title">{{ $svedeniya_subcategory->title }}</div>
      <div class="documents">
        @foreach($svedeniya_subcategory->documents as $doc)
          @include('document-list-item')
        @endforeach
      </div>
    </div>
  </div>
@endsection