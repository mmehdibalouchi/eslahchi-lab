@extends('layouts.main', ['activePage' => "softwares"])

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
        <div class="shadow p-3 mb-5 rounded bg-light">
            {{--<h4>Softwares</h4><hr>--}}
            {{--<p></p><p></p><p></p>--}}
            {{--<a href="/softwares/cdap"> <li>Complex Detection Analyzer Package (cdap)</li></a><hr>--}}
            {{--<a href="/softwares/cdap"> <li>IMHRC</li></a><hr>--}}
            {{--<a href="/softwares/dmn"> <li>Decomposition of metabolic networks</li></a>--}}
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Softwares</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="/softwares/cdap">CDAP: A Complex Detection Analyzer Package</a></td>
                </tr>
                <tr><td>Complex Detection Analyzer Package (CADP) helps you to execute protein complex detection methods and compare their results in a quick and compact ways</td></tr>
                <tr>
                    <td><a href="/softwares/dmn">DMNP: A Decomposition Of Metabolic Networks Package</a></td>
                </tr>
                <tr><td>Metabolic networks can model the behavior of the metabolism in cell</td></tr>
                <tr>
                    <td><a href="/softwares/pmlpr ">PMLPR </a></td>
                </tr>
                <tr><td>PMLPR (Protein Multi-Location Prediction based on Recommendation system) is a method to predict multiple locations for proteins. PMLPR predicts locations for each protein based on a well-known recommendation method called NBI, and the STRING protein-protein interaction database. For each protein, PMLPR propose a reliability score (the best score is equal to 1).</td></tr>
                <tr>
                    <td><a href="/softwares/OrthoGNC">OrthoGNC</a></td>
                </tr>
                <tr><td>OrthoGNC (Accurate Identification of Orthologs based on Gene Neighborhood Conservation) is a software for predicting accurate pairwise orthology relations based on gene neighborhood conservation.</td></tr>
                <tr>
                    <td><a href="/softwares/imhrc">IMHRC</a></td>
                </tr>
                <tr><td>IMHRC (Inter-Module Hub Removal Clustering) is a graph clustering algorithm that is developed based on inter-module hub removal in the weighted graphs which can detect overlapped clusters. Due to these properties, it is especially useful for detecting protein complexes in protein-protein interaction (PPI) networks with associated confidence values.</td></tr>
                <tr>
                    <td><a href="/softwares/prodomas">ProDomAs ( Protein Domain Assignment Server )</a></td>
                </tr>
                <tr><td>The ProDomAs web server implements an automatic algorithm for protein domain assignment.</td></tr>
                <tr>
                    <td><a href="/softwares/ssp">SSP</a></td>
                </tr>
                <tr><td>A de novo transcriptome assembler that assembles RNA-seq reads into transcripts. SSP aims to reconstructs all the alternatively spliced isoforms and estimates the expression level of them using interval integer linear programming .</td></tr>
                <tr>
                    <td><a href="/softwares/stone">STON          (STructure comparisON)</a></td>
                </tr>
                <tr><td>Protein structure comparison is an important problem in bioinformatics and has many applications in study of structural and functional genomics. Most of the protein structure comparison methods give the alignment based on minimum rmsd and ignore many significant local alignments that may be important for evolutionary or functionally studies.

                        we have developed a new algorithm to find aligned residues in two proteins with desired rmsd value. The parameterized distance and rotation in this program enable us to search for strongly or weakly similar aligned fragments in two proteins.</td></tr>
                <tr>
                    <td><a href="/softwares/fassign">FAssign       (Fuzzy Assignment)</a></td>
                </tr>
                <tr><td>A new algorithm for the protein secondary structure assignment, using fuzzy logic based on backbone angles.</td></tr>
                <tr>
                    <td><a href="/softwares/surfield ">Surfield </a></td>
                </tr>
                <tr><td>A knowledge-based potential of mean-force using pairwise residue contact area</td></tr>
                <tr>
                    <td><a href="/softwares/paperhap">PaperHap    (Partially Perfect Haplotype Block Partitioning)</a></td>
                </tr>
                <tr><td>This algorithm identifies haplotype block partitions, useing a set of three parameters.</td></tr>
                <tr>
                    <td><a href="/softwares/asila ">ASILA </a></td>
                </tr>
                <tr><td>ASILA is written in g++ (MinGW-3.1). It gets M ( number of different haplotypes ) and N ( Number of SNP ) as an input and

                        generate all perfect phylogeny matrices with M different rows and N columns. As the number of these matrices is exponential,

                        run time of this program is exponential.</td></tr>
                <tr>
                    <td><a href="/softwares/libra ">LIBRA </a></td>
                </tr>
                <tr><td>This software is for detecting similar patterns called Motif on DNA sequences</td></tr>
                <tr>
                    <td><a href="/softwares/mcnet ">MC.Net  </a></td>
                </tr>
                <tr><td>Phylogenetic networks are a generalization of phylogenetic trees that allow the representation of conflicting signals or alternative evolutionary histories in a single diagram. There are several methods for constructing these networks. MC-Net is A method for the construction of phylogenetic networks based on Monte-Carlo method. MC-Net finds a circular ordering for taxa, based on Monte-Carlo with simulated annealing, it then extracts splits from the circular ordering and uses non-negative least squares for weighting splits. One can use SplitsTree program to draw phylogenetic networks from weighted splits.</td></tr>
                <tr>
                    <td><a href="/softwares/mcqnet ">MCQ.Net </a></td>
                </tr>
                <tr><td>MCQ-Net is a heuristic algorithm based on the simulated annealing as a method for constructing phylogenetic networks from weighted quartets.</td></tr>
                <tr>
                    <td><a href="/softwares/rapper ">RaPPer </a></td>
                </tr>
                <tr><td>This program will generate random perfect phylogeny matrix with following conditions.
                        The results will be send to your email.</td></tr>
                <tr>
                    <td><a href="/softwares/tripnet ">TripNet </a></td>
                </tr>
                <tr><td>TripNet is an algorithm for constructing phylogenetic networks from sparse sets of rooted triplets.</td></tr>
                <tr>
                    <td><a href="/softwares/snsa ">SNSA </a></td>
                </tr>
                <tr><td>Different partial phylogenetic trees can be derived from different evidences and different methods. One important problem is to summarize these partial phylogenetic trees using a supernetwork. SNSA (SuperNetwork-Simulated Annealing) is a method to construct a supernetwork from partial trees based on simulated annealing.</td></tr>
                <tr>
                    <td><a href="/softwares/ipcacmi ">IPCA-CMI </a></td>
                </tr>
                <tr><td>PCA-CMI algorithm is written in Matlab. It gets simulated data and real data as inputs. This algorithm applied for learning the skeleton of BN.</td></tr>
                <tr>
                    <td><a href="/softwares/cn ">CN </a></td>
                </tr>
                <tr><td>In order to quantitatively evaluate the performance of the CN algorithm, we use simulated dataset which generated from Dream3 (Dialogue for Reverse Engineering Assessments and Methods) size of 10, 50 and 100 and real dataset (SOS DNA repair network with experiment data set in Escherichia coli).</td></tr>

                </tbody>
            </table>
        </div>
@endsection