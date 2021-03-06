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
        $isMethodReaction = ['muller' => true, 'muller2_new' => true, 'poolman' => true, 'sridharan' => true, 'guimera' => false, 'holme' => false, 'Ding' => false, 'verwoerd' => false, 'schuster' => false, 'newman' => false];
        $metaboliteCriterias = ['modularity', 'efficacy', 'chebi_distance_mf', 'module_count'];
        $reactionCriterias = ['module_count', 'cohesion_coupling', 'efficacy', 'coexpression_of_enzymes', 'go_distance_bp_F', 'go_distance_bp_G', 'go_distance_cc_F', 'go_distance_cc_G', 'go_distance_mf_F', 'go_distance_mf_G'];

//        $pvalueCriterias = ['go_distance_bp_F', 'go_distance_bp_G', 'go_distance_cc_F', 'go_distance_cc_G', 'go_distance_mf_F', 'go_distance_mf_G', 'chebi_distance_mf', 'cohesion_coupling', 'coexpression_of_enzymes'];
        $pvalueCriterias = [];
        $outputResult = json_decode(Storage::get('softwares/dmn/source/EVAL_RESULTS/'.$request->dataset.'/results.txt'));
//        $outputPvalueResult = json_decode(Storage::get('softwares/dmn/source/EVAL_RESULTS/'.$request->dataset.'/pvalue_results.txt'));
        $shouldUnset = [];
        $resultTable = [];
        if($request->has('algorithms') && $request->has('criterias')) {
            foreach ($request->algorithms as $method) {
                foreach ($request->criterias as $cri) {
//                    var_dump($method, $cri, $isMethodReaction[$method], !in_array($cri, $reactionCriterias));
                    if(($isMethodReaction[$method] && !in_array($cri, $reactionCriterias)) || (!$isMethodReaction[$method] && !in_array($cri, $metaboliteCriterias)))
                    {
                        $resultTable[$method][$cri] = "-";
                    }
                    else
                    {
//                        if (in_array($cri, $pvalueCriterias)) {
//                            foreach ($outputPvalueResult->$cri as $jsonMethod => $value) {
//                                if (substr($jsonMethod, 0, strlen($method)) === $method) {
//                                    $resultTable[$jsonMethod][$cri] = $value;
//                                    if($jsonMethod != $method)
//                                        $shouldUnset[$method] = true;
//                                }
//                            }
//                        }
//                        else
//                            {
                            foreach ($outputResult->$cri as $jsonMethod => $value) {
                                if (substr($jsonMethod, 0, strlen($method)) === $method) {
                                    $resultTable[$jsonMethod][$cri] = $value;
                                    if($jsonMethod != $method)
                                        $shouldUnset[$method] = true;
                                }
                            }
//                        }
                    }
                }
                foreach (Storage::files("public/dmn/cash/$request->dataset/") as $fileAdr) {
                    if (strpos($fileAdr, $method)) {
                        $fileAdrArr = explode("/", $fileAdr);
                        $filename = $fileAdrArr[sizeof($fileAdrArr) - 1];
                        $resultFiles[] = ["name" => $filename, "path" => "/storage/dmn/cash/$request->dataset/" . $filename];
                    }
                }
            }
            var_dump($resultTable);
            var_dump("after");
            foreach ($request->criterias as $cri) {
                foreach (array_keys($resultTable) as $resultMehotd) {
                    if (!isset($resultTable[$resultMehotd][$cri]))
                        $resultTable[$resultMehotd][$cri] = "-";
                    if(in_array($resultMehotd, array_keys($shouldUnset)))
                        unset($resultTable[$resultMehotd]);
                }
            }
        }
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

                system("cd ../storage/app/softwares/dmn/source/gephi && python3.6 -c 'from find_module2 import go; go(\"$request->dataset\", [$commandMethods], \"$first\", \"$second\", \"../../../../public/dmn/runs/".$now."/filter.txt\")'");
                $t = explode("\n", File::get('storage/dmn/runs/' . $now . '/filter.txt'));
                for ($i =0 ; $i<sizeof($t); $i++)
                    $t[$i] = explode(",", $t[$i]);
                $filter = $t;
            }

        }
        return view('softwares.dmn.results', ['resultTable' => isset($resultTable)? $resultTable: false, 'resultFiles' => isset($resultFiles)? $resultFiles: false, 'criterias' => isset($request->criterias)? $request->criterias: false, 'filter' => $filter]);
    }
}
