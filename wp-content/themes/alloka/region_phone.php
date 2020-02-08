<div class="js-region-label alloka-region">
  <ul class="regions__menu regions__menu__bottom js-regions-menu fade">
      <?php foreach ($RegionData as $region => $region_data) { ?>
        <?php if ($region_data == '[GROUP]') { ?>
          <li class="region-group"><a class="region-list-link" href="javascript:void(0)"><?php echo $region ?></a></li>
        <?php } else { ?>
          <li>
            <a class="region-list-link js-region-change-link fade" href="javascript:void(0)" data-region="<?php echo $region ?>" data-region-city="<?php echo $region_data['city'] ?>">
              <?php echo $region_data['city'] ?>
              <!-- выведем элементы, чтобы заменились телефоны аллокой -->
              <span class="region-phone-hidden">
                <span class="js-phone-alloka phone_alloka_<?php echo $region_data['oid'] ?>"><?php echo $region_data['phone'] ?></span>
              </span>
            </a>
          </li>
        <?php } ?>
      <?php } ?>
  </ul>
  <div class="region-label">
    <span class="region-city-link js-region-city-link">
      &#x25BC;
      <span class="region-city js-region-city"><?php echo $RegionData[$visitor_region]['city'] ?></span>
    </span>
    <span class="phone region-phone js-region-phone">
      <span class="phone_alloka_<?php echo $RegionData[$visitor_region]['oid'] ?>"><?php echo $RegionData[$visitor_region]['phone'] ?></span>
    </span>
  </div>
</div>
