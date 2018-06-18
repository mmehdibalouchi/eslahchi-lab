<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    protected $algorithmsParams = [
        'AP' => [['id' => 'p', 'name' => 'Preference(P)']],
        'CFinder' => [['id' => 'k', 'name' => 'k-clique size(k)'], ['id' =>'w', 'name' => 'Lower link weight threshold(w)'], ['id' =>'W', 'name' => 'upper link weight threshold(W)'], ['id' =>'t', 'name' => 'Maximum time of clique searching(t)']],
        'CMC' => [['id' =>'w', 'name' => 'Overlap threshold(w)'], ['id' =>'m', 'name' => 'Merge threshold(m)'], ['id' =>'c', 'name' => 'Minimum degree ratio(c)'], ['id' =>'s', 'name' => 'Minimum size of clusters(s)']],
        'MCL' => [['id' =>'I', 'name' => 'Inflation(I)']],
        'MyClusterONE' => [],
        'RNSC' => [['id' => 'd', 'name' => 'Shuffling diversification length(d)'],['id' => 'D', 'name' => 'Diversification frequency(D)'],['id' => 'e', 'name' => 'Number of experiments(e)'],['id' => 'n', 'name' => 'Naive stopping tolerance(n)'],['id' => 'N', 'name' => 'Scaled stopping tolerance(N)'],['id' => 't', 'name' => 'Tabu length(t)'],['id' => 'T', 'name' => 'Tabu tolerance(T)']],
        'RRW' => [['id' => 'r', 'name' => 'Restart probability(r)'],['id' => 'overlap', 'name' => 'Overlap threshold(overlap)'],['id' => 'lambda', 'name' => 'Early cutoff(lambda)'],['id' => 'min', 'name' => 'Minimum cluster size(min)'],['id' => 'max', 'name' => 'Maximum cluster size(max)']],
        'IMHRC' => [['id' =>'min-size', 'name' => 'Minimum size of cluster(min-size)'], ['id' =>'max-size', 'name' => 'Maximum size of cluster(max-size)'], ['id' =>'black-list(γ)', 'name' => 'Hub retrieving threshold(black-list)(γ)'], ['id' =>'black-list(β)', 'name' => 'Hub removing threshold (black-list)(β)'], ['id' =>'max-overlap', 'name' => 'Overlap threshold(max-overlap)'], ['id' =>'growth-penalty', 'name' => 'Growing penalty(growth-penalty)'], ['id' =>'max-penalty', 'name' => 'Hub retrieving penalty(back-penalty)']]
    ];
    public function __construct()
    {
    }

    public function imhrcResult(Request $request)
    {
        $now = microtime(true);
        Storage::copy('softwares/imhrc/source/MyClusteringPackage51.jar', 'softwares/imhrc/runs/'.$now.'/MyClusteringPackage51.jar');

        if($request->hasFile('customDataset'))
            $request->file('customDataset')->storeAs('softwares/imhrc/runs/'.$now.'/dataset/', 'custom.txt');
        if($request->hasFile('customGoldstandard'))
            $request->file('customGoldstandard')->storeAs('softwares/imhrc/runs/'.$now.'/goldstandard/','custom.txt');
        $algorithms = explode(",", $request->algorithms);
        foreach ($algorithms as $algo)
        {
            var_dump($algo);
            if($algo == "custom" && $request->hasFile('customAlgorithm'))
                $request->file('customAlgorithm')->storeAs('softwares/imhrc/runs/'.$now.'/algorithm/','custom.txt');
            else
            {
                $line = $algo.' ';
                $line = $line.'F:\project\Sources\datasets\\'.$request->dataset.'.txt';
                foreach ($this->algorithmsParams[$algo] as $param)
                {
                    var_dump($algo.'-'.str_replace(" ", "%20", $param['name']), $request->has($algo.'-'.str_replace(" ", "%20", $param['name']))? 'true': 'false');
                    $line = $line.' '.'-'.$param['id'].' '.$request->input($algo.'-'.str_replace(" ", "%20", $param['name']), 0);
                }
                Storage::append('softwares/imhrc/runs/'.$now.'/input.txt', $line);
            }
        }
        dd($request->all());
    }
}
