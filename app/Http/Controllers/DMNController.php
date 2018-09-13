<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DMNController extends Controller
{
    public function __construct()
    {
    }

    public function process(Request $request)
    {
        $now = microtime(true);
        if($request->hasFile('customAlgorithm')) {
            $request->file('customAlgorithm')->storeAs('softwares/dmn/runs/' . $now . '/algorithm/', 'custom.txt');
        }
        $pvalueCriterias = ['go_distance_bp_F', 'go_distance_bp_G', 'go_distance_cc_F', 'go_distance_cc_G', 'go_distance_mf_F', 'go_distance_mf_G', 'chebi_distance_mf', 'cohesion_coupling', 'coexpression_of_enzymes'];
        $outputResult = json_decode(Storage::get('softwares/dmn/source/EVAL_RESULTS/'.$request->dataset.'/results.txt'));
        $outputPvalueResult = json_decode(Storage::get('softwares/dmn/source/EVAL_RESULTS/'.$request->dataset.'/pvalue_results.txt'));
        $resultTable = [];
        foreach ($request->algorithms as $method)
        {
            foreach ($request->criterias as $cri)
            {
                if(in_array($cri, $pvalueCriterias)) {
//                    var_dump('Hi');
                    foreach ($outputPvalueResult->$cri as $jsonMethod=> $value) {
//                        var_dump("inja umade", $jsonMethod, $value);
                        if(substr($jsonMethod, 0, strlen($method)) === $method) {
                            $resultTable[$jsonMethod][$cri] = $value;
                        }
                    }
                }
                else {
                    foreach ($outputResult->$cri as $jsonMethod=> $value) {
                        if (substr($jsonMethod, 0, strlen($method)) === $method) {
                            $resultTable[$jsonMethod][$cri] = $value;

                        }
                    }
                }
            }
        }
        var_dump($resultTable);
        $commandMethods = "\"".implode("\",\"", $request->algorithms)."\"";
        system("cd ../storage/app/softwares/dmn/source/gephi && python3.6 -c 'import one_program1; one_program1.go(\"$request->dataset\", [$commandMethods], \"../../../../public/dmn/runs/".$now."/\")' >> log.txt 2>&1", $res);
//        sleep(1);
        var_dump('res', $res);
        var_dump("system", "cd ../storage/app/softwares/dmn/source/gephi && python3.6 -c 'import one_program1; one_program1.go(\"$request->dataset\", [$commandMethods], \"../../../../public/dmn/runs/".$now."/\")'");
        var_dump(system("cd ../storage/app/softwares/dmn/source/gephi && ls"));
        //create result files pathes
            $index = 0;
            foreach (Storage::files("public/dmn/runs/$now/") as $fileAdr) {
                $fileAdrArr = explode("/", $fileAdr);
                $filename = $fileAdrArr[sizeof($fileAdrArr)-1];
                $resultFiles[] = ["name" => $filename, "path" => "/storage/dmn/runs/$now/".$filename];
                $index++;
            }
            var_dump("after");
        foreach ($request->criterias as $cri) {
            foreach (array_keys($resultTable) as $resultMehotd)
                if (!isset($resultTable[$resultMehotd][$cri]))
                    $resultTable[$resultMehotd][$cri] = "-";
        }
//        dd($resultFiles);
        $filter = false;
        if($request->has("hasFilter") && $request->hasFilter == "true")
        {
            if($request->has("filterOption"))
            {
                if($request->filterOption == "metabolites") {
                    $commandMethods = "\"" . implode("\",\"", $request->metabolitesMethods) . "\"";
                    $first = $request->firstMetabolites;
                    $second = $request->secondMetabolites;
                }
                else {
                    $commandMethods = "\"" . implode("\",\"", $request->reactionsMethods) . "\"";
                    $first = $request->firstReactions;
                    $second = $request->secondReactions;
                }

                system("cd ../storage/app/softwares/dmn/source/gephi && python -c 'from find_module2 import go; go(\"$request->dataset\", [$commandMethods], \"$first\", \"$second\", \"../../../../public/dmn/runs/".$now."/filter.txt\")'");
                var_dump("filter", "cd ../storage/app/softwares/dmn/source/gephi && python -c 'from find_module2 import go; go(\"$request->dataset\", [$commandMethods], \"$first\", \"$second\", \"../../../../public/dmn/runs/".$now."/filter.txt\")'");
                $t = explode("\n", File::get('storage/dmn/runs/' . $now . '/filter.txt'));
                for ($i =0 ; $i<sizeof($t); $i++)
                    $t[$i] = explode(",", $t[$i]);
                $filter = $t;
            }

        }
        return view('softwares.dmn.results', ['resultTable' => $resultTable, 'resultFiles' => isset($resultFiles)? $resultFiles: null, 'criterias' => $request->criterias, 'filter' => $filter]);
    }
}
