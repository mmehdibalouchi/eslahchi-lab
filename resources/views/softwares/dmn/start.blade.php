@extends('layouts.main')

@section('title', 'IMHRC')

@section('sidebar')
    @parent
@endsection

@section('content')
        <div class="shadow-lg p-3 mb-5 bg-light rounded" id="page-content">
            <form id="dmn" enctype="multipart/form-data">
                  <div class="form-group">
                        <input onclick="changeInputDisable('customAlgorithm', 'customApproachRadio')" type="checkbox" name="type" id="customApproachRadio" value="custom">
                        <label for="customAlgorithm">Upload your result</label>
                        <input type="file" disabled="true" class="form-control-file" id="customAlgorithm">
                    </div>
                    {{-------- Algorithms --------}}
                    <div class="form-group">
                        <label>Methods</label>
                        <select class="js-example-basic-multiple col-sm-12" name="algorithms[]" multiple="multiple">
                            <option value="guimera">Guimera</option>
                            <option value="holme">Holme</option>
                            <option value="muller">Muller</option>
                            <option value="muller2_new">Muller2</option>
                            <option value="newman">Newman</option>
                            <option value="poolman">Poolman</option>
                            <option value="schuster">Schuster</option>
                            <option value="sridharan">Sridharan</option>
                            <option value="verwoerd">Verwoerd</option>
                            <option value="Ding">Ding</option>
                        </select>
                    </div>

                    {{-------- DataSets --------}}
                    <div class="form-group">
                        <label>Datasets</label>
                        <select class="js-example-basic-single col-sm-12" name="dataset">

                            <option value="ecoli_core">ecoli_core</option>
                            <option value="ecoli_iaf1260">ecoli_iaf1260</option>
                            <option value="ecoli_ijo1366">ecoli_ijo1366</option>
                            <option value="helico_iit341">helico_iit341</option>
                            <option value="homo_recon1">homo_recon1</option>
                            <option value="arabidopsis_irs1597">arabidopsis_irs1597</option>
                            <option value="mbarkeri_iaf692">mbarkeri_iaf692</option>
                            <option value="mus_imm1415">mus_imm1415</option>
                            <option value="saccaro_ind750">S.cerevisiae (saccaro_ind750)</option>
                        </select>
                        {{--<input type="file" class="form-control-file" id="customDataset">--}}
                        <br>
                    </div>

                    {{-------- Criterias --------}}
                    <br>
                    <div class="form-group">
                        <label>Criteria</label>
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
                            <option value="chebi_distance_mf">chebi_distance</option>
                        </select>
                    <br>
                    </div>

                {{-------- Filters --------}}

                <div class="form-group">
                    <input onclick="showParams('filters')" type="checkbox" name="hasFilter" id="filters" value=true>
                    <label>Considering two metabolites or reactions</label><br>
                    <div style="display: none" id="filters-params">
                        <div class="form-check form-check-inline">
                            <input onclick="showDiv('metabolites', 'reactions')" class="form-check-input" type="radio" name="filterOption" id="metabolites" value="metabolites">
                            <label class="form-check-label" for="metabolites">Metabolites</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input onclick="showDiv('reactions', 'metabolites')" class="form-check-input" type="radio" name="filterOption" id="reactions" value="reactions">
                            <label class="form-check-label" for="reactions">Reactions</label>
                        </div>
                        <br>
                        <div style="display: none;" id="metabolites-params">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metabolitesMethods[]" id="holmeCheckbox1" value="holme">
                                <label class="form-check-label" for="holmeCheckbox1">Holme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metabolitesMethods[]" id="guimeraCheckbox2" value="guimera">
                                <label class="form-check-label" for="guimeraCheckbox2">Guimera</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metabolitesMethods[]" id="DingCheckbox2" value="Ding">
                                <label class="form-check-label" for="DingCheckbox2">Ding</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metabolitesMethods[]" id="verwoerdCheckbox2" value="verwoerd">
                                <label class="form-check-label" for="verwoerdCheckbox2">Verwoerd</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metabolitesMethods[]" id="schusterCheckbox2" value="schuster">
                                <label class="form-check-label" for="schusterCheckbox2">Schuster</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metabolitesMethods[]" id="newmanCheckbox2" value="newman">
                                <label class="form-check-label" for="newmanCheckbox2">Newman</label>
                            </div>
                            <br><br>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="firstMetabolites" placeholder="Enter the first metabolite">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="secondMetabolites" placeholder="Enter the second metabolite">
                                </div>
                            </div>
                        </div>

                        <div style="display: none;" id="reactions-params">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="reactionsMethods[]" id="mullerCheckbox1" value="muller">
                                <label class="form-check-label" for="mullerCheckbox1">Muller</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="reactionsMethods[]" id="muller2_newCheckbox2" value="muller2_new">
                                <label class="form-check-label" for="muller2_newCheckbox2">Muller2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="reactionsMethods[]" id="poolmanCheckbox2" value="poolman">
                                <label class="form-check-label" for="poolmanCheckbox2">Poolman</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="reactionsMethods[]" id="sridharanCheckbox2" value="sridharan">
                                <label class="form-check-label" for="sridharanCheckbox2">Sridharan</label>
                            </div>

                            <br><br>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="firstReactions" placeholder="Enter the first reaction">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="secondReactions" placeholder="Enter the second reaction">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <br>
                <div class="text-center">
                    <button type="button" onclick="dmnResult()" class="btn btn-success btn-next">Run</button>
                </div>
            </form>

        </div>
@endsection