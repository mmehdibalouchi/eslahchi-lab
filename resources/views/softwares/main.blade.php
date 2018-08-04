@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
        <div class="shadow p-3 mb-5 rounded bg-light">
            {{--<h4>Softwares</h4><hr>--}}
            {{--<p></p><p></p><p></p>--}}
            {{--<a href="/softwares/cdap"> <li>Complex Detection Analyzer Package (cdap)</li></a><hr>--}}
            {{--<a href="/softwares/cdap"> <li>IMHRC</li></a><hr>--}}
            {{--<a href="/softwares/dmn"> <li>Decomposition of metabolic networks</li></a>--}}
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Softwares</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="/softwares/cdap">Complex Detection Analyzer Package (cdap)</a></td>
                </tr>
                <tr>
                    <td><a href="/softwares/cdap">IMHRC</a></td>
                </tr>
                <tr>
                    <td><a href="/softwares/dmn">Decomposition of metabolic networks</a></td>
                </tr>
                </tbody>
            </table>
        </div>
@endsection