@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="jumbotron" style="width: 100%;">
            <h2>Softwares</h2>
            <p></p><p></p><p></p>
            <a href="/softwares/cdap"> <li>Complex Detection Analyzer Package (cdap)</li></a>
            <a href="/softwares/cdap"> <li>IMHRC</li></a>
            <a href="/softwares/dmn"> <li>Decomposition of metabolic networks</li></a>
        </div>
    </div>
    </div>
@endsection