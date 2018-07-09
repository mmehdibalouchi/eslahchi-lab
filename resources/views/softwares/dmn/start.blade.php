@extends('layouts.main')

@section('title', 'IMHRC')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="jumbotron msf-form" style="width: 100%">
            <form id="dmn" enctype="multipart/form-data">
                <fieldset>
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-5">Which one do you prefer?</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-check">--}}
                        {{--<input class="form-check-input btn-next-show" onclick="changeInputDisable('customType', 'customApproachRadio')" type="radio" name="type" id="collins2007Radio" value="normal">--}}
                        {{--<label class="form-check-label" for="collins2007Radio">--}}
                            {{--Use our system! :D--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    <div class="form-check">
                        <input class="form-check-input btn-next-hide" onclick="changeInputDisable('customAlgorithm', 'customApproachRadio')" type="checkbox" name="type" id="customApproachRadio" value="custom">
                        <label for="customAlgorithm">Upload your algorithm output</label>
                        <input type="file" disabled="true" class="form-control-file" id="customAlgorithm">
                    </div>
                </fieldset>
                <br>
                <div class="show-when-checked1">
                    <div class="row">
                        <div class="col-sm-2"><label>Algorithms</label></div>
                    </div>
                    <select class="js-example-basic-multiple col-sm-12" name="algorithms[]" multiple="multiple">

                        <option value="guimera">Guimera</option>
                        <option value="Holme">Holme</option>
                        <option value="muller">Muller</option>
                        <option value="Muller2">Muller2</option>
                        <option value="newman">Newman</option>
                        <option value="poolman">Poolman</option>
                        <option value="schuster">Schuster</option>
                        <option value="sridharan">Sridharan</option>
                        <option value="verwoerd">Verwoerd</option>
                        <option value="Ding">Ding</option>
                    </select>

                    {{-------- DataSets --------}}
                    <br><br>

                    <div class="row">
                        <div class="col-sm-2"><label>Datasets</label></div>
                    </div>
                    <select class="js-example-basic-single col-sm-12" name="dataset">

                        <option value="ecoli_core">ecoli_core</option>
                        <option value="ecoli_iaf1260">ecoli_iaf1260</option>
                        <option value="ecoli_ijo1366">ecoli_ijo1366</option>
                        <option value="helico_iit341">helico_iit341</option>
                        <option value="homo_recon1">homo_recon1</option>
                        <option value="arabidopsis_irs1597">arabidopsis_irs1597</option>
                        <option value="mbarkeri_iaf692">mbarkeri_iaf692</option>
                        <option value="mus_imm1415">mus_imm1415</option>
                        <option value="S.cerevisiae (saccaro_ind750)">S.cerevisiae (saccaro_ind750)</option>
                    </select>
                    {{--<input type="file" class="form-control-file" id="customDataset">--}}
                    <br>




                    {{-------- Goldstandards --------}}
                    <br>
                    <div class="row">
                        <div class="col-sm-2"><label>Criterias</label></div>
                    </div>
                    <select class="js-example-basic-multiple col-sm-12" name="criterias[]" multiple="multiple">
                        <option value="cohesion_coupling">cohesion_coupling</option>
                        <option value="efficacy">efficacy</option>
                        <option value="go_distance_bp_F">go_distance_bp_F</option>
                        <option value="go_distance_bp_G">go_distance_bp_G</option>
                        <option value="go_distance_cc_F">go_distance_cc_F</option>
                        <option value="go_distance_cc_G">go_distance_cc_G</option>
                        <option value="go_distance_mf_F">go_distance_mf_F</option>
                        <option value="go_distance_mf_G">go_distance_mf_G</option>
                        <option value="modularity">modularity</option>
                        <option value="module_count">module_count</option>
                        <option value="coexpression_of_enzymes">coexpression_of_enzymes</option>
                        <option value="chebi_distance">chebi_distance</option>
                    </select>
                    </fieldset>
                </div>
                <br>
                <div class="text-center">
                    <button type="button" onclick="dmnResult()" class="btn btn-success btn-next">ًًRun</button>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection