@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="shadow p-3 mb-5 rounded bg-light">
            <h2>IMHRC</h2>
            <p></p><p></p><p></p>
            <h4>Dscription</h4>
            <p>
                IMHRC (Inter-Module Hub Removal Clustering) is a graph clustering algorithm that is developed based on inter-module hub removal in the weighted graphs which can detect overlapped clusters. Due to these properties, it is especially useful for detecting protein complexes in protein-protein interaction (PPI) networks with associated confidence values. IMHRC by removing some of the inter-module hubs and module hubs, eliminates a meaningful percentage of noise in the dataset and indirectly consider difference occurrence time of the PPI in the network.  After removing hubs, some proteins are considered as seeds. Each seed creates a primary cluster. Then removed module hubs are added to the resulting clusters based on the amount of their interactions with other proteins in the clusters. Clusters are then merged based on their overlaps.

                IMHRC is available as a standalone command-line application.
            </p>
            <h2>Overview</h2>
            <p>
                Our algorithm provides an accurate and scalable method to detect and
                predict protein complexes from PPI networks. In our assessment four
                experimental yeast PPI datasets have been used which include Gavin (Gavin,
                et al., 2006), Collins (Collins, et al., 2007), Krogan Core and Krogan
                Extended (Krogan, et al., 2006). All these dataset were weighted. For
                evaluating the <span style="mso-no-proof:yes">result</span> of the
                methods, two gold standards were used as benchmarks,</span>
                <span style="font-size:10.5pt;font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;;
mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;;
color:black">the MIPS catalog of protein complexes and the Gene Ontology based
	  protein complex annotations from SGD. </span>To assess the robustness of
                IMHRC against other complex detection algorithms, we selected seven of the
                best algorithms in this topic. These algorithms include:
                <a href="http://www.psi.toronto.edu/index.php?q=affinity%20propagation">AP
                </a>(Frey and Dueck, 2007), <a href="http://cfinder.org/">CFinder </a>
                (Palla, et al., 2005), CMC (Liu, et al., 2009),
                <a href="http://www.micans.org/mcl/">MCL </a>(Pereira‐Leal, et al., 2004),
                <a href="http://www.paccanarolab.org/clusterone/">ClusterONE </a>(Nepusz,
                et al., 2012), <a href="http://www.cs.toronto.edu/~juris/data/rnsc/">Core
                    of RNSC</a> (King, et al., 2004) and
                <a href="http://www.cs.ucsb.edu/~kpm/software.html">RRW </a>(Macropol, et
                al., 2009).
            </p>
            <strong>Datasets and results:</strong>
            <p><a href="http://bs.ipm.ac.ir/softwares/IMHRC/datasets.rar">Datasets</a></p>
            <p><a href="http://bs.ipm.ac.ir/softwares/IMHRC/gold_standard.rar">Gold standards</a></p>
            <strong>Algorithm for download:</strong>
            <p><a href="http://bs.ipm.ac.ir/softwares/IMHRC/IMHRC-V1.jar">IMHRC V1</a></p>
            <div class="text-center">
                <a href="http://facultymembers.sbu.ac.ir/eslahchi/Download/PMLPR(Protein-Localization).rar"><button type="button" class="btn btn-primary">Download</button></a>
            </div>
            <p>The following is the options used to control IMHRC:</p>
            <code>
                <p> --back-penalty      set the node back penalty value</p>
                <p>--black-list        specifies the black list exprestion</p>
                <p>-d,--min-density       specifies the minimum density of clusters</p>
                        (default: auto)</p>
                <p>--debug                  turns on the debug mode</p>

                            --growth-penalty    set the node growth penalty value

                <p>-h,--help                   shows this help message

                                --max-overlap       specifies the maximum allowed overlap between

                    two clusters</p>

                <p>-s,--min-size               specifies the minimum size of clusters

                    -smax,--max-size       specifies the maximum size of clusters</p>

                <p>-v,--version                shows the version number</p>
            </code>
            <p>Example: </p>
            <p>C:\ >java -jar IMHRC-V1.jar collins2007.txt -min-size 3 -max-size 10000 -black-list (0.008,0.012) -max-overlap 0.53 -growth-penalty 2.1 -back-penalty 2 -min-density 0.3</p>
            <p>You should see the following output:</p>
            <code>
                <p>Loaded graph with 1622 nodes and 9074 edges</p>

                <p>[====================] 100% Growing clusters from seeds...</p>

                <p>[====================] 100% Supplementary Growing clusters ...</p>

                <p>[====================] 100% Supplementary Growing clusters ...</p>

                <p>[====================] 100% Finding highly overlapping clusters...</p>

                <p>[====================] 100% Merging highly overlapping clusters...</p>

                <p>New graph with 1622 nodes and 6306 edges has processed</p>

                <p>Detected 188 complexes</p>
            </code>
        </div>
    </div>
    </div>
@endsection