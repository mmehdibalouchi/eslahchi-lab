@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
        <div class="shadow p-3 mb-5 rounded bg-light">
            <h2>CDAP</h2>
            <p></p><p></p><p></p>
            <p>Complex Detection Analyzer Package (CADP) helps you to execute protein complex detection methods and compare their results in a quick and compact ways. It computes a wide range of evaluation criteria and visualize the comparison of methods in tables and multiplots. It assists you in filtering detected clusters by providing a protein name (STRING ID) as a query and by setting constraint on maximum and minimum number of proteins in detected clusters. The list of methods for detecting protein complexes is as follows:</p>
            <br>
            <li>AP</li>
            <li>CFinder</li>
            <li>MCL</li>
            <li>ClusterOne</li>
            <li>RNSC</li>
            <li>RRW</li>
            <li>IMHRC</li>
            <p>You can also upload the result of any other method for evaluating its results. The valid format for uploaded file is described
                <a href=""> here</a>.</p>
            <p>The list of evaluation criteria is as follows:</p>
            <li>Sn, PPV, ACC</li>
            <li>MMR</li>
            <li>Precision, Recall, Fmeasure</li>
            <li>Precision+, Recall+, Fmeasure+</li>
            <li>AUMF</li>
            <p>You may look for the values of evaluation criteria for a specific threshold. This can also be done by CDAP. The PPI datasets are:</p>
            <li>Collins</li>
            <li>Gavin</li>
            <li>Krogan-Core</li>
            <li>Krogan-Extended</li>
            <p>And the Gold Standards used in assessment of results are:</p>
            <li>MIPS: catalog of protein complexes</li>
            <li>SGD: Gene Ontology based protein complex</li>
            <p>Moreover, you can upload your custom PPI dataset or Gold Standard. The valid formats for uploaded files are declared
                <a href="">here</a>.</p>

            <div class="text-center">
                <a href="/softwares/cdap/start"><button type="button" class="btn btn-success">START</button></a>
            </div>
        </div>
@endsection