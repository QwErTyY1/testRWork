<div class="modal-dialog"  role="document">

    <div class="modal-content">

        <div class="modal-body">

            <div style="border-radius:5px;background-color:#f2f2f2;padding:40px;">
                <form action="<?=URL;?>home/adding" method="post" id="addFormCityContent">
                    <div class="form-group">
                        <label for="sel1">Be sure to select a country</label>
                        <select class="form-control" id="selCountry">
                            <option value="">Select ...</option>
                            <?php foreach ($list['list_countries'] as $country): ;?>

                                <option value="<?=$country->country_id;?>"><?=$country->country_name ;?></option>

                            <?php endforeach; ?>
                        </select>
                        <br>
                    </div>

                    <label for="fname">Add a new city</label>
                    <input type="text" id="name" class="cityClr" name="CityName" placeholder="Your city..">
                    <button type="submit" class="btn btn-success">Add</button>
                </form>

                <button type="button" name="addContent" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>