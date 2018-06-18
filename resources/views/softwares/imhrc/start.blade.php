@extends('layouts.main')

@section('title', 'IMHRC')

@section('sidebar')
    @parent
@endsection

@section('content')
    @include('components.imhrc.breadcrumbs', ['activeSpan' => 1])
    <div class="row">
        <div class="jumbotron msf-form" style="width: 100%">
            <br>
            <form id="form" enctype="multipart/form-data">
                <fieldset>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3"><b>Algorithms</b></div>
                        <div class="col-sm-8"><b>Parameters</b></div>
                    </div>
                    <hr>
                    @include('components.imhrc.algorithm', ['name' => 'AP', 'params' => ['Preference(P)']])
                    @include('components.imhrc.algorithm', ['name' => 'CFinder', 'params' => ['k-clique size(k)', 'Lower link weight threshold(w)', 'upper link weight threshold(W)', 'Maximum time of clique searching(t)']])
                    @include('components.imhrc.algorithm', ['name' => 'CMC', 'params' => ['Overlap threshold(w)', 'Merge threshold(m)', 'Minimum degree ratio(c)', 'Minimum size of clusters(s)']])
                    @include('components.imhrc.algorithm', ['name' => 'MCL', 'params' => ['Inflation(I)']])
                    @include('components.imhrc.algorithm', ['name' => 'MyClusterONE', 'params' => []])
                    @include('components.imhrc.algorithm', ['name' => 'RNSC', 'params' => ['Shuffling diversification length(d)', 'Diversification frequency(D)', 'Number of experiments(e)', 'Naive stopping tolerance(n)', 'Scaled stopping tolerance(N)', 'Tabu length(t)', 'Tabu tolerance(T)']])
                    @include('components.imhrc.algorithm', ['name' => 'RRW', 'params' => ['Restart probability(r)', 'Overlap threshold(overlap)', 'Early cutoff(lambda)', 'Minimum cluster size(min)', 'Maximum cluster size(max)']])
                    @include('components.imhrc.algorithm', ['name' => 'IMHRC', 'params' => ['Minimum size of cluster(min-size)', 'Maximum size of cluster(max-size)', 'Hub retrieving threshold(black-list)(γ)', 'Hub removing threshold (black-list)(β)', 'Overlap threshold(max-overlap)', 'Growing penalty(growth-penalty)', 'Hub retrieving penalty(back-penalty)', 'Minimum Density(min-density)']])
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-check">
                                <input class="form-check-input position-static" onclick="changeInputDisable('customAlgorithm', 'algo-custom')" type="checkbox" id='algo-custom' value='custom' aria-label="...">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            Upload the esult of your algorithm
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="customAlgorithm"></label>
                                <input type="file" disabled="true" class="form-control-file" id="customAlgorithm">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-next">Next</button>
                    </div>
                </fieldset>
                {{-------- DataSets --------}}
                <fieldset>
                    <div class="row">
                        <div class="col-sm-2">Datasets</div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" onclick="changeInputDisable('customDataset', 'customDatasetRadio')" type="radio" name="dataset" id="collins2007Radio" value="collins2007" checked>
                        <label class="form-check-label" for="collins2007Radio">
                            collins2007
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" onclick="changeInputDisable('customDataset', 'customDatasetRadio')" type="radio" name="dataset" id="gavin2006_socioaffinities_rescaledRadio" value="gavin2006_socioaffinities_rescaled">
                        <label class="form-check-label" for="gavin2006_socioaffinities_rescaledRadio">
                            gavin2006_socioaffinities_rescaled
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" onclick="changeInputDisable('customDataset', 'customDatasetRadio')" type="radio" name="dataset" id="krogan2006_coreRadio" value="krogan2006_core">
                        <label class="form-check-label" for="krogan2006_coreRadio">
                            krogan2006_core
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" onclick="changeInputDisable('customDataset', 'customDatasetRadio')" type="radio" name="dataset" id="krogan2006_extendedRadio" value="krogan2006_extended">
                        <label class="form-check-label" for="krogan2006_extendedRadio">
                            krogan2006_extended
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" onclick="changeInputDisable('customDataset', 'customDatasetRadio')" type="radio" name="dataset" id="customDatasetRadio" value="custom">
                        <label for="customDataset">Upload your custom dataset</label>
                        <input type="file" disabled="true" class="form-control-file" id="customDataset">
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-previous">Previous</button>
                        <button type="button" class="btn btn-primary btn-next">Next</button>
                    </div>

                </fieldset>

                {{-------- Goldstandards --------}}
                <fieldset>
                    <div class="row">
                        <div class="col-sm-2">Datasets</div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" onclick="changeInputDisable('customGoldstandard', 'customGoldstandardRadio')" type="radio" name="goldstandard" id="mips_3_100Radio" value="mips_3_100" checked>
                        <label class="form-check-label" for="mips_3_100Radio">
                            mips_3_100
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" onclick="changeInputDisable('customGoldstandard', 'customGoldstandardRadio')" type="radio" name="goldstandard" id="sgdRadio" value="sgd">
                        <label class="form-check-label" for="sgdRadio">
                            sgd
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" onclick="changeInputDisable('customGoldstandard', 'customGoldstandardRadio')" type="radio" name="goldstandard" id="customGoldstandardRadio" value="custom">
                        <label for="customGoldstandard"></label>
                        <input type="file" disabled="true" class="form-control-file" id="customGoldstandard">
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-previous">Previous</button>
                        <button type="button" class="btn btn-primary btn-next">Next</button>
                    </div>

                </fieldset>

                {{-------- Criterias --------}}
                <fieldset>
                    <div class="row">
                        <div class="col-sm-2">Criterias</div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="criteria1" value="ACC">
                        <label class="form-check-label" for="criteria1">
                            Sn, PPV, ACC
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="criteria2" value="MMR">
                        <label class="form-check-label" for="criteria2">
                            MMR
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="criteria3" value="Fmeasure">
                        <label class="form-check-label" for="criteria3">
                            Precision, Recall, Fmeasure
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="criteria4" value="FmeasurePlus">
                        <label class="form-check-label" for="criteria4">
                            Precision+, Recall+, Fmeasure+
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-previous">Previous</button>
                        <button type="button" onclick="imhrcResult()" class="btn btn-success btn-next">Results</button>
                    </div>

                </fieldset>

                {{--<button type="submit">submit</button>--}}
            </form>
        </div>
    </div>
    </div>
@endsection