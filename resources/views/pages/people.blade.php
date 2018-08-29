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
            <tr>
                <th scope="col">Faculty</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width:150px"><img src="/images/about-us/eslahchi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Changiz Eslahchi</b>
                    <hr>
                    Professor in the department of computer sciences, school of mathematics, Shahid Beheshti University and a senior researcher at school of biological sciences
                    <br>
                    <br>
                    <a href="/people/eslahchi"><button type="button" class="btn btn-outline-secondary">More Info</button></a>
                </td>
            </tr>
            <tr>
                <th colspan="2" scope="col">Post Docs students</th>
            </tr>
            <tr>
                <td style="width:150px"><img src="/images/about-us/jahangiri.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Soheil Jahangiri-Tazehkand</b>
                    <hr>
                    Research Assistant , School of Biological Sciences (2010 - Present )
                    <br>
                    <br>
                    {{--<button type="button" class="btn btn-outline-secondary">More Info</button>--}}
                </td>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/rosaaghdam.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Rosa Aghdam</b>
                    <hr>
                    Post-Doctoral Research Fellow of Bioinformatics in the Institute of Research in Fundamental Sciences (IPM)
                    <br>
                    <br>
                    <a href="/people/rosaaghdam"><button type="button" class="btn btn-outline-secondary">More Info</button></a>
                </td>
            </tr>
            <tr>
                <th colspan="2" scope="col">PHD students</th>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/maddi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Ali Maddi</b>
                    <hr>
                    AI student of Tehran university
                    <br>
                    <br>
                    {{--<button type="button" class="btn btn-outline-secondary">More Info</button>--}}
                </td>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/ahmadi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Ahmadi</b>
                    <hr>
                    I am phd student in Bioinformatics in Shahid Beheshti University and researcher in the Institute of Research in Fundamental Sciences (IPM). My interest fields of research are pharmacogenomics, proteomics , hidden markov models and utilizing machine learning and data mining approaches.
                    <br>
                    <br>
                    {{--<button type="button" class="btn btn-outline-secondary">More Info</button>--}}
                </td>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/emdadi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Akram emdadi </b>
                    <hr>
                    Phd student in Bioinformatics in Shahid Beheshti University and researcher in the Institute of Research in Fundamental Sciences (IPM). Fields of research : Pharmacogenomics, Hidden Markov Models and Metabolic Networks.
                    <br>
                    <br>
                    {{--<button type="button" class="btn btn-outline-secondary">More Info</button>--}}
                </td>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/yassaee.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Fatemeh Yassaee</b>
                    <hr>
                    Phd student in Bioinformatics in Shahid Beheshti University and researcher in the Institute of Research in Fundamental Sciences (IPM).
                    interested in pharmacogenomics, metabolic network and
                    hidden markov models(HMM)
                    <br>
                    <br>
                    {{--<button type="button" class="btn btn-outline-secondary">More Info</button>--}}
                </td>
            </tr>

            <tr>
                <th colspan="2" scope="col">Masters Students</th>
            </tr>
            <tr>
                <td style="width:150px"><img src="/images/about-us/mirhadi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Mir Hadi Mahmoodi</b>
                    <hr>
                    MS in computer science of Shahid Beheshti University
                    <br>
                    <br>
                    {{--<button type="button" class="btn btn-outline-secondary">More Info</button>--}}
                </td>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/reihani.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Behnam Reihani</b>
                    <hr>
                    MS in computer science of Shahid Beheshti University (Bioinformatic)
                </td>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/rouhani.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Narges Rouhani</b>
                    <hr>
                    Graduate student of computer science in Shahid Beheshti University
                    Interested in bioinformatics and data science.
                    Her Master's thesis focuses on the classification of cancer molecular subtypes.
                    <br>
                    <br>
                    {{--<button type="button" class="btn btn-outline-secondary">More Info</button>--}}
                </td>
            </tr>
            <tr>
                <td style="width:150px"><img src="/images/about-us/maryam.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Maryam Mohamadi</b>
                    <hr>
                    Masters student in shahid beheshti university
                    Field of research: drug-drug interaction prediction
                    <br>
                    <br>
                    {{--<button type="button" class="btn btn-outline-secondary">More Info</button>--}}
                </td>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/khodamoradi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Mohammad Amin Khodamoradi</b>
                    <hr>
                    Computer Science at Shahid Beheshti University
                    <a href="/people/khodamoradi"><button type="button" class="btn btn-outline-secondary">More Info</button></a>
                </td>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/elhamnabian.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Elham nabian</b>
                    <hr>
                    Graduate student of computer science (theory of computation) in Shahid Beheshti University
                    Research Field: Prediction of drug-drug interactions
                </td>
            </tr>

            <tr>
                <th colspan="2" scope="col">Undergraduate Students</th>
            </tr>

            <tr>
                <td style="width:150px"><img src="/images/about-us/balouchi.jpg" class="img-thumbnail profile-pic "></td>
                <td><b>Mohammad Mehdi Balouchi</b>
                    <hr>
                        Computer Science student in Shahid Beheshti University. Web Developer
                    <br>
                    <br>
                    {{--<button type="button" class="btn btn-outline-secondary">More Info</button>--}}
                </td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection