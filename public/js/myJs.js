$(document).ready(function(){


    $("body").on("change","#country-list",function (e) {
        e.preventDefault();
        var myVal = $(this).val();

        $.ajax({
            type: "POST",
            url: url+"/home/getCity",
            data:'country_id='+myVal,
            success: function(data){
                $("#city_block").html(data);
            }
        });

    });

    $("body").on("change","#city-list",function (e) {
        e.preventDefault();
        var countryVal = $("#country-list").val();
        var mCityVal = $(this).val();

        $.ajax({
            type: "POST",
            url: url+"/home/getLanguage",
            data:{'city_id':mCityVal,
                'country_id':countryVal},
            success: function(data){
                $("#language_block").html(data);
            }
        });

    });





    ///////CountryAdd////////////////////////////////////////
    $("#myAddCountryBtn").click(function () {

        $("#modalMyAddCountry").modal("show", function (e) {

            e.preventDefault()
        });

    });

    $("body").on("click","#submitCountry", function (e) {

        e.preventDefault();

        var form = $("#addFormContent");

        var data = form.serialize();
        var serialData = data+"&action=country_add";

        $.post( url+"home/adding", serialData)
            .done(function( data ) {


                $("#selCountry").html(data.two);
                $("#tb_content").html(data.ones);

                $(".clrC").val("");

                $("#modalMyAddCountry").modal("hide");

            });

    });



    ///////////////CityAdd////////////////////////////////
    $("#myAddCityBtn").click(function () {

        $("#modalMyAddCity").modal("show", function (e) {
            e.preventDefault();

        });

    });

    $("#addFormCityContent").on( "submit", function(event ) {
        event.preventDefault();
        var data = $(this).serialize();


        var mD = $("#selCountry").val();
        var serialData = data+"&county_gid="+mD+"&action=city_add";

        $.post( url+"home/adding", serialData)
            .done(function( data ) {
                // $("#tb_content").html(data);
                // $("#modalMyAddCity").modal("hide");

                $("#selCountriesL").html(data.two);
                $("#tb_content").html(data.ones);
                $("#modalMyAddCity").modal("hide");

                $(".cityClr").val('');

            });

    });



    ///myAddLanguageBtn////////////////////////////////////////////
    $("#myAddLanguageBtn").click(function () {

        $("#modalMyAddLanguage").modal("show", function () {

        });

    });

    $("#addFormLanguageContent").on( "submit", function(event ) {
        event.preventDefault();
        var data = $(this).serialize();

        var mD = $("#selCountriesL").val();
        var cD = $("#selCities").val();
        var serialData = data+"&county_gid="+mD+"&city_gid="+cD+"&action=language_add";

        $.post( url+"home/adding", serialData)
            .done(function( data ) {

                $("#selCountry").html(data.two);
                $("#tb_content").html(data.ones);
                $("#modalMyAddLanguage").modal("hide");

                $(".lClr").val("");
            });
    });

    $("body").on("change","#selCountriesL",function (e) {
        e.preventDefault();
        var myVal = $(this).val();

        $.ajax({
            type: "POST",
            url: url+"/home/getCity",
            data:'country_id='+myVal,
            success: function(data){
                $("#selCities").html(data);
            }
        });

    });

    ///Delete
    $("body").on("click",".btn-delete",function (e) {
        e.preventDefault();
        var id = $(this).val();
        var attr = $(this).attr("data-del");
        // var dataSer = "&id="+id+"&attr="+attr;
        $.ajax({
            type: "POST",
            url: url+"home/delete",
            data:{
                "id":id,
                "attr":attr
            },
            success: function(data){

                $("#tb_content").html(data);
            },
            error: function () {
                alert("ERROR");
            }

        });


    });
    /////////Edit//////////////////////////////////////
    $("body").on("click","#myAllButton",function (e) {

        e.preventDefault();
        var idC = $(this).val();
        var allAttr = $(this).attr("data-button");


        $.post(url+"home/searchForm",{'idC':idC,'attr':allAttr}, function (html) {

            $("#sF").html(html);


        });

    });

    $("body").on("click","#testBat",function (e) {
        e.preventDefault();

        var form = $("#editForm");
        var data = form.serialize();

        $.ajax({
            type: "POST",
            url: url+"home/update",
            data: data,
            success: function (msg) {

                $("#tb_content").html(msg);
                $(".removeName").val('');


            },
            error: function () {

            }

        });


    });



});