<?php
global $base_url;

if(arg(0) == 'node' && arg(1)){
    $node      = node_load(arg(1));
    $countries = $variables['countries'];
    ?>

    <script>
        retail_price = "<?=$node->field_retail_price['und'][0]['value']?>";
    </script>

    <div id="block-shipping-widget-shipping-widget">
        <div class="shipping-widget-wrapper">

            <h4>FOB PRICE (VEHICLE PRICE)</h4>
            <form action="" id="fob-price">
                <div id="edit-country-wrapper" class="views-exposed-widget shipping-select-box views-widget-edit-country col-xs-12 col-md-12">
                    <label for="edit-country">Countries</label>
                    <div class="views-widget">
                        <div class="form-item form-item-country form-type-select form-group">
                            <select class="form-control form-select" id="edit-country" name="country">
                                <option value="All" selected="selected">- Any -</option>
                                <?php foreach ($countries as $key => $country) { ?>
                                    <option value="<?=$country->tid;?>"><?=$country->name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="edit-fort-wrapper" class="views-exposed-widget shipping-select-box  views-widget-edit-fort col-xs-12 col-md-12">
                    <label for="edit-country">Forts</label>
                    <div class="views-widget">
                        <div class="form-item form-item-fort form-type-select form-group">
                            <select class="form-control form-select" id="edit-fort" name="fort" disabled>
                                <option value="All" selected="selected">- Any -</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="edit-fort-wrapper" class="views-exposed-widget views-widget-edit-insurance-inspection col-xs-12 col-md-12">
                    <div class="checkbox"> <label> <input type="checkbox" id="insurance" name="insurance"> Need insurance </label> </div>
                    <div class="checkbox"> <label> <input type="checkbox" id="inspection" name="inspection"> Need inspection </label> </div>
                </div>

                <div id="edit-fort-wrapper" class="views-exposed-widget views-widget-edit-total-price col-xs-12 col-md-12" style="display: none">
                    <input type="hidden" class="form-control" id="inputPrice" name="inputPrice" value="<?=$node->field_retail_price['und'][0]['value']?>">
                    <input type="hidden" class="form-control" id="inputTotal" name="inputTotal">
                    <div class="" role="alert" id="shipping-total-price">

                    </div>
                </div>

                <div class="shipping-form-calculate-btn">
                    <button type="button" class="btn btn-success" id="shipping-calculate" disabled>Calculate</button>
                </div>

                <div class="shipping-customer-message">
                    <p>100% GUARANTEED PRICE NEGOTIABLE</p>
                </div>

                <div id="customer-info" class="clearfix">
                    <div id="edit-name-wrapper" class="views-exposed-widget form-group col-xs-12 col-md-12">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                    </div>
                    <div id="edit-email-wrapper" class="views-exposed-widget form-group col-xs-12 col-md-12">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                    </div>
                    <div id="edit-name-wrapper" class="views-exposed-widget form-group col-xs-12 col-md-12">
                        <label for="inputTelephone">Telephone</label>
                        <input type="text" class="form-control" id="inputTelephone" name="inputTelephone" placeholder="Telephone">
                    </div>
                    <div id="edit-name-wrapper" class="views-exposed-widget form-group col-xs-12 col-md-12">
                        <label for="">Info</label>
                        <textarea class="form-control" name="info" rows="3"></textarea>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <div class="shipping-form-calculate-btn shipping-inquiry">
                    <button type="button" class="btn btn-warning" id="shipping-inquiry" disabled>Send inquiry</button>
                </div>

            </form>

        </div>
    </div>
<?php } ?>