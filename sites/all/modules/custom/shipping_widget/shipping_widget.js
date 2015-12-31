/**
 * Created by niluka_a on 12/10/2015.
 */
(function ($) {

    $('#edit-country').on('change', function() {
        $('#edit-fort').prop("disabled", true);
        $('#shipping-calculate').prop("disabled", true);
        $('.views-widget-edit-total-price').hide();
        $('#edit-fort').html('');

        var request_url = Drupal.settings.basePath + "/service/json/forts/country/" + this.value;
        $.ajax({
            type: "GET",
            url: request_url,
            dataType: "json",
            success: function (json) {
                var $option = '<option value="">-Select-</option>';
                $.each(json.nodes ,function(index, value){
                    $option += '<option value="'+value.node.nid+'" data-insurance="'+value.node.insurance_rate+'" data-inspection="'+value.node.inspection_rate+'">'+value.node.title+'</option>';
                });
                $('#edit-fort').append($option).prop("disabled", false);
            }
        });
    });

    $('#edit-fort').on('change', function() {
        insurance_rate  = $(this).find(':selected').data('insurance');
        inspection_rate = $(this).find(':selected').data('inspection');

        $('#shipping-calculate').prop("disabled", false);
    });

    $('#shipping-calculate').on('click', function() {
        insurance_rate_val = 0;
        inspection_rate_val = 0;

        if($('#insurance').is(':checked')){
            insurance_rate_val = insurance_rate;
        }
        if($('#inspection').is(':checked')){
            inspection_rate_val = inspection_rate;
        }
        _calculate(parseInt(retail_price), parseInt(insurance_rate_val), parseInt(inspection_rate_val));

        $('#shipping-inquiry').prop("disabled", false);
    });

    $('#shipping-inquiry').on('click', function() {
        $( "#customer-info .form-group").removeClass('has-error');
        var setError = false;
        if($( "#inputName" ).val() == ''){
            $( "#inputName").parents('.form-group').addClass('has-error');
            setError = true;
        }
        if($( "#inputTelephone" ).val() == ''){
            $( "#inputTelephone").parents('.form-group').addClass('has-error');
            setError = true;
        }
        if($( "#inputEmail" ).val() == ''){
            $( "#inputEmail").parents('.form-group').addClass('has-error');
            setError = true;
        }else{
            if(!_isThisEmail($( "#inputEmail" ).val())){
                $( "#inputEmail").parents('.form-group').addClass('has-error');
                setError = true;
            }
        }
        if(!setError){
            var form = $( "#fob-price" ).serialize();

            var request_url = Drupal.settings.basePath + "inquiry/fob/?&" + form;
            $.ajax({
                type: "GET",
                url: request_url,
                success: function (html) {
                    alert('Vehicle request has been successfully sent');
                    $('#fob-price')[0].reset();

                    location.reload();
                }
            });
        }
    });


    function _calculate(retail_price, insurance_rate_val, inspection_rate_val){

        if(insurance_rate_val){
            insurance_rate_val =  insurance_rate_val / 100;
        }
        if(inspection_rate_val){
            inspection_rate_val =  inspection_rate_val / 100;
        }

        retail_price_total = insurance_rate_val + inspection_rate_val + retail_price;

        $('#shipping-total-price').html('<strong>USD '+retail_price_total+'</strong>');
        $('#inputTotal').val(retail_price_total);
        $('.views-widget-edit-total-price').show();

        $(' #customer-info ').show();
    }

    function _isThisEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
})(jQuery);
