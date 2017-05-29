 <?php

 if(!empty($message['confirm'])){
      echo $message['confirm']; } ?>
     <?php foreach ($list['date'] as $item):  ;?>
      <tr class="success" id="sC">
          <td>
              <button class="btn-danger btn-delete" data-del="countryD" value="<?=$item->country_id; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
              <button class="btn btn-success myAllButton" id="myAllButton" data-button="country" value="<?=$item->country_id; ?>" id="myCountry"><?=$item->country_name; ?></button>
          </td>
          <td>
              <button class="btn-danger btn-delete" data-del="cityD" value="<?=$item->city_id; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
              <button class="btn btn-success myAllButton" id="myAllButton" data-button="city" value="<?=$item->city_id; ?>" id="myCity"><?=$item->city_name; ?></button>
          </td>
          <td>
              <button class="btn-danger btn-delete" data-del="languageD" value="<?=$item->language_id; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
              <button class="btn btn-success myAllButton" id="myAllButton" data-button="language" value="<?=$item->language_id; ?>" id="myLanguage"><?=$item->language_name; ?></button>
          </td>
      </tr>
     <?php endforeach; ?>




