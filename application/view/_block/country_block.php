<!--<div class="form-group field-cat-id">-->
    <label class="control-label" for="country-list">
        Country
    </label>
    <select id="country-list" class="form-control" name="country">

        <option value="">Select ...</option>
        <?php

        foreach ($list['list_countries'] as $country): ;?>


            <option value="<?=$country->country_id;?>"><?=$country->country_name ;?></option>

        <?php endforeach; ?>
    </select>
    <div class="help-block"></div>
<!--</div>-->
