<div class="res">
    <div class="jumbotron">
        <div class="row">
            <div class="jumbotron" style="width: 100%">
                <div class="text-center"><h2>Results</h2></div>
                <br>
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-home" aria-selected="true">Result</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane text-center fade show active" id="nav-result-tab" role="tabpanel" aria-labelledby="nav-result-tab">
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
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>