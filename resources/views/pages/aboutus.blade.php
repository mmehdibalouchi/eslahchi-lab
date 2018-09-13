@extends('layouts.main', ['activePage' => "aboutus"])

@section('title', 'Page Title')

@section('content')
    <div class="shadow p-3 mb-5 bg-light rounded">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">Info</a>
                <a class="nav-item nav-link" id="nav-background-tab" data-toggle="tab" href="#nav-background" role="tab" aria-controls="nav-background" aria-selected="true">Academic Background</a>
                <a class="nav-item nav-link" id="nav-interests-tab" data-toggle="tab" href="#nav-interests" role="tab" aria-controls="nav-interests" aria-selected="true">Academic Interests</a>
                <a class="nav-item nav-link" id="nav-membership-tab" data-toggle="tab" href="#nav-membership" role="tab" aria-controls="nav-membership" aria-selected="true">Membership</a>
                <a class="nav-item nav-link" id="nav-honors-tab" data-toggle="tab" href="#nav-honors" role="tab" aria-controls="nav-honors" aria-selected="true">Honors</a>
                <a class="nav-item nav-link" id="nav-collaborations-tab" data-toggle="tab" href="#nav-collaborations" role="tab" aria-controls="nav-collaborations" aria-selected="true">Collaborations</a>
                <a class="nav-item nav-link" id="nav-cv-tab" data-toggle="tab" href="#nav-cv" role="tab" aria-controls="nav-cv" aria-selected="true">CV</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="info-tab">
                <br>
                <h5>Head of Laboratory</h5><hr>
                <div><img src="/images/about-us/eslahchi.jpg" class="img-thumbnail profile-pic " alt="Cinque Terre"></div>
                <p>Prof. Changiz Eslahchi</p>
                <p>Changiz Eslahchi is a professor in the department of computer sciences, school of mathematics, Shahid Beheshti University and a senior researcher at school of biological sciences, Institute for Research in Fundamental Sciences, Tehran, Iran. He is vice dean of the school of mathematics of Shahid Beheshti university now. He currently works mostly on algorithms in bioinformatics and their application to biomedicine. He has also done, especially in the earlier part of his career, some research in graph theory. Changiz has written about 70 research papers. Changiz was a member of the team of introducing bioinformatics in Iran. Changiz and his colleague’s effort led to create the first PhD program in bioinformatics in Iran. He received his MA in mathematics from Shiraz University and his PhD in 1998 from Sharif University of Technology Tehran, Iran.

                </p>
            </div>
            <div class="tab-pane fade" id="nav-interests" role="tabpanel" aria-labelledby="nav-interests-tab">
                <br><br>
                {{--<ul class="list-unstyled">--}}
                    <li>Finding cancer marker by graph-based analysis.</li><br>
                    <li>Finding modules and decomposing metabolic networks.</li><br>
                    <li>Protein complex prediction in PPI networks.</li><br>
                    <li>Drug-target interaction prediction problem.</li><br>
                    <li>Protein localization prediction problem.</li><br>
                    <li>Phylogenetic networks construction.</li><br>
                {{--</ul>--}}
            </div>
            <div class="tab-pane fade" id="nav-background" role="tabpanel" aria-labelledby="nav-background-tab">
                <br><br>
                {{--<ul>--}}
                <li>Ph.D. in Mathematics, Department of Mathematical Sciences,
                Sharif University of Technology, Tehran, Iran, 1998.
                Title of Thesis: Hall condition and list coloring of graphs.
                    Thesis advisor : Professor E. S. Mahmoodian.</li><br>
                <li>M.S. in Mathematics, Department of Mathematics, Shiraz University, Shiraz, Iran,
                    1990.</li><br>
                <li>B.S. in Mathematics, Department of Mathematics, Training Teachers University,
                    Tehran, Iran, 1987.</li><br>
                {{--</ul>--}}
            </div>
            <div class="tab-pane fade" id="nav-membership" role="tabpanel" aria-labelledby="nav-membership-tab">
                <br><br>
                {{--<ul>--}}
                    <li>Iranian Bioinformatics Society.</li><br>
                    <li>International Society for Computational Biology.</li><br>
                    <li>Iranian Mathematical Society.</li><br>
                {{--</ul>--}}
            </div>
            <div class="tab-pane fade" id="nav-honors" role="tabpanel" aria-labelledby="nav-honors-tab">
                <br><br>
                {{--<ul>--}}
                    <li>Second Prize Winner in Algebraic Competition for Undergraduate University Students in 1986. This Competition is held annually by the Iranian Mathematical Society, and the Participants are the Distinguished Students from the Universities throughout the Country.</li><br>
                    <li>Got the First place in the Nationwide Entrance Examination for the MS. degree, 1987.</li><br>
                    <li>Got the Top Second Place in the Entrance Examination for the Ph.D. degree of the Department of Mathematical Sciences of Sharif University of Technology, 1995.</li><br>
                {{--</ul>--}}
            </div>
            <div class="tab-pane fade" id="nav-collaborations" role="tabpanel" aria-labelledby="nav-collaborations-tab">
                <br><br>
                <dl>
                <dt>Limsoon Wong</dt>
                <dd>Professor in the School of Computing at the National University of Singapore (NUS).</dd>
                <dt>Wing-Kin Sung</dt>
                <dd>Professor, School of Computing, National University of Singapore</dd>
                <dt> Xiang Zhang</dt>
                <dd>Associate professor Shenzhen University</dd>
                </dl>
            </div>
            <div class="tab-pane fade" id="nav-cv" role="tabpanel" aria-labelledby="nav-cv-tab">
                <br><br>
                <li><a target="_blank" href="/files/cv/cv-dr-eslahchi-new.pdf">prof.Eslahchi cv</a></li>
            </div>
        </div>
    </div>
@endsection