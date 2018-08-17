@extends('layouts.main', ['activePage' => "people"])

@section('title', 'Page Title')

@section('content')
    <div class="shadow p-3 mb-5 bg-light rounded">
        {{--<h5>Changiz Eslahchi</h5>--}}
        {{--<div><img src="/images/about-us/eslahchi.jpg" class="img-thumbnail profile-pic " alt="Cinque Terre"></div>--}}
        {{--<p>Prof. Changiz Eslahchi</p>--}}
        {{--<p>Our research interests lie in the area of data-driven bioinformatics, creating algorithms to infer and exploit simple models of complex interactions. We also try to understand the biology underlying genetic diseases such as cancer. Most biological functions arise from complex interactions among many components. We use mathematical, statistical, and computational modeling approaches as a way of exploring and answering biological problems. The ultimate goal of our research is to obtain comprehensive understanding of how structures and functions are coded in molecular sequences and how functions of molecules are orchestrated in a cell.</p>--}}
        <table class="table">
            <thead>
            </thead>
            <tbody>
            <tr>
                <td style="width:150px"><img src="/images/about-us/eslahchi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Changiz Eslahchi</b>
                    <hr>
                    {!! file_get_contents("people-description/$name.txt") !!}
                    <div class="text-center"><a href="/people"><button type="button" class="btn btn-outline-info ">Back</button></a></div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection