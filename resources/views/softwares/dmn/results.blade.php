<div class="res">
    <div class="jumbotron">
        <div class="row">
            <div id="result" style="width: 100%">
                <div class="text-center"><h2>Results</h2></div>
                <br>
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        @if($resultTable)
                            <a class="nav-item nav-link active" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-result" aria-selected="true">Result</a>
                        @endif
                        @if($filter)
                            <a class="nav-item nav-link @if (!$resultTable) active @endif" id="nav-filters-tab" data-toggle="tab" href="#nav-filters" role="tab" aria-controls="nav-filters" aria-selected="true">Filters Table</a>
                        @endif
                        @if($resultFiles)
                            <a class="nav-item nav-link @if (!$resultTable && !$filter) active @endif" id="nav-download-tab" data-toggle="tab" href="#nav-download" role="tab" aria-controls="nav-download" aria-selected="true">Download the results</a>
                        @endif
                        <a class="nav-item nav-link @if (!$resultTable && !$filter && !$resultFiles) active @endif" id="nav-gephi-tab" data-toggle="tab" href="#nav-gephi" role="tab" aria-controls="nav-gephi" aria-selected="true">Gephi</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @if($resultTable)
                        <div class="tab-pane text-center fade show active" id="nav-result" role="tabpanel" aria-labelledby="nav-result-tab">
                            <br><br>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    @foreach($resultTable as $algo => $cris)
                                        <th scope="col">{{$algo}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($criterias as $criteria)
                                    <tr>
                                        <td>{{$criteria}}</td>
                                        @foreach($resultTable as $algo => $cris)
                                            <td>{{$resultTable[$algo][$criteria]}}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    @endif
                    @if($filter)
                        <div class="tab-pane text-center fade @if (!$resultTable)show active @endif" id="nav-filters" role="tabpanel" aria-labelledby="nav-filters-tab">
                            <br><br>
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        @foreach($filter[0] as $algo)
                                            <th scope="col">{{$algo}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($k=1; $k < sizeof($filter); $k++)
                                        <tr>
                                            @for($j = 0; $j < sizeof($filter[$k]); $j++)
                                                <td>{{$filter[$k][$j]}}</td>
                                            @endfor
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                        </div>
                    @endif
                    @if($resultFiles)
                        <div class="tab-pane text-center fade @if (!$resultTable && !$filter) show active @endif" id="nav-download" role="tabpanel" aria-labelledby="nav-download-tab">
                            <br><br>
                            <table class="table">
                                <tbody>
                                @foreach($resultFiles as $file)
                                    <tr>
                                        <td scope="col"><a href={{$file["path"]}} Graphical Representation>{{$file["name"]}}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                        <div class="tab-pane text-center fade @if (!$resultTable && !$filter && !$resultFiles) show active @endif" id="nav-gephi" role="tabpanel" aria-labelledby="nav-gephi-tab">
                            <br><br>
                            <p>you can download gephi software from <a target="_blank" href="/storage/dmn/Instruction for using the gephi software.pdf">here</a></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>