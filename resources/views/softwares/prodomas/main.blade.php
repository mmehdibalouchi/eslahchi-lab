@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="shadow p-3 mb-5 rounded bg-light">
            <h2>ProDomAs; A Web Server for Protein Domain Assignment</h2>
            <p></p><p></p><p></p>
            <h4>Dscription</h4>
            <p>
                The ProDomAs web server implements an automatic algorithm for protein domain assignment. It takes as input a protein chain in PDB format to determine its structural domains. The minimum size of a domain is considered to be 32 residues by default. In addition, the number of the domains of a protein chain, if known in advance, could be specified by the users in an optional input field. In this case, ProDomAs computes the boundaries of domains according to the given number of domains. The results are provided graphically.
            </p>
            <div class="text-center">

            </div>
        </div>
    </div>
    </div>
@endsection