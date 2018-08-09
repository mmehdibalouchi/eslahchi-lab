@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
        <div class="shadow p-3 mb-5 rounded bg-light">
            <h2>CDAP</h2>
            <p></p><p></p><p></p>
            <p>Complex Detection Analyzer Package (CADP) helps you to execute protein complex detection methods and compare their results in a quick and compact ways. It computes a wide range of evaluation criteria and visualize the comparison of methods in tables and multiplots. It assists you in filtering detected clusters by providing a protein name (STRING ID) as a query and by setting constraint on maximum and minimum number of proteins in detected clusters. The list of methods for detecting protein complexes is as follows:</p>
            <br>
            <li data-toggle="tooltip" data-placement="left" title="Tooltip on top">AP</li>
            <li>CFinder</li>
            <li>MCL</li>
            <li>ClusterOne</li>
            <li>RNSC</li>
            <li>RRW</li>
            <li>IMHRC</li>
            <p>You can also upload the result of any other method for evaluating its results. The valid format for uploaded file is described
                <a href="" data-toggle="modal" data-target="#resultValidFormat"> here</a>.</p>
            <p>The list of evaluation criteria is as follows:</p>
            <li>Sensitivity(Sn), Positive Predictive Value(PPV),  Accuracy (ACC)</li>
            <li>Maximal Margin Relevance (MMR)</li>
            <li>Precision, Recall, Fmeasure</li>
            <li>Precision+, Recall+, Fmeasure+</li>
            <li>Area Under MMR+Fmeasure^+ curve (AUMF)</li>
            <p>You may look for the values of evaluation criteria for a specific threshold. This can also be done by CDAP. The PPI datasets are:</p>
            <li>Collins</li>
            <li>Gavin</li>
            <li>Krogan-Core</li>
            <li>Krogan-Extended</li>
            <p>And the Gold Standards used in assessment of results are:</p>
            <li>MIPS: catalog of protein complexes</li>
            <li>SGD: Gene Ontology based protein complex</li>
            <p>Moreover, you can upload your custom PPI dataset or Gold Standard. The valid formats for uploaded files are declared
                <a href="" data-toggle="modal" data-target="#ppigsValidFormat">here</a>.</p>

            <div class="text-center">
                <a href="/softwares/cdap/start"><button type="button" class="btn btn-success">START</button></a>
            </div>


            <!-- valid algorithm resultModal -->
            <div class="modal fade bd-example-modal-lg" id="resultValidFormat" tabindex="-1" role="dialog" aria-labelledby="resultValidFormatLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resultValidFormatLabel">Valid format for uploading results of custom algorithm:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            The results of algorithm must be presented in a ‘.txt’ file that in each line the STRING ID of proteins in one detected cluster are listed and separated by tab (‘\t’).
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- valid  PPI dataset or Gold Standard Modal -->
            <div class="modal fade bd-example-modal-lg" id="ppigsValidFormat" tabindex="-1" role="dialog" aria-labelledby="ppigsValidFormatLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ppigsValidFormatLabel">Custom PPI dataset or Gold Standard valid format</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <b>Valid format for uploading results of custom PPI dataset:</b>
                            <p>PPI dataset must be presented in a ‘.txt’ file that in each line the STRING ID of two interacting proteins and the weights of their edge in PPI network are typed and separated by tab (‘\t’).</p>
                            <b>Valid format for uploading results of custom Gold Standard:</b>
                            <p>Gold Standard must be presented in a ‘.txt’ file that in each line the STRING ID of proteins in one complex is listed and separated by tab (‘\t’).</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection