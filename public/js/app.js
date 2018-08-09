$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
// (function() {
//     'use strict';
//     window.addEventListener('load', function() {
//         // Fetch all the forms we want to apply custom Bootstrap validation styles to
//         var forms = document.getElementsByClassName('needs-validation');
//         // Loop over them and prevent submission
//         var validation = Array.prototype.filter.call(forms, function(form) {
//             form.addEventListener('submit', function(event) {
//                 if (form.checkValidity() === false) {
//                     event.preventDefault();
//                     event.stopPropagation();
//                 }
//                 form.classList.add('was-validated');
//             }, false);
//         });
//     }, false);
// })();
function showParams(checkBoxId, cssShowType) {
    var checkBox = document.getElementById(checkBoxId);
    // Get the output text
    var tr = document.getElementById(checkBoxId+"-params");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
        if(cssShowType == "flex")
            tr.style.display = "flex";
        else
            tr.style.display = "block";
    } else {
        tr.style.display = "none";
    }
}

function showDiv(showCheckBoxId, hideCheckBoxId) {
    var showCheckBox = document.getElementById(showCheckBoxId);
    var hideCheckBox = document.getElementById(hideCheckBoxId);
    // Get the output text
    var showDiv = document.getElementById(showCheckBoxId+"-params");
    var hideDiv = document.getElementById(hideCheckBoxId+"-params");

    showDiv.style.display = "block";
    hideDiv.style.display = "none";
}
function changeInputDisable(inputId, checkElementId) {
    var tr = document.getElementById(inputId);
    var checkElement = document.getElementById(checkElementId)
    if (checkElement.checked)
    {
        tr.disabled = false;
    }
    else
        tr.disabled = true;
}
function changeAlgorithmParametersDefaults() {
    var dataset = $("input[type='radio'][name='dataset']:checked")[0].value;
    var goldstandard = $("input[type='radio'][name='goldstandard']:checked")[0].value;

    var inputNames = {
        'AP': ['Preference(P)'],
        'CFinder': ['k-clique size(k)', 'Lower link weight threshold(w)', 'upper link weight threshold(W)', 'Maximum time of clique searching(t)'],
        // 'CMC': ['Overlap threshold(w)', 'Merge threshold(m)', 'Minimum degree ratio(c)', 'Minimum size of clusters(s)'],
        'MCL': ['Inflation(I)'],
        'RNSC': ['Shuffling diversification length(d)', 'Diversification frequency(D)', 'Number of experiments(e)', 'Naive stopping tolerance(n)', 'Scaled stopping tolerance(N)', 'Tabu length(t)', 'Tabu tolerance(T)'],
        'RRW': ['Restart probability(r)', 'Overlap threshold(overlap)', 'Early cutoff(lambda)'],
        'IMHRC': ['Minimum size of cluster(min-size)', 'Maximum size of cluster(max-size)', 'Hub retrieving threshold(black-list)(γ)', 'Hub removing threshold (black-list)(β)', 'Overlap threshold(max-overlap)', 'Growing penalty(growth-penalty)', 'Hub retrieving penalty(back-penalty)', 'Minimum Density(min-density)']
    };
    var defaults = {
        'mips_3_100': {
            'collins2007': [-0.9 , 3, 0.0, 1, 0.2, 4.9, 5, 50, 3 , 10, 5, 100, 1, 0.5, 0.2, 0.5, 3, 10000, 0.002, 0.005, 0.5, 1.2, 1.0, 0.5],
            'gavin2006_socioaffinities_rescaled': [-0.15 , 4, 0, 1, 0.2, 3.2, 9, 20, 3 , 20, 5, 100, 5, 0.6, 0.1, 0.6, 3, 10000, 0.005, 0.007, 0.8, 2.2, 1.4, 0.4],
            'krogan2006_core': [0.35 , 3, 0, 1, 0.2, 2.3, 9, 20, 3 , 10, 5, 10, 3, 0.5, 0.2, 0.6, 3, 10000, 0.005, 0.005, 0.85, 1.2, 3.0, 0.4],
            'krogan2006_extended': [0.4 , 3, 0, 1, 0.2, 2.3, 9, 20, 3 , 20, 1, 50, 1, 0.5, 0.2, 0.7, 3, 10000, 0.0, 0.001, 0.8, 2.4, 1.0, 0.6],
        },
        'sgd':{
            'collins2007': [0.4, 3, 0.0, 1, 0.2, 4.6, 9, 50, 3 , 50, 5, 100, 1, 0.5, 0.2, 0.5, 3, 10000, 0.036, 0.098, 0.59, 2.8, 1.0, 0.3],
            'gavin2006_socioaffinities_rescaled': [-0.6, 4, 0, 1, 0.2, 4.6, 9, 10, 3 , 20, 15, 100, 1, 0.6, 0.1, 0.6, 3, 10000, 0.018, 0.046, 0.8, 1.4, 2.0, 0.4],
            'krogan2006_core': [0.35, 3, 0, 1, 0.2, 4.6, 3, 20, 3 , 50, 5, 50, 1, 0.5, 0.2, 0.6, 3, 10000, 0.0, 0.001, 0.79, 1.5, 1.8, 0.5],
            'krogan2006_extended': [0.3, 4, 0, 1, 0.2, 4.6, 9, 50, 10 , 50, 1, 50, 1, 0.5, 0.2, 0.7, 3, 10000, 0.007, 0.012, 0.79, 1.6, 3.0, 0.6],
        }
    };
    var index = 0;
    jQuery.each(inputNames, function(algo, params) {
        jQuery.each(params, function(i, param) {
            $("input[type='number'][name='" + algo + "-" + param.replace(/ /g , "%20") + "']")[0].value = defaults[goldstandard][dataset][index];
            index++;
        });
    });
}

function imhrcResult() {
    var files;
    // var algorithmNames = ['AP', 'CFinder', 'CMC', 'MCL', 'ClusterONE', 'RNSC', 'RRW', 'IMHRC', 'custom'];
    var algorithmNames = ['AP', 'CFinder', 'MCL', 'ClusterONE', 'RNSC', 'RRW', 'IMHRC', 'custom'];
    var criteriasIds = ["criteria1", "criteria2", "criteria3", "criteria4", "criteria5"];
    var customFilesIds = ['customAlgorithm', 'customDataset', 'customGoldstandard'];
    formData = new FormData(),
    params   = $("#form").serializeArray(),
    $.each(customFilesIds, function(i, fileId) {
        var file = $("#" + fileId)[0];
        if(file.files.length != 0)
        formData.append(fileId, file.files[0]);
    });
    var algorithms = [], criterias = [];
    $.each(algorithmNames, function(i, algo) {
        if($("#algo-"+algo)[0].checked)
            algorithms.push(algo);
    });
    $.each(criteriasIds, function(i, cri) {
        if($("#"+ cri)[0].checked)
            criterias.push($("#"+ cri)[0].value);
    });
    formData.append("algorithms", algorithms);
    formData.append("criterias", criterias);
    $.each(params, function(i, val) {
        if(val.value)
            formData.append(val.name, val.value);
    });
    $.ajax({
        type:'POST',
        url:'/api/softwares/imhrc/result',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function()
        {
            $("#breadcrumb-div")[0].style.display = "none";
            $("#page-content")[0].innerHTML = "<center><img src='/images/gifs/loading.gif'></center>";
        },
        success:function(data){
            var elements =  $.parseHTML(data);
            var result = $('#result', elements);
            $("#page-content")[0].innerHTML = result.html();
        },
        ajaxSuccess: function(){
          console.log("ajaxSuccess");
        },
        error: function (e) {
        // <div class="alert alert-danger" role="alert"> This is a danger alert—check it out! </div>
            $("#page-content")[0].innerHTML = "<div class=\"alert alert-danger text-center\" role=\"alert\"> An error has been occurred! </div>";
            console.log(e.responseJSON.exception)
        }
    });
}

function dmnResult() {
    params   = $("#dmn").serializeArray();
    console.log(params);
    formData = new FormData();
    $.each(params, function(id, value) {
        formData.append(value["name"], value["value"]);
    });
    var file = $("#customAlgorithm")[0];
    if(file.files.length != 0)
        formData.append("customAlgorithm", file.files[0]);
    $.ajax({
        type:'POST',
        url:'/api/softwares/dmn/result',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function()
        {
            $("#page-content")[0].innerHTML = "<center><img src='/images/gifs/loading.gif'></center>";
        },
        success:function(data){
            var elements =  $.parseHTML(data);
            var result = $('#result', elements);
            $("#page-content")[0].innerHTML = result.html();
        },
        ajaxSuccess: function(){
            console.log("ajaxSuccess");
        },
        error: function (e) {
            $("#page-content")[0].innerHTML = "<div class=\"alert alert-danger text-center\" role=\"alert\"> An error has been occurred! </div>";
            console.log(e.responseJSON.exception)
        }
    });
}

$('.msf-form form fieldset:first-child').fadeIn('slow');

$('.msf-form form .btn-next-show').on('click', function() {
    $(".show-when-checked").fadeIn(400, function() {
        var nowActive = $('.js-example-basic-single[name="algorithm"]');
        nowActive.removeClass('active');
    });
});
$('.msf-form form .btn-next-hide').on('click', function() {
    $(".show-when-checked").fadeOut(400, function() {
        // $(this).fadeIn();
        var nowActive = $('.breadcrumbs-css li a.active');
        nowActive.removeClass('active');
        nowActive.parent().next().children(":first").addClass('active');

    });
});

$('.msf-form form .btn-next').on('click', function() {
    $(this).parents('fieldset').fadeOut(400, function() {
        $(this).next().fadeIn();
        var nowActive = $('.breadcrumbs-css li a.active');
        nowActive.removeClass('active');
        nowActive.parent().next().children(":first").addClass('active');

    });
});

$('.msf-form form .btn-previous').on('click', function() {
    $(this).parents('fieldset').fadeOut(400, function() {
        $(this).prev().fadeIn();
        var nowActive = $('.breadcrumbs-css li a.active');
        nowActive.removeClass('active');
        nowActive.parent().prev().children(":first").addClass('active');
    });
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    dropdownParent: $('show-when-checked')

});

// $(function() {
//     $('#search').on('keyup', function() {
//         var pattern = $(this).val();
//         $('.searchable-container .items').hide();
//         $('.searchable-container .items').filter(function() {
//             return $(this).text().match(new RegExp(pattern, 'i'));
//         }).show();
//     });
// });