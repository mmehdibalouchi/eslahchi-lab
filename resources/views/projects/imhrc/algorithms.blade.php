@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    @include('components.breadcrumbs')
    <div class="row">
        <div class="jumbotron" style="width: 100%">
            <br>
            <h2>Choose Algorithms</h2>

        </div>
    </div>
    </div>
@endsection