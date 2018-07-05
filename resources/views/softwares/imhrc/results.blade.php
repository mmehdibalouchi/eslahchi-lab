<div class="res">
    <div class="jumbotron">
        <div class="row">
                <div class="jumbotron" style="width: 100%">
                    <div class="text-center"><h2>Results</h2></div>
                    <br>
                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">

                            @for ($i = 0; $i < sizeof($criterias); $i++)
                                @if($i == 0)
                                    <a class="nav-item nav-link active" id={{"nav-".$criterias[$i]["value"]."-tab"}} data-toggle="tab" href={{"#nav-".$criterias[$i]["value"]}} role="tab" aria-controls="nav-home" aria-selected="true">{{$criterias[$i]["name"]}}</a>
                                @else
                                    <a class="nav-item nav-link" id={{"nav-".$criterias[$i]["value"]."-tab"}} data-toggle="tab" href={{"#nav-".$criterias[$i]["value"]}} role="tab" aria-controls="nav-home" aria-selected="true">{{$criterias[$i]["name"]}}</a>
                                @endif
                            @endfor
                                <a class="nav-item nav-link" id="nav-download-tab" data-toggle="tab" href="#nav-download" role="tab" aria-controls="nav-home" aria-selected="true">Download</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @for ($i = 0; $i < sizeof($criterias); $i++)
                            @if($i == 0)
                                    <div class="tab-pane text-center fade show active" id={{"nav-".$criterias[$i]["value"]}} role="tabpanel" aria-labelledby={{"nav-".$criterias[$i]["value"]."-tab"}}>
                                        <br><br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                @foreach($criterias[$i]["table"][0] as $algo)
                                                    <th scope="col">{{$algo}}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($k=1; $k < sizeof($criterias[$i]["table"]) - 1; $k++)
                                                <tr>
                                                    @for($j = 0; $j < sizeof($criterias[$i]["table"][$k]); $j++)
                                                        <td>{{$criterias[$i]["table"][$k][$j]}}</td>
                                                    @endfor
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                        <br>
                                        @if($criterias[$i]["value"] != "ACC" && $criterias[$i]["value"] != "AUMF")
                                            <img class="img-thumbnail" src="/{{$path.$criterias[$i]["value"].'_plot.png'}}">
                                        @endif

                                    </div>
                            @else
                                    <div class="tab-pane text-center fade" id={{"nav-".$criterias[$i]["value"]}} role="tabpanel" aria-labelledby={{"nav-".$criterias[$i]["value"]."-tab"}}>
                                        <br><br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                @foreach($criterias[$i]["table"][0] as $algo)
                                                    <th scope="col">{{$algo}}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($k=1; $k < sizeof($criterias[$i]["table"]) - 1; $k++)
                                                <tr>
                                                    @for($j = 0; $j < sizeof($criterias[$i]["table"][$k]); $j++)
                                                        <td>{{$criterias[$i]["table"][$k][$j]}}</td>
                                                    @endfor
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                        <br>
                                        @if($criterias[$i]["value"] != "ACC" && $criterias[$i]["value"] != "AUMF")
                                            <img class="img-thumbnail" src="/{{$path.$criterias[$i]["value"].'_plot.png'}}">
                                        @endif
                                    </div>
                            @endif
                        @endfor
                            <div class="tab-pane text-center fade" id="nav-download" role="tabpanel" aria-labelledby="nav-download-tab">
                                <br><br>
                                <table class="table">
                                    <tbody>
                                            @foreach($algorithmOutputs as $algo => $address)
                                                <tr>
                                                    <td scope="col"><a href={{"/".$path.$address}} download>{{$algo}}</a></td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>