<div class="form-group field-subcat-id">
    <label class="control-label" for="city-list">
        City
    </label>
    <select id="city-list" class="form-control" name="city" >


        <option value="">Select ...</option>


        <?php foreach ($list['city_list'] as $city): ;?>


            <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>

        <?php endforeach; ?>

    </select>
    <div class="help-block"></div>
</div>


