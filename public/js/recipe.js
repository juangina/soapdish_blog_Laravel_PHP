$(document).ready(() => {

    function update_weights() {
        var coconut_oil_percentage = parseFloat($('#coconut_oil_percentage').val());
        if(!coconut_oil_percentage) {coconut_oil_percentage = 0};
        //console.log(coconut_oil_percentage);
        
        var palm_oil_percentage = parseFloat($('#palm_oil_percentage').val());
        if(!palm_oil_percentage) {palm_oil_percentage = 0};
        //console.log(palm_oil_percentage);

        var olive_oil_percentage = parseFloat($('#olive_oil_percentage').val());
        if(!olive_oil_percentage) {olive_oil_percentage = 0};
        //console.log(olive_oil_percentage);
        
        var castor_oil_percentage = parseFloat($('#castor_oil_percentage').val());
        if(!castor_oil_percentage) {castor_oil_percentage = 0};
        //console.log(castor_oil_percentage);
        
        var sum_total_percentage = coconut_oil_percentage + palm_oil_percentage + olive_oil_percentage +  castor_oil_percentage;
        //console.log(sum_total_percentage);

        $("#sum_total_percentage").val(sum_total_percentage);

        if(sum_total_percentage == 100) {

            var bars_form = 0;
            var acid_weight = 0;
            var base_weight = 0;
            var discount = 0;

            //console.log($('#bars_form').val());
            bars_form = parseFloat($('#bars_form').val());
            //console.log(bars_form);

            var coconut_oil_weight = parseFloat((bars_form * (coconut_oil_percentage / 100) * 96.48).toFixed( 2 ));
            //console.log(coconut_oil_weight);

            var palm_oil_weight = parseFloat((bars_form * (palm_oil_percentage / 100) * 96.48).toFixed( 2 ));
            //console.log(palm_oil_weight);

            var olive_oil_weight = parseFloat((bars_form * (olive_oil_percentage / 100) * 96.48).toFixed( 2 ));
            //console.log(olive_oil_weight);

            var castor_oil_weight = parseFloat((bars_form * (castor_oil_percentage / 100) * 96.48).toFixed( 2 ));
            //console.log(castor_oil_weight);

            $('#coconut_oil_weight').val((bars_form * (coconut_oil_percentage / 100) * 96.48).toFixed( 2 ));
            $('#palm_oil_weight').val((bars_form * (palm_oil_percentage / 100) * 96.48).toFixed( 2 ));
            $('#olive_oil_weight').val((bars_form * (olive_oil_percentage / 100) * 96.48).toFixed( 2 ));
            $('#castor_oil_weight').val((bars_form * (castor_oil_percentage / 100) * 96.48).toFixed( 2 ));

            var sum_total_weight = coconut_oil_weight + palm_oil_weight + olive_oil_weight +  castor_oil_weight;
            //console.log(sum_total_weight);

            $('#sum_total_weight').val(sum_total_weight.toFixed(2));

            acid_weight = 120.6 * bars_form;
            //console.log(acid_weight);

            var sap_weight_coconut_oil = 268 * coconut_oil_percentage / 100;
            var sap_weight_palm_oil = 199.1 * palm_oil_percentage / 100;
            var sap_weight_olive_oil = 189.7 * olive_oil_percentage / 100;
            var sap_weight_castor_oil = 180.3 * castor_oil_percentage / 100;

            var sap_total = sap_weight_coconut_oil + sap_weight_palm_oil + sap_weight_olive_oil + sap_weight_castor_oil;
            //console.log(sap_total);

            base_weight = (sap_total / 1000) * 40/56.1 * acid_weight;
            //console.log(base_weight);

            discount = base_weight * ($('#discount').val() / 100);
            
            $('#sodium_hydroxide').val((base_weight - discount).toFixed(2));
            $('#distilled_water').val(((base_weight-discount) * 2.7).toFixed(2));
        } else {
                alert("Your oil percentage must add to 100%!");
        }
    }

    update_weights();

    $("#update_form").on('click', () => {
        var coconut_oil_percentage = parseFloat($('#coconut_oil_percentage').val());
        if(!coconut_oil_percentage) {coconut_oil_percentage = 0};
        //console.log(coconut_oil_percentage);
        
        var palm_oil_percentage = parseFloat($('#palm_oil_percentage').val());
        if(!palm_oil_percentage) {palm_oil_percentage = 0};
        //console.log(palm_oil_percentage);

        var olive_oil_percentage = parseFloat($('#olive_oil_percentage').val());
        if(!olive_oil_percentage) {olive_oil_percentage = 0};
        //console.log(olive_oil_percentage);
        
        var castor_oil_percentage = parseFloat($('#castor_oil_percentage').val());
        if(!castor_oil_percentage) {castor_oil_percentage = 0};
        //console.log(castor_oil_percentage);
        
        var sum_total_percentage = coconut_oil_percentage + palm_oil_percentage + olive_oil_percentage +  castor_oil_percentage;
        //console.log(sum_total_percentage);

        $("#sum_total_percentage").val(sum_total_percentage);

        if(sum_total_percentage == 100) {

            var bars_form = 0;
            var acid_weight = 0;
            var base_weight = 0;
            var discount = 0;

            //console.log($('#bars_form').val());
            bars_form = parseFloat($('#bars_form').val());
            //console.log(bars_form);

            $('#coconut_oil_weight').val((bars_form * (coconut_oil_percentage / 100) * 96.48).toFixed( 2 ));
            $('#palm_oil_weight').val((bars_form * (palm_oil_percentage / 100) * 96.48).toFixed( 2 ));
            $('#olive_oil_weight').val((bars_form * (olive_oil_percentage / 100) * 96.48).toFixed( 2 ));
            $('#castor_oil_weight').val((bars_form * (castor_oil_percentage / 100) * 96.48).toFixed( 2 ));

            acid_weight = 120.6 * bars_form;
            //console.log(acid_weight);

            var sap_weight_coconut_oil = 268 * coconut_oil_percentage / 100;
            var sap_weight_palm_oil = 199.1 * palm_oil_percentage / 100;
            var sap_weight_olive_oil = 189.7 * olive_oil_percentage / 100;
            var sap_weight_castor_oil = 180.3 * castor_oil_percentage / 100;

            var sap_total = sap_weight_coconut_oil + sap_weight_palm_oil + sap_weight_olive_oil + sap_weight_castor_oil;
            //console.log(sap_total);

            base_weight = (sap_total / 1000) * 40/56.1 * acid_weight;
            //console.log(base_weight);

            discount = base_weight * ($('#discount').val() / 100);
            
            $('#sodium_hydroxide').val((base_weight - discount).toFixed(2));
            $('#distilled_water').val(((base_weight-discount) * 2.7).toFixed(2));
        }
        else {
            alert("Your oil percentage must add to 100%!");
        }

    });

    $('.oil_percentage').on('change', () => {
        update_weights();
    });

    $('#discount').on('change', () => {
        update_weights();
    });

    $('#bars_form').on('change', () => {
        update_weights();
    });

});

