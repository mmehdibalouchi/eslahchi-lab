@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="jumbotron">
            <h2>Decomposition of metabolic networks</h2>
            <p></p><p></p><p></p>
            <h4>Overview</h4>
            <p>Metabolic networks can model the behavior of the metabolism in cell. Since total metabolic network analysis for one species is not easy, network modulation is an important issue that has been investigated. An appropriate decomposition of metabolic network is a strategy to obtain better insight into the metabolic functions. Additionally, decomposing these networks facilitate the way to use computational methods that are otherwise very slow when run on the original genome-scale network.
                Here we introduce a new online package for decomposition of metabolic networks based on 10 implemented methods and compute 12 criteria on partitioned metabolic networks. Based on above criteria, methods can be compared with others.
                In this package the modules obtained by implemented methods are visualized through the
                “gephi” software.</p>
                <b>The list of methods for decomposition of metabolic networks is as follows:</b>
                <a target="_blank" href="https://www.nature.com/articles/srep24115"><li>Ding</li></a>
                <a target="_blank" href="https://www.ncbi.nlm.nih.gov/pubmed/26614652"> <li>Muller2 </li></a>
                <a target="_blank" href="https://www.ncbi.nlm.nih.gov/pubmed/11847093"> <li>Schuster </li></a>
                <a target="_blank" href="https://arxiv.org/abs/cond-mat/0206292"> <li>Holm </li></a>
                <a target="_blank" href="https://www.nature.com/articles/nature03288"> <li>Guimera </li></a>
                <a target="_blank" href="http://www.pnas.org/content/103/23/8577"> <li>Newman </li></a>
                <a target="_blank" href="https://www.ncbi.nlm.nih.gov/pubmed/17949756"> <li>Poolman </li></a>
                <a target="_blank" href="http://journals.plos.org/ploscompbiol/article?id=10.1371/journal.pcbi.1002262"><li>Sridharan</li></a>
                <a target="_blank" href="https://www.ncbi.nlm.nih.gov/pubmed/24141488"> <li>Muller </li></a>
                <a target="_blank" href="https://bmcsystbiol.biomedcentral.com/articles/10.1186/1752-0509-5-25"><li>Verwoerd</li></a>

                <b>And the list of criteria for evaluate methods is as follow:</b>
                <li>cohesion_coupling</li>
                <li>efficacy</li>
                <li>go_distance_bp_F</li>
                <li>go_distance_bp_G</li>
                <li>go_distance_cc_F</li>
                <li>go_distance_cc_G</li>
                <li>go_distance_mf_F</li>
                <li>go_distance_mf_G</li>
                <li>modularity</li>
                <li>module_count</li>
                <li>coexpression_of_enzymes</li>
                <li><a target="_blank" href="https://www.ncbi.nlm.nih.gov/pubmed/29187029">chebi_distance</a></li>

                <b>The link for download of “gephi” software is:</b>
                <a target="_blank" href="https://gephi.org/users/download/">https://gephi.org/users/download/</a>

            </p>
            <div class="text-center">
                <a href="/softwares/dmn/start"><button type="button" class="btn btn-success">START</button></a>
            </div>
        </div>
    </div>
    </div>
@endsection