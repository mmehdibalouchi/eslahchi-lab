<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        //lod time directory
        $dt = Carbon::now();
        //log
        Storage::append("softwares/imhrc/logs/".$dt->toDateString()."/".$dt->toTimeString()."-".$now.".txt", 'process started at: '.$dt->toDateTimeString());
        //copy java source tu run directory
        Storage::copy('softwares/imhrc/source/MyClusteringPackage51.jar', 'softwares/imhrc/runs/'.$now.'/MyClusteringPackage51.jar');
        //copy profgramsFile source
        if(File::exists('../storage/app/softwares/imhrc/source/programsFile'))
            File::copyDirectory('../storage/app/softwares/imhrc/source/programsFile', '../storage/app/softwares/imhrc/runs/'.$now.'/programsFile');
        if(Storage::exists('softwares/imhrc/source/programsFile/AP/source/apclusterunix64.so'))
            Storage::copy('softwares/imhrc/source/programsFile/AP/source/apclusterunix64.so', 'softwares/imhrc/runs/'.$now.'/apclusterunix64.so');
        if(Storage::exists('softwares/imhrc/source/programsFile/AP/source/apcluster'))
            Storage::copy('softwares/imhrc/source/programsFile/AP/source/apcluster', 'softwares/imhrc/runs/'.$now.'/apcluster');
        //copy fake goldstandard
        Storage::copy('softwares/imhrc/goldstandards/test.txt', 'softwares/imhrc/runs/'.$now.'/assets/sourcesofdata/gold_standard/test.txt');
        $datasetName = $request->dataset;
        if($request->hasFile('customDataset')) {
            $request->file('customDataset')->storeAs('softwares/imhrc/runs/' . $now . '/dataset/', 'custom.txt');
            $datasetName =  hash_file('md5', "../storage/app/softwares/imhrc/runs/$now/dataset/custom.txt");
            Storage::move('softwares/imhrc/runs/' . $now . '/dataset/custom.txt', 'softwares/imhrc/runs/' . $now . '/dataset/'.$datasetName.'.txt');
            $datasetAddress = "dataset/$datasetName.txt";
            $datasetPyAddress = "../runs/$now/dataset/$datasetName.txt";
        }
        else {
            $datasetAddress = '../../datasets/' . $request->input('dataset', 'collins2007') . '.txt';
            $datasetPyAddress = '../datasets/'.$request->input('dataset', 'collins2007') . '.txt';
        }

        $goldstandardName = $request->goldstandard;
        if($request->hasFile('customGoldstandard')) {
            $request->file('customGoldstandard')->storeAs('softwares/imhrc/runs/' . $now . '/goldstandard/', 'custom.txt');
            $goldstandardName =  hash_file('md5', "../storage/app/softwares/imhrc/runs/$now/goldstandard/custom.txt");
            Storage::move('softwares/imhrc/runs/' . $now . '/goldstandard/custom.txt', 'softwares/imhrc/runs/' . $now . '/goldstandard/'.$goldstandardName.'.txt');
            $goldstandardAddress = "../runs/$now/goldstandard/$goldstandardName.txt";
        }
        else
            $goldstandardAddress = '../goldstandards/'.$request->input('goldstandard', 'sgd').'.txt';

        $algorithms = explode(",", $request->algorithms);
        $customAlgorithName = null;
        foreach ($algorithms as $algo)
        {
//            var_dump($algo);
            if($algo == "custom" && $request->hasFile('customAlgorithm')) {
                $request->file('customAlgorithm')->storeAs('softwares/imhrc/runs/' . $now . '/algorithm/', 'custom.txt');
                $customAlgorithName =  hash_file('md5', "../storage/app/softwares/imhrc/runs/$now/algorithm/custom.txt");
                Storage::move('softwares/imhrc/runs/' . $now . '/algorithm/custom.txt', 'softwares/imhrc/runs/' . $now . '/algorithm/'.$customAlgorithName.'.txt');
            }
            else if($algo != "custom")
            {
                $cashAlgoName = $algo.'-';
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

                     $cashAlgoName = $cashAlgoName.$id[0].'-'.$request->input($algo.'-'.str_replace(" ", "%20", $name), 0).'-';
                }
                if(!Storage::exists('public/imhrc/cash/'.$datasetName.'/'.$cashAlgoName.'.txt')) {
                    $this->algorithmsParams[$algo]["cash"] = false;
                    $this->algorithmsParams[$algo]["cashName"] = $cashAlgoName;
                    Storage::append('softwares/imhrc/runs/' . $now . '/input.txt', $line);
                }
                else {
                    $this->algorithmsParams[$algo]["cash"] = true;
                    $this->algorithmsParams[$algo]["cashName"] = $cashAlgoName;
                }
            }
        }
        Storage::append("softwares/imhrc/logs/".$dt->toDateString()."/".$dt->toTimeString()."-".$now.".txt", 'ali package started at: '.Carbon::now()->toDateTimeString());
        if(Storage::exists('softwares/imhrc/runs/'.$now.'/input.txt')) {
//            system('cd ../storage/app/softwares/imhrc/runs/' . $now . ' && java -jar MyClusteringPackage51.jar input.txt & echo $! | tee -a pid.txt', $javaCommandResult);
            shell_exec('cd ../storage/app/softwares/imhrc/runs/' . $now . ' && java -jar MyClusteringPackage51.jar input.txt >> log.txt');

        }
        Storage::append("softwares/imhrc/logs/".$dt->toDateString()."/".$dt->toTimeString()."-".$now.".txt", 'ali package ended at: '.Carbon::now()->toDateTimeString());
        var_dump('cd ../storage/app/softwares/imhrc/runs/'.$now.' && java -jar MyClusteringPackage51.jar input.txt');
        Storage::makeDirectory('softwares/imhrc/runs/'.$now.'/results');
        Storage::makedirectory('public/imhrc/runs/'.$now);
        Storage::makedirectory('public/imhrc/runs/'.$now.'/results');
        $algorithmsFiles = '';
        $algorithmOutputs = [];

        foreach($algorithms as $algo) {
            if($algo == "custom") {
                $algorithmsFiles = $algorithmsFiles . storage_path() . "/app/public/imhrc/cash/$datasetName/$customAlgorithName.txt". ',';
                Storage::copy('softwares/imhrc/runs/' . $now . '/algorithm/'.$customAlgorithName.'.txt', "public/imhrc/cash/".$datasetName."/".$customAlgorithName.'.txt');
            }
            else {

                if($this->algorithmsParams[$algo]["cash"]) {
                    $address = 'public/imhrc/cash/'.$datasetName.'/'.$this->algorithmsParams[$algo]['cashName'].'.txt';
                    $algorithmsFiles = $algorithmsFiles . storage_path() . '/app/' . $address . ',';
                    $algorithmOutputs[$algo] = 'storage/'.'/imhrc/cash/'.$datasetName.'/'.$this->algorithmsParams[$algo]['cashName'].'.txt';;
                }
                else{
                    $address = Storage::files('softwares/imhrc/runs/' . $now . '/outputs/RawResults/' . $this->algorithmsParams[$algo]["outputdir"])[0];
                    Storage::copy($address, "public/imhrc/cash/".$datasetName."/".$this->algorithmsParams[$algo]["cashName"].'.txt');
                    $address = 'public/imhrc/cash/'.$datasetName.'/'.$this->algorithmsParams[$algo]['cashName'].'.txt';
                    $algorithmsFiles = $algorithmsFiles . storage_path() . '/app/' . $address . ',';
                    $addArr = explode("/", $address);
//                    $algorithmOutputs[$algo] = 'storage/imhrc/runs/'.$now.'/results/'.$addArr[sizeof($addArr) - 2] . '/' . $addArr[sizeof($addArr) - 1];
                    $algorithmOutputs[$algo] = 'storage/'.'/imhrc/cash/'.$datasetName.'/'.$this->algorithmsParams[$algo]['cashName'].'.txt';;

                }

                var_dump($address);
//                ==========================Here is for Complex Filtering======================
                if($request->has('complexFilters') && $request->complexFilters) {
                    Storage::append("softwares/imhrc/logs/".$dt->toDateString()."/".$dt->toTimeString()."-".$now.".txt", 'Filtering for algorithms at: '.Carbon::now()->toDateTimeString());
                    $res = explode("\n", Storage::get($address));
                    foreach ($res as $line) {
                        $proteins = explode("\t", $line);
                        $size = sizeof($proteins);
                        if (!$request->has('proteinComplexFilter') || in_array($request->proteinComplexFilter, $proteins))
                            if (!$request->has('minComplexFileter') || $size >= intval($request->minComplexFileter))
                                if (!$request->has('maxComplexFilter') || $size <= intval($request->maxComplexFilter))
                                    Storage::append('public/imhrc/runs/' . $now . '/results/' . $algo . '-filter.txt', $line . PHP_EOL);
                    }
                    if(!Storage::exists('public/imhrc/runs/' . $now . '/results/' . $algo . '-filter.txt'))
                        Storage::append('public/imhrc/runs/' . $now . '/results/' . $algo . '-filter.txt', "No Match for your filters!");
                }
            }

        }
        $pythonCommand = 'cd ../storage/app/softwares/imhrc/source && python3.6 comparison.py dataset='.$datasetPyAddress.' goldStandard='.$goldstandardAddress
            .' criteria='.$request->input('criterias', 'ACC').' goldName='.$goldstandardName.' algorithmNames='.$request->algorithms.' algorithmFiles='.rtrim($algorithmsFiles, ",")
            .' output='.storage_path('app').'/public/imhrc/runs/'.$now.'/results/';
        if($request->has("criteriatsh"))
            $pythonCommand = $pythonCommand.' threshold='.$request->criteriatsh;
        var_dump($pythonCommand);
        Storage::append("softwares/imhrc/logs/".$dt->toDateString()."/".$dt->toTimeString()."-".$now.".txt", 'python system coommand started at: '.Carbon::now()->toDateTimeString());
        $pythonPid = system($pythonCommand.'& echo $! | tee -a pid.txt', $res);
//        $pidContent = file_get_contents('pid.txt');
//        $pidContent = str_replace($pythonPid, '', $pidContent);
//        file_put_contents('pid.txt', preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $pidContent));

        Storage::append("softwares/imhrc/logs/".$dt->toDateString()."/".$dt->toTimeString()."-".$now.".txt", 'python system coommand ended at: '.Carbon::now()->toDateTimeString());
//        sleep(1);
//        Storage::copyDirectory('softwares/imhrc/runs/'.$now.'/results', 'public/imhrc/runs/'.$now.'/results');
        File::copyDirectory('../storage/app/softwares/imhrc/runs/'.$now.'/outputs/RawResults', '../storage/app/public/imhrc/runs/'.$now.'/results');
//        File::deleteDirectory('../storage/app/softwares/imhrc/runs/'.$now);
        var_dump($res);
        $criteriasInput = explode(",", $request->criterias);
        foreach ($criteriasInput as $cri) {
            $t = explode("\n", Storage::get('public/imhrc/runs/' . $now . '/results/' . $cri . '_table.txt'));
            for ($i =0 ; $i<sizeof($t); $i++)
                $t[$i] = explode(",", $t[$i]);
//            var_dump("table", $t);
            $criterias[] = ["value" => $cri, "name" => $this->criterias[$cri], "table" => $t];
        }
        Storage::append("softwares/imhrc/logs/".$dt->toDateString()."/".$dt->toTimeString()."-".$now.".txt", 'proccess passed to view at: '.Carbon::now()->toDateTimeString());
        return view('softwares.imhrc.results', ['criterias' => $criterias, 'algorithmOutputs' => $algorithmOutputs ,'path' => 'storage/imhrc/runs/'.$now.'/results/', 'hasFilter' => $request->complexFilters? true: false, 'hasTsh' => $request->criteriatsh? true: false]);
//        return system();
//        return $res;
        return redirect('softwares/imhrc/results');

        dd($request->all());
    }

}

