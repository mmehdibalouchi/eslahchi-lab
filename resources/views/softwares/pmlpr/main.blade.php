@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="shadow p-3 mb-5 rounded bg-light">
            <h2>PMLPR</h2>
            <p></p><p></p><p></p>
            <h4>Dscription</h4>
            <p>
                PMLPR (Protein Multi-Location Prediction based on Recommendation system) is a method to predict multiple locations for proteins. PMLPR predicts locations for each protein based on a well-known recommendation method called NBI, and the STRING protein-protein interaction database. For each protein, PMLPR propose a reliability score (the best score is equal to 1).
            </p>
            <div class="text-center">
                <a href="http://facultymembers.sbu.ac.ir/eslahchi/Download/PMLPR(Protein-Localization).rar"><button type="button" class="btn btn-primary">Download</button></a>
            </div>
        </div>
    </div>
    </div>
@endsection