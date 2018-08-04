@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
    <div class="shadow p-3 mb-5 bg-light rounded">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">Info</a>
                <a class="nav-item nav-link" id="nav-download-tab" data-toggle="tab" href="#nav-download" role="tab" aria-controls="nav-download" aria-selected="true">Download</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="info-tab">
                <br>
                <h5>Head of Laboratory</h5><hr>
                <div><img src="/images/about-us/eslahchi.jpg" class="img-thumbnail profile-pic " alt="Cinque Terre"></div>
                <p>Prof. Changiz Eslahchi</p>
                <p>Our research interests lie in the area of data-driven bioinformatics, creating algorithms to infer and exploit simple models of complex interactions. We also try to understand the biology underlying genetic diseases such as cancer. Most biological functions arise from complex interactions among many components. We use mathematical, statistical, and computational modeling approaches as a way of exploring and answering biological problems. The ultimate goal of our research is to obtain comprehensive understanding of how structures and functions are coded in molecular sequences and how functions of molecules are orchestrated in a cell.</p>
                <p>
                    We develop and apply novel computational methods for:
                </p>

                <ul>
                    <li>Assignment of Protein Domains from Structure</li>
                    <li>Predicting Protein Complexes from PPT Networks</li>
                    <li>Determining Cancer Signatures</li>
                    <li>Subcellular Location Prediction</li>
                    and …
                </ul>
            </div>
            <div class="tab-pane text-center fade" id="nav-download" role="tabpanel" aria-labelledby="nav-download-tab">
                <br><br>
                dl
            </div>
        </div>
    </div>
@endsection