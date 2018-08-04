@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
        <div class="shadow p-3 mb-5 rounded bg-light">
            <h2>IMHRC</h2>
            <p></p><p></p><p></p>
            <p>IMHRC (Inter-Module Hub Removal Clustering) is a graph clustering algorithm that is developed based on inter-module hub removal in the weighted graphs which can detect overlapped clusters. Due to these properties, it is especially useful for detecting protein complexes in protein-protein interaction (PPI) networks with associated confidence values. IMHRC by removing some of the inter-module hubs and module hubs, eliminates a meaningful percentage of noise in the dataset and indirectly consider difference occurrence time of the PPI in the network.  After removing hubs, some proteins are considered as seeds. Each seed creates a primary cluster. Then removed module hubs are added to the resulting clusters based on the amount of their interactions with other proteins in the clusters. Clusters are then merged based on their overlaps.</p>
            <p>IMHRC is available as a standalone command-line application.</p>
            <br>
            <h2>Overview</h2>
            <p>Detecting known and predicting undiscovered protein complexes from protein-protein interaction (PPI) networks helps us to understand principles of cellular organization and their functions. However, the discovery of protein complexes based on experiment still needs to be explored. In this regard, computational methods are a useful approach to overcome the experimental limitations. Nevertheless, extraction of protein complexes from PPI network isn’t an easy task. Two major constrains are high noise level and ignoring occurrence time of different interactions in PPI network. Consequently, the performance of the IMHRC is evaluated on several benchmark datasets and the results are compared with other state-of-the-art models. The protein complexes that discovered by IMHRC method significantly match with the real data and much better than other methods.</p>
            <p></p><p></p><p></p>
            <p>Our algorithm provides an accurate and scalable method to detect and predict protein complexes from PPI networks. In our assessment four experimental yeast PPI datasets have been used which include Gavin (Gavin, et al., 2006), Collins (Collins, et al., 2007), Krogan Core and Krogan Extended (Krogan, et al., 2006). All these dataset were weighted. For evaluating the result of the methods, two gold standards were used as benchmarks, the MIPS catalog of protein complexes and the Gene Ontology based protein complex annotations from SGD. To assess the robustness of IMHRC against other complex detection algorithms, we selected seven of the best algorithms in this topic. These algorithms include: AP (Frey and Dueck, 2007), CFinder (Palla, et al., 2005), CMC (Liu, et al., 2009), MCL (Pereira‐Leal, et al., 2004), ClusterONE (Nepusz, et al., 2012), Core of RNSC (King, et al., 2004) and RRW (Macropol, et al., 2009).</p>
            <br>
            <div class="text-center">
                <a href="/softwares/cdap/start"><button type="button" class="btn btn-success">START</button></a>
            </div>
        </div>
@endsection