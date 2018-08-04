@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
    <div class="shadow p-3 mb-5 bg-light rounded">
        {{--<h5>Changiz Eslahchi</h5>--}}
        {{--<div><img src="/images/about-us/eslahchi.jpg" class="img-thumbnail profile-pic " alt="Cinque Terre"></div>--}}
        {{--<p>Prof. Changiz Eslahchi</p>--}}
        {{--<p>Our research interests lie in the area of data-driven bioinformatics, creating algorithms to infer and exploit simple models of complex interactions. We also try to understand the biology underlying genetic diseases such as cancer. Most biological functions arise from complex interactions among many components. We use mathematical, statistical, and computational modeling approaches as a way of exploring and answering biological problems. The ultimate goal of our research is to obtain comprehensive understanding of how structures and functions are coded in molecular sequences and how functions of molecules are orchestrated in a cell.</p>--}}
        <table class="table">
            <thead>
            <tr>
                <th scope="col">People</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width:150px"><img src="/images/about-us/eslahchi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Changiz Eslahchi</b>
                    <hr>
                    professor in the department of computer sciences, school of mathematics, Shahid Beheshti University and a senior researcher at school of biological sciences
                    <br>
                    <br>
                    <button type="button" class="btn btn-outline-secondary">More Info</button>
                </td>
            </tr>
            <tr>
                <td style="width:150px"><img src="/images/about-us/maddi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Ali Maddi</b>
                    <hr>
                    AI student of Tehran university
                    <br>
                    <br>
                    <button type="button" class="btn btn-outline-secondary">More Info</button>
                </td>
            </tr>
            <tr>
                <td style="width:150px"><img src="/images/about-us/balouchi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Mohammad Mehdi Balouchi</b>
                    <hr>
                    Computer Science student in Shahid Beheshti University. Web Developer
                    <br>
                    <br>
                    <button type="button" class="btn btn-outline-secondary">More Info</button>
                </td>
            </tr>
            <tr>
                <td style="width:150px"><img src="/images/about-us/jahangiri.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Soheil Jahangiri-Tazehkand</b>
                    <hr>
                    Research Assistant , School of Biological Sciences (2010 - Present )
                    <br>
                    <br>
                    <button type="button" class="btn btn-outline-secondary">More Info</button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection