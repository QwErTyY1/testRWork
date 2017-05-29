<div class="form-group field-demo-prod">
    <label class="control-label" for="language-list">
        language
    </label>
    <select id="language-list" class="form-control" name="language" >

        <option value="">Select ...</option>

        <?php foreach ($list['language_list'] as $language): ;?>
            <option value="<?php echo $language->language_id; ?>"><?php echo $language->language_name; ?></option>

        <?php endforeach; ?>
    </select>
    <div class="help-block"></div>
</div>
