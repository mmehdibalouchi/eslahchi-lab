$.backstretch("/images/banners/0.jpg");
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
function showParams(checkBoxId) {
    var checkBox = document.getElementById(checkBoxId);
    // Get the output text
    var tr = document.getElementById(checkBoxId+"-params");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
        tr.style.display = "flex";
    } else {
        tr.style.display = "none";
    }
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

function imhrcResult() {
    var files;
    var algorithmNames = ['AP', 'CFinder', 'CMC', 'MCL', 'MyClusterONE', 'RNSC', 'RRW', 'IMHRC', 'custom'];
    var criteriasIds = ["criteria1", "criteria2", "criteria3", "criteria4"];
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
            $(".container")[1].innerHTML = "loading...";
        },
        success:function(data){
            var elements =  $.parseHTML(data);
            var result = $('.jumbotron', elements);
            $(".container")[1].innerHTML = result.html();
        },
        ajaxSuccess: function(){
          console.log("ajaxSuccess");
        },
        error: function (e) {
            console.log(e.responseJSON.exception)
        }
    });
}

function dmnResult() {
    params   = $("#dmn").serializeArray();
    console.log(params);
        $.each(customFilesIds, function(i, fileId) {
            var file = $("#" + fileId)[0];
            if(file.files.length != 0)
                formData.append(fileId, file.files[0]);
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
            $(".container")[1].innerHTML = "loading...";
        },
        success:function(data){
            var elements =  $.parseHTML(data);
            var result = $('.jumbotron', elements);
            $(".container")[1].innerHTML = result.html();
        },
        ajaxSuccess: function(){
            console.log("ajaxSuccess");
        },
        error: function (e) {
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