@extends('layouts.website')

@section('content')
<div class="container py-5">
    <Home :jobs='@json($jobs)' />
</div>
@endsection
