<div id="sF" class="form-group">
    <?php require APP.'view/_block/modal_content_block.php'?>
</div>
<form id="w5" class="form-vertical" action="" method="post" role="form">

<!--    <input type="hidden" id="hidden-1" name="hidden-1" value="input-val-1">-->
<!--    <input type="hidden" id="hidden-2" name="hidden-2" value="input-val-2">-->

    <div class="row">
        <div class="col-sm-4" id="country-block">
            <?php require_once APP.'/view/_block/country_block.php'?>

        </div>
        <div class="col-sm-4" id="city_block">
           <?php require_once APP.'/view/_block/city_block.php'; ?>
        </div>
        <div class="col-sm-4" id="language_block">
            <?php require_once APP.'/view/_block/language_block.php'; ?>


        </div>

    </div>

</form>

<!--Modal add-->

<!--Modal add country-->
<button class="btn btn-danger" id="myAddCountryBtn">
    country<br /><span class="glyphicon glyphicon-plus"></span>
</button>


<div class="modal fade" id="modalMyAddCountry">
    <div class="modal-dialog"  >

        <div class="modal-content">

            <div class="modal-body">

                <div style="border-radius:5px;background-color:#f2f2f2;padding:40px;">
                    <form action="<?=URL;?>home/adding" method="post" id="addFormContent">
                        <label for="fname">Add a new country</label>
                        <input type="text" id="name" class="clrC" name="CountryName" placeholder="Your country..">
                        <button type="submit" id="submitCountry" class="btn btn-success">Add</button>
                    </form>

                    <button type="button" name="addContent" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>


            </div>

        </div>
    </div>
</div>
<!--Modal add city-->
<button class="btn-info alert" id="myAddCityBtn">
    city<br /><span class="glyphicon glyphicon-plus"></span>
</button>

<div class="modal fade" id="modalMyAddCity">
        <?php require APP."/view/_block/modalMyAddCity_block.php"; ?>
</div>
<!--Modal add language-->
<button class="btn-info btn-warning" id="myAddLanguageBtn">
    language<br /><span class="glyphicon glyphicon-plus"></span>
</button>

<div class="modal fade" id="modalMyAddLanguage">
    <div class="modal-dialog"  role="document">


        <div class="modal-content">

            <div class="modal-body">

                <div style="border-radius:5px;background-color:#f2f2f2;padding:40px;">
                    <form action="<?=URL;?>home/adding" method="post" id="addFormLanguageContent">
                        <div class="form-group">
                            <label for="sel1">Be sure to select a country</label>
                            <select class="form-control" id="selCountriesL">
                                <option value="">Select ...</option>
                                <?php foreach ($list['list_countries'] as $country): ;?>

                                    <option value="<?=$country->country_id;?>"><?=$country->country_name ;?></option>

                                <?php endforeach; ?>
                            </select>
                            <br>

                            <label for="sel1">Be sure to select a city</label>
                            <select class="form-control" id="selCities">
                                <option value="">Select ...</option>
                            </select>
                            <br>


                        </div>

                        <label for="fname">Add a new languages</label>
                        <input type="text" id="name" class="lClr" name="LangName" placeholder="Your languages..">
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>

                    <button type="button" name="addContent" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
</div>

