@extends('layouts.main', ['activePage' => "events"])

@section('title', 'Page Title')

@section('content')
        <div class="shadow p-3 mb-5 rounded bg-light">
            <section class="gallery-block cards-gallery">
                <div class="container">
                    <div class="heading">
                        <h2>Events</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 transform-on-hover">
                                <a class="lightbox" href="/images/events/w6.jpg">
                                    <img src="/images/events/w6.jpg" alt="Card Image" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <h6><a href="#">Bioinformatics in R</a></h6>
                                    <p class="text-muted card-text">By e.mirzaei|February 25th, 2017|Categories: Bioinformatics|Tags: Big data, Bioinformatics, Bioinformatics Data, Bioinformatics lab, biological pathways, data analysis, Data Mining, Eslahchi, Eslahchi Lab, Lab, R, R in bioinformatics, Statistical Computing, workshop, کارگاه آموزشی, کارگاه بیوانفورماتیک</p>
                                    <hr>
                                    <p>R is a free software environment for statistical computing and graphics. It is available on a wide variety of UNIX platforms, Windows and MacOS. The R [...]</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 transform-on-hover">
                                <a class="lightbox" href="/images/events/w1.jpg">
                                    <img src="/images/events/w1.jpg" alt="Card Image" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <h6><a href="#">Gene Expression Analysis</a></h6>
                                    <p class="text-muted card-text">Gene Expression Analysis
                                        By e.mirzaei|December 20th, 2016|Categories: Bioinformatics, Computational Biology, Workshops, دسته‌بندی نشده|Tags: Bioinformatics, Gene, Gene expression, Genetics, Rna, بیان ژن, بیوانفورماتیک, ژن, ژنتیک
                                    </p>
                                    <hr>
                                    <p>Gene expression is the process by which information from a gene is used in the synthesis of a functional gene product. These products are proteins or [...]</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 transform-on-hover">
                                <a class="lightbox" href="/images/events/w2.jpg">
                                    <img src="/images/events/w2.jpg" alt="Card Image" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <h6><a href="#">Molecular Docking</a></h6>
                                    <p class="text-muted card-text">By e.mirzaei|October 21st, 2016|Categories: Bioinformatics, Computational Biology, Docking, Workshops|Tags: Bioinformatics, Computational Biology, Molecular dockung</p>
                                    <hr>
                                    <p>Protein interaction with different ligands including drugs, substrates and different inhibitors is of considerable importance in biology, medicine and pharmacy. Among the various approaches, Docking has [...]</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 transform-on-hover">
                                <a class="lightbox" href="/images/events/w5.jpg">
                                    <img src="/images/events/w5.jpg" alt="Card Image" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <h6><a href="#">Phylogenetics(تاریخ جدید)</a></h6>
                                    <p class="text-muted card-text">By e.mirzaei|July 26th, 2016|Categories: Bioinformatics, Computational Biology, Evolution, Phylogenetics, Workshops</p>
                                    <hr>
                                    <p>A phylogeny portrays the genealogical relationships of species and groups of species in a tree-like diagram. phylogeny can never be observed, and thus has to be inferred [...]</p>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 transform-on-hover">
                                <a class="lightbox" href="/images/events/w4.jpg">
                                    <img src="/images/events/w4.jpg" alt="Card Image" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <h6><a href="#">Sequence Analysis</a></h6>
                                    <p class="text-muted card-text">By e.mirzaei|June 7th, 2016|Categories: Bioinformatics, Computational Biology, Workshops</p>
                                    <hr>
                                    <p>Bioinformatics (Computational Biology) is an interdisciplinary research field at the intersection of biology, mathematics, statistics and computer science. It seeks to create, advance and apply computational solutions [...]</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 transform-on-hover">
                                <a class="lightbox" href="/images/events/w3.jpg">
                                    <img src="/images/events/w3.jpg" alt="Card Image" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <h6><a href="#">What is Bioinformatics?</a></h6>
                                    <p class="text-muted card-text">By e.mirzaei|April 3rd, 2016|Categories: Bioinformatics, Computational Biology, Workshops</p>
                                    <hr>
                                    <p>Bioinformatics (Computational Biology) is an interdisciplinary research field at the intersection of biology, mathematics, statistics and computer science. It seeks to create, advance and apply computational [...]</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection