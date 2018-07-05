<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $pvalueCriterias = ['go_distance_bp_F', 'go_distance_bp_G', 'go_distance_cc_F', 'go_distance_cc_G', 'go_distance_mf_F', 'go_distance_mf_G', 'chebi_distance', 'cohesion_coupling', 'coexpression_of_enzymes'];
        $outputResult = json_decode(Storage::get('softwares/dmn/source/EVAL_RESULTS/'.$request->dataset.'/results.txt'));
        $outputPvalueResult = json_decode(Storage::get('softwares/dmn/source/EVAL_RESULTS/'.$request->dataset.'/pvalue_results.txt'));
        $resultTable = [];
        foreach ($request->algorithms as $algo)
        {
            foreach ($request->criterias as $cri)
            {
                if(in_array($cri, $pvalueCriterias))
                    $resultTable[$algo][$cri] = $outputPvalueResult->$cri->$algo;
                else
                    $resultTable[$algo][$cri] = $outputResult->$cri->$algo;
            }
        }
        return view('softwares.dmn.results', ['resultTable' => $resultTable, 'criterias' => $request->criterias]);
    }
}
