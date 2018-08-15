<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class IMHRCController extends Controller
{
    protected $algorithmsParams = [
        'AP' => ['command' => 'AP', 'outputdir' => 'AP', 'params' => ['Preference(P)' => 'p']],
        'CFinder' => ['command' => 'CFinder', 'outputdir' => 'CFinder', 'params' => ['k-clique size(k)' => 'k', 'Lower link weight threshold(w)' => 'w', 'upper link weight threshold(W)' => 'W', 'Maximum time of clique searching(t)'=> 't']],
        'CMC' => ['command' => 'CMC', 'outputdir' => 'CMC', 'params' => ['Overlap threshold(w)' => 'w', 'Merge threshold(m)' => 'm', 'Minimum degree ratio(c)' => 'c', 'Minimum size of clusters(s)' => 's']],
        'MCL' => ['command' => 'MCL1', 'outputdir' => 'MCL', 'params' => ['Inflation(I)' => 'I']],
        'ClusterONE' => ['command' => 'MyClusterONE', 'outputdir' => 'MyClusterONE', 'params' => []],
        'RNSC' => ['command' => 'RNSC', 'outputdir' => 'RNSC', 'params' => ['Shuffling diversification length(d)' => 'd', 'Diversification frequency(D)' => 'D', 'Number of experiments(e)' => 'e', 'Naive stopping tolerance(n)' => 'n', 'Scaled stopping tolerance(N)' => 'N', 'Tabu length(t)' => 't', 'Tabu tolerance(T)' => 'T']],
        'RRW' => ['command' => 'RRW', 'outputdir' => 'RRW', 'params' => ['Restart probability(r)' => 'r', 'Overlap threshold(overlap)' => 'overlap', 'Early cutoff(lambda)' => 'lambda']],
        'IMHRC' => ['command' => 'XAlgorithm', 'outputdir' => 'XAlgorithm', 'params' => ['Minimum size of cluster(min-size)' => 'min-size', 'Maximum size of cluster(max-size)' => 'max-size', 'Hub retrieving threshold(black-list)(γ)' => 'black-list(γ)', 'Hub removing threshold (black-list)(β)' => 'black-list(β)', 'Overlap threshold(max-overlap)' => 'max-overlap', 'Growing penalty(growth-penalty)' => 'growth-penalty', 'Hub retrieving penalty(back-penalty)' => 'back-penalty', 'Minimum Density(min-density)' => 'min-density']]
    ];
    protected $criterias = [
        "ACC" => "Sn, PPV, ACC",
        "MMR" => "MMR",
        "Fmeasure" => "Precision, Recall, Fmeasure",
        "FmeasurePlus" => "Precision+, Recall+, Fmeasure+",
        "AUMF" => "AUMF"
    ];
    public function __construct()
    {
    }

    public function process(Request $request)
    {
        $now = microtime(true);
        Storage::copy('softwares/imhrc/source/MyClusteringPackage51.jar', 'softwares/imhrc/runs/'.$now.'/MyClusteringPackage51.jar');
        if(File::exists('../storage/app/softwares/imhrc/source/programsFile'))
            File::copyDirectory('../storage/app/softwares/imhrc/source/programsFile', '../storage/app/softwares/imhrc/runs/'.$now.'/programsFile');
        Storage::copy('softwares/imhrc/goldstandards/test.txt', 'softwares/imhrc/runs/'.$now.'/assets/sourcesofdata/gold_standard/test.txt');
        if($request->hasFile('customDataset')) {
            $request->file('customDataset')->storeAs('softwares/imhrc/runs/' . $now . '/dataset/', 'custom.txt');
            $datasetAddress = 'dataset/custom.txt';
            $datasetPyAddress = '../runs/'.$now.'/dataset/custom.txt';
        }
        else {
            $datasetAddress = '../../datasets/' . $request->input('dataset', 'collins2007') . '.txt';
            $datasetPyAddress = '../datasets/'.$request->input('dataset', 'collins2007') . '.txt';
        }

        if($request->hasFile('customGoldstandard')) {
            $request->file('customGoldstandard')->storeAs('softwares/imhrc/runs/' . $now . '/goldstandard/', 'custom.txt');
            $goldstandardAddress = '../runs/'.$now.'/goldstandard/custom.txt';
        }
        else
            $goldstandardAddress = '../goldstandards/'.$request->input('goldstandard', 'sgd').'.txt';

        $algorithms = explode(",", $request->algorithms);

        foreach ($algorithms as $algo)
        {
//            var_dump($algo);
            if($algo == "custom" && $request->hasFile('customAlgorithm'))
                $request->file('customAlgorithm')->storeAs('softwares/imhrc/runs/'.$now.'/algorithm/','custom.txt');
            else
            {
                $line = $this->algorithmsParams[$algo]["command"].' ';
                $line = $line.$datasetAddress;
                foreach ($this->algorithmsParams[$algo]["params"] as $name => $id)
                {
//                    var_dump($algo.'-'.str_replace(" ", "%20", $param['name']), $request->has($algo.'-'.str_replace(" ", "%20", $param['name']))? 'true': 'false');
                     if ($algo == "IMHRC")
                     {
                        if($id == 'black-list(β)')
                            continue;
                        if($id == 'black-list(γ)')
                            $line = $line.' '.'-black-list'.' ('.$request->input($algo.'-'.str_replace(" ", "%20", $name), 0).','.$request->input($algo.'-'.str_replace(" ", "%20", "Hub removing threshold (black-list)(β)"), 0).')';
                        else
                            $line = $line.' '.'-'.$id.' '.$request->input($algo.'-'.str_replace(" ", "%20", $name), 0);
                     }
                    else
                        $line = $line.' '.'-'.$id.' '.$request->input($algo.'-'.str_replace(" ", "%20", $name), 0);
                }
                Storage::append('softwares/imhrc/runs/'.$now.'/input.txt', $line);
            }
        }
        system('cd ../storage/app/softwares/imhrc/runs/'.$now.' && java -jar MyClusteringPackage51.jar input.txt >> log.txt 2>&1', $javaCommandResult);
        var_dump('cd ../storage/app/softwares/imhrc/runs/'.$now.' && java -jar MyClusteringPackage51.jar input.txt');
        Storage::makeDirectory('softwares/imhrc/runs/'.$now.'/results');
        File::makedirectory('imhrc/'.$now);
        File::makedirectory('imhrc/'.$now.'/results');
        $algorithmsFiles = '';
        $algorithmOutputs = [];
        foreach($algorithms as $algo) {
            if($algo == "custom")
                $algorithmsFiles = $algorithmsFiles . '../runs/' . $now . '/algorithm/custom.txt';
            else {
                $address = Storage::files('softwares/imhrc/runs/' . $now . '/outputs/RawResults/' . $this->algorithmsParams[$algo]["outputdir"])[0];
                $algorithmsFiles = $algorithmsFiles . storage_path() . '/app/' . $address . ',';
                $addArr = explode("/", $address);
                $algorithmOutputs[$algo] = $addArr[sizeof($addArr)-2].'/'.$addArr[sizeof($addArr)-1];

                var_dump($address);
                if($request->has('complexFilters') && $request->complexFilters) {
                    $res = explode("\n", Storage::get($address));
                    foreach ($res as $line) {
                        $proteins = explode("\t", $line);
                        $size = sizeof($proteins);
                        if (!$request->has('proteinComplexFilter') || in_array($request->proteinComplexFilter, $proteins))
                            if (!$request->has('minComplexFileter') || $size >= intval($request->minComplexFileter))
                                if (!$request->has('maxComplexFilter') || $size <= intval($request->maxComplexFilter))
                                    File::append('imhrc/' . $now . '/results/' . $algo . '-filter.txt', $line . PHP_EOL);
                    }
                    if(!File::exists('imhrc/' . $now . '/results/' . $algo . '-filter.txt'))
                        File::append('imhrc/' . $now . '/results/' . $algo . '-filter.txt', "No Match for your filters!");
                }
            }

        }
        $pythonCommand = 'cd ../storage/app/softwares/imhrc/source && python3.6 comparison.py dataset='.$datasetPyAddress.' goldStandard='.$goldstandardAddress
            .' criteria='.$request->input('criterias', 'ACC').' algorithmNames='.$request->algorithms.' algorithmFiles='.rtrim($algorithmsFiles, ",")
            .' output='.storage_path('app').'/softwares/imhrc/runs/'.$now.'/results/';
        if($request->has("criteriatsh"))
            $pythonCommand = $pythonCommand.' threshold='.$request->criteriatsh;
        var_dump($pythonCommand);
        system($pythonCommand, $res);
        sleep(3);
        File::copyDirectory('../storage/app/softwares/imhrc/runs/'.$now.'/results', 'imhrc/'.$now.'/results');
        File::copyDirectory('../storage/app/softwares/imhrc/runs/'.$now.'/outputs/RawResults', 'imhrc/'.$now.'/results');
        File::deleteDirectory('../storage/app/softwares/imhrc/runs/'.$now);
        var_dump($res);
        $criteriasInput = explode(",", $request->criterias);
        foreach ($criteriasInput as $cri) {
            $t = explode("\n", File::get('imhrc/' . $now . '/results/' . $cri . '_table.txt'));
            for ($i =0 ; $i<sizeof($t); $i++)
                $t[$i] = explode(",", $t[$i]);
//            var_dump("table", $t);
            $criterias[] = ["value" => $cri, "name" => $this->criterias[$cri], "table" => $t];
        }
        return view('softwares.imhrc.results', ['criterias' => $criterias, 'algorithmOutputs' => $algorithmOutputs ,'path' => 'imhrc/'.$now.'/results/', 'hasFilter' => $request->complexFilters? true: false, 'hasTsh' => $request->criteriatsh? true: false]);
//        return system();
//        return $res;
        return redirect('softwares/imhrc/results');

        dd($request->all());
    }
}
