jQuery(document).ready(function(){
    // validate functions arabic characters only
    function validate_names(input){
        var pattern = /^[\u0621-\u064A\s]+$/;
        let result = pattern.test(input);
        return result;
    }

    // validate functions numbers only
    function validate_numbers(input){
        var pattern = /^[0-9]+$/;
        let result = pattern.test(input);
        return result;
    }


    // VIP admin update js
    jQuery("#vip-dob-datepicker").datepicker(jQuery.datepicker.regional["ar"]);
    jQuery("#vip-residence-card-number-datepicker").datepicker(jQuery.datepicker.regional["ar"]);
    jQuery("#submit_edit_vip").click( (e)=>{
        var error = [];
        e.preventDefault();

        if(!validate_names(jQuery("#vip-fourth-name-1").val())){
            jQuery("#vip-fourth-name-1-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error');
        }else{
            jQuery("#vip-fourth-name-1-error").text("");
        }

        if(!validate_names(jQuery("#vip-fourth-name-2").val())){
            jQuery("#vip-fourth-name-2-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error');
        }else{
            jQuery("#vip-fourth-name-2-error").text("");
        }

        if(!validate_names(jQuery("#vip-fourth-name-3").val())){
            jQuery("#vip-fourth-name-3-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error');
        }else{
            jQuery("#vip-fourth-name-3-error").text("");
        }

        if(!validate_names(jQuery("#vip-fourth-name-4").val())){
            jQuery("#vip-fourth-name-4-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error');
        }else{
            jQuery("#vip-fourth-name-4-error").text("");
        }

        if(!validate_names(jQuery("#vip-fourth-name-5").val())){
            jQuery("#vip-fourth-name-5-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error');
        }else{
            jQuery("#vip-fourth-name-5-error").text("");
        }

        if(jQuery("#vip-fourth-nam-personal-image").val() == ''){
            jQuery("#vip-fourth-name-personal-image-error").text("ادخل صورة");
            error.push('error');
        }else{
            jQuery("#vip-fourth-name-personal-image-error").text("");
        }

        if(!validate_names(jQuery("#vip-mother-name").val())){
            jQuery("#vip-mother-name-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error');
        }else{
            jQuery("#vip-mother-name-error").text("");
        }

        if(jQuery("#vip-dob-datepicker").val() == ''){
            jQuery("#vip-user-date-of-birth-error").text("ادخل التاريخ!");
            error.push('error');
        }else{
            jQuery("#vip-user-date-of-birth-error").text("");
        }

        if(!validate_names(jQuery("#vip-job-name").val())){
            jQuery("#vip-job-name-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error');
        }else{
            jQuery("#vip-job-name-error").text("");
        }

        if(!validate_names(jQuery("#vip-live-location").val())){
            jQuery("#vip-live-location-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error');
        }else{
            jQuery("#vip-live-location-error").text("");
        }

        if(jQuery("#vip-home-number").val() == ''){
            jQuery("#vip-home-number-error").text("ادخل رقم الدار");
            error.push('error');
        }else{
            jQuery("#vip-home-number-error").text("");
        }

        if(!validate_numbers(jQuery("#vip-card-number").val())){
            jQuery("#vip-card-number-error").text("يجب ان تكون من ارقام فقط!");
            error.push('error');
        }else{
            jQuery("#vip-card-number-error").text("");
        }
        if(jQuery("#vip-card-number1-image").val() == ''){
            jQuery("#vip-card-number1-image-error").text("ادخل صورة");
            error.push('error');
        }else{
            jQuery("#vip-card-number1-image-error").text("");
        }

        if(jQuery("#vip-card-number2-image").val() == ''){
            jQuery("#vip-card-number2-image-error").text("ادخل صورة");
            error.push('error');
        }else{
            jQuery("#vip-card-number2-image-error").text("");
        }

        if(!validate_numbers(jQuery("#residence-card-number").val())){
            jQuery("#residence-card-number-error").text("يجب ان تكون من ارقام فقط!");
            error.push('error');
        }else{
            jQuery("#residence-card-number-error").text("");
        }

        if(jQuery("#vip-residence-card-number-datepicker").val() == ''){
            jQuery("#residence-card-date-error").text("ادخل التاريخ!");
            error.push('error');
        }else{
            jQuery("#residence-card-date-error").text("");
        }

        if(jQuery("#residence-card-number1-image").val() == ''){
            jQuery("#residence-card-number1-image-error").text("ادخل صورة");
            error.push('error');
        }else{
            jQuery("#residence-card-number1-image-error").text("");
        }

        if(jQuery("#residence-card-number2-image").val() == ''){
            jQuery("#residence-card-number2-image-error").text("ادخل صورة");
            error.push('error');
        }else{
            jQuery("#residence-card-number2-image-error").text("");
        }

        if(!validate_numbers(jQuery("#vip-phone-number").val())){
            jQuery("#vip-phone-number-error").text("يجب ان تكون من ارقام فقط!");
            error.push('error');
        }else{
            jQuery("#vip-phone-number-error").text("");
        }

        if(!validate_names(jQuery("#vip-mokhtar-name").val())){
            jQuery("#vip-mokhtar-name-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error');
        }else{
            jQuery("#vip-mokhtar-name-error").text("");
        }

        // all validations are true
        if(error.length == 0) {
            var vipFourthName1 = jQuery('#vip-fourth-name-1').val();
            var vipFourthName2 = jQuery('#vip-fourth-name-2').val();
            var vipFourthName3 = jQuery('#vip-fourth-name-3').val();
            var vipFourthName4 = jQuery('#vip-fourth-name-4').val();
            var vipFourthName5 = jQuery('#vip-fourth-name-5').val();
            var vipMotherName = jQuery('#vip-mother-name').val();
            var vipJobName = jQuery('#vip-job-name').val();
            var vipLiveLocation = jQuery('#vip-live-location').val();
            var vipHomeNumber = jQuery('#vip-home-number').val();
            var vipCardNumber = jQuery('#vip-card-number').val();
            var residenceCardNumber = jQuery('#residence-card-number').val();
            var residenceCardDate = jQuery('#vip-residence-card-number-datepicker').val();
            var dobDatepicker = jQuery('#vip-dob-datepicker').val();
            var vipPhoneNumber = jQuery('#vip-phone-number').val();
            var vipMokhtarName = jQuery('#vip-mokhtar-name').val();
            var vipID = jQuery('#edit_vip_id').val();

            // console.log(vipFourthNameImage);
            var form_data = new FormData();
            form_data.append('action', 'update_vip_form_data');
            form_data.append('vipID', vipID);
            form_data.append('vip-fourth-name-1', vipFourthName1);
            form_data.append('vip-fourth-name-2', vipFourthName2);
            form_data.append('vip-fourth-name-3', vipFourthName3);
            form_data.append('vip-fourth-name-4', vipFourthName4);
            form_data.append('vip-fourth-name-5', vipFourthName5);
            form_data.append('vip-mother-name', vipMotherName);
            form_data.append('vip-user-date-of-birth', dobDatepicker);
            form_data.append('vip-job-name', vipJobName);
            form_data.append('vip-live-location', vipLiveLocation);
            form_data.append('vip-home-number', vipHomeNumber);
            form_data.append('vip-card-number', vipCardNumber);
            form_data.append('residence-card-number', residenceCardNumber);
            form_data.append('residence-card-date', residenceCardDate);
            form_data.append('vip-phone-number', vipPhoneNumber);
            form_data.append('vip-mokhtar-name', vipMokhtarName);

            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'json',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: form_data,
                success: function(data){
                    // window.location.href = "/wp-admin/admin.php?page=validate-app&id="+data.id;
                    alert('تم تعديل الطلب بنجاح!');
                    window.location.reload();
                }
            });
        }
    });

    // Identification admin update js
    jQuery("#identification-dob-datepicker").datepicker(jQuery.datepicker.regional["ar"]);
    jQuery("#identification-car-yearly-expiry-datepicker").datepicker(jQuery.datepicker.regional["ar"]);
    jQuery("#identification-driving-licence-expiry-datepicker").datepicker(jQuery.datepicker.regional["ar"]);
    jQuery("#identification-living-card-datepicker").datepicker(jQuery.datepicker.regional["ar"]);
    jQuery("#submit_edit_identification").click((e)=>{
        var error = [];
        e.preventDefault();

        if(!validate_names(jQuery("#identification-fourth-name-1").val())){
            jQuery("#identification-fourth-name-1-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error identification-fourth-name');
        }else{
            jQuery("#identification-fourth-name-1-error").text("");
        }

        if(!validate_names(jQuery("#identification-fourth-name-2").val())){
            jQuery("#identification-fourth-name-2-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error identification-fourth-name');
        }else{
            jQuery("#identification-fourth-name-2-error").text("");
        }

        if(!validate_names(jQuery("#identification-fourth-name-3").val())){
            jQuery("#identification-fourth-name-3-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error identification-fourth-name');
        }else{
            jQuery("#identification-fourth-name-3-error").text("");
        }

        if(!validate_names(jQuery("#identification-fourth-name-4").val())){
            jQuery("#identification-fourth-name-4-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error identification-fourth-name');
        }else{
            jQuery("#identification-fourth-name-4-error").text("");
        }

        if(!validate_names(jQuery("#identification-fourth-name-5").val())){
            jQuery("#identification-fourth-name-5-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error identification-fourth-name');
        }else{
            jQuery("#identification-fourth-name-5-error").text("");
        }

        if(!validate_names(jQuery("#identification-mother-name").val())){
            jQuery("#identification-mother-name-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error identification-mother-name');
        }else{
            jQuery("#identification-mother-name-error").text("");
        }

        if(jQuery('#identification-dob-datepicker').val() == ''){
            jQuery("#identification-dob-error").text("تاريخ الميلاد!");
            error.push('error identification-dob-datepicker');
        }else{
            jQuery("#identification-dob-error").text("");
        }

        if(!validate_numbers(jQuery('#identification-car-dob-datepicker').val())){
            jQuery("#identification-car-dob-error").text("سنة الصنع!");
            error.push('error');
        }else{
            jQuery("#identification-car-dob-error").text("");
        }

        if(!validate_names(jQuery("#identification-work").val())){
            jQuery("#identification-work-error").text("يجب ان يكون من احرف وعربية فقط!");
            error.push('error identification-work');
        }else{
            jQuery("#identification-work-error").text("");
        }

        if(!validate_names(jQuery("#identification-home-location").val())){
            jQuery("#identification-home-location-error").text("يجب ان يكون من احرف وعربية فقط!");
            error.push('error identification-home-location');
        }else{
            jQuery("#identification-home-location-error").text("");
        }

        if(jQuery("#identification-home-number").val() == ''){
            jQuery("#identification-home-number-error").text("ادخل رقم الدار");
            error.push('error');
        }else{
            jQuery("#identification-home-number-error").text("");
        }

        if(!validate_numbers(jQuery("#identification-card-number").val())){
            jQuery("#identification-card-number-error").text("يجب ان يكون من ارقام فقط!");
            error.push('error identification-card-number');
        }else{
            jQuery("#identification-card-number-error").text("");
        }

        if(!validate_numbers(jQuery("#identification-living-card").val())){
            jQuery("#identification-living-card-error").text("يجب ان يكون من ارقام فقط!");
            error.push('error identification-living-card');
        }else{
            jQuery("#identification-living-card-error").text("");
        }


        if(!validate_numbers(jQuery("#identification-phone-number").val())){
            jQuery("#identification-phone-number-error").text("يجب ان يكون من ارقام فقط!");
            error.push('error identification-phone-number');
        }else{
            jQuery("#identification-phone-number-error").text("");
        }

        if(!validate_names(jQuery("#identification-mokhtar-name").val())){
            jQuery("#identification-mokhtar-name-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error identification-mokhtar-name');
        }else{
            jQuery("#identification-mokhtar-name-error").text("");
        }

        if(!validate_names(jQuery("#identification-car-type").val())){
            jQuery("#identification-car-type-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error identification-car-type');
        }else{
            jQuery("#identification-car-type-error").text("");
        }

        if(!validate_names(jQuery("#identification-car-color").val())){
            jQuery("#identification-car-color-error").text("يجب ان تكون من احرف وعربية فقط!");
            error.push('error identification-car-color');
        }else{
            jQuery("#identification-car-color-error").text("");
        }

        if(jQuery("#identification-car-number").val() == ''){
            jQuery("#identification-car-number-error").text("ادخل رقم المركبة!");
            error.push('error');
        }else{
            jQuery("#identification-car-number-error").text("");
        }

        if(jQuery("#identification-car-mohafaza").val() == 0){
            jQuery("#identification-car-mohafaza-error").text("اختر محافظة");
            error.push('error identification-car-mohafaza');
        }else{
            jQuery("#identification-car-mohafaza-error").text("");
        }

        if(!validate_numbers(jQuery("#identification-car-yearly").val())){
            jQuery("#identification-car-yearly-error").text("يجب ان تكون من ارقام فقط!");
            error.push('error identification-car-yearly');
        }else{
            jQuery("#identification-car-yearly-error").text("");
        }

        if(jQuery('#identification-car-yearly-expiry-datepicker').val() == ''){
            jQuery("#identification-car-yearly-expiry-error").text("ادخل تاريخ نفاذ السنوية!");
            error.push('error identification-car-yearly-expiry-datepicker');
        }else{
            jQuery("#identification-car-yearly-expiry-error").text("");
        }

        if(jQuery('#identification-driving-licence-expiry-datepicker').val() == ''){
            jQuery("#identification-driving-licence-expiry-datepicker-error").text("ادخل تاريخ نفاذ الإجازة!");
            error.push('error identification-driving-licence-expiry-datepicker');
        }else{
            jQuery("#identification-driving-licence-expiry-datepicker-error").text("");
        }

        if(jQuery('#identification-living-card-datepicker').val() == ''){
            jQuery("#identification-living-card-date-error").text("ادخل تاريخ بطاقة السكن!");
            error.push('error identification-living-card-datepicker');
        }else{
            jQuery("#identification-living-card-date-error").text("");
        }

        if(!validate_numbers(jQuery("#identification-driving-licence").val())){
            jQuery("#identification-driving-licence-error").text("يجب ان تكون من ارقام فقط!");
            error.push('error identification-driving-licence');
        }else{
            jQuery("#identification-driving-licence-error").text("");
        }
        // all validations are true
        if(error.length == 0) {
            var identificationFourthName1 = jQuery('#identification-fourth-name-1').val();
            var identificationFourthName2 = jQuery('#identification-fourth-name-2').val();
            var identificationFourthName3 = jQuery('#identification-fourth-name-3').val();
            var identificationFourthName4 = jQuery('#identification-fourth-name-4').val();
            var identificationFourthName5 = jQuery('#identification-fourth-name-5').val();
            var identificationMotherName = jQuery('#identification-mother-name').val();
            var identificationDobDatepicker = jQuery('#identification-dob-datepicker').val();
            var identificationWork = jQuery('#identification-work').val();
            var identificationHomeLocation = jQuery('#identification-home-location').val();
            var identificationHomeNumber = jQuery('#identification-home-number').val();
            var identificationCardNumber = jQuery('#identification-card-number').val();
            var identificationCarMohafaza = jQuery('#identification-car-mohafaza').val();
            var identificationLivingCard = jQuery('#identification-living-card').val();
            var identificationLivingCardDatepicker = jQuery('#identification-living-card-datepicker').val();
            var identificationPhoneNumber = jQuery('#identification-phone-number').val();
            var identificationMokhtarName = jQuery('#identification-mokhtar-name').val();
            var identificationCarType = jQuery('#identification-car-type').val();
            var identificationCarColor = jQuery('#identification-car-color').val();
            var identificationCarDobDatepicker = jQuery('#identification-car-dob-datepicker').val();
            var identificationCarNumber = jQuery('#identification-car-number').val();
            var identificationCarYearly = jQuery('#identification-car-yearly').val();
            var identificationCarYearlyExpiryDatepicker = jQuery('#identification-car-yearly-expiry-datepicker').val();
            var identificationDrivingLicence = jQuery('#identification-driving-licence').val();
            var identificationDrivingLicenceExpiryDatepicker = jQuery('#identification-driving-licence-expiry-datepicker').val();
            var editIdentityID = jQuery('#editIdentityID').val();

            var form_data = new FormData();
            form_data.append('action', 'update_identity_form_data');
            form_data.append('identificationFourthName1', identificationFourthName1);
            form_data.append('identificationFourthName2', identificationFourthName2);
            form_data.append('identificationFourthName3', identificationFourthName3);
            form_data.append('identificationFourthName4', identificationFourthName4);
            form_data.append('identificationFourthName5', identificationFourthName5);
            form_data.append('identificationMotherName',identificationMotherName);
            form_data.append('identificationDobDatepicker',identificationDobDatepicker);
            form_data.append('identificationWork',identificationWork);
            form_data.append('identificationHomeLocation',identificationHomeLocation);
            form_data.append('identificationHomeNumber',identificationHomeNumber);
            form_data.append('identificationCardNumber',identificationCardNumber);
            form_data.append('identificationCarMohafaza',identificationCarMohafaza);
            form_data.append('identificationLivingCard',identificationLivingCard);
            form_data.append('identificationLivingCardDatepicker',identificationLivingCardDatepicker);
            form_data.append('identificationPhoneNumber',identificationPhoneNumber);
            form_data.append('identificationMokhtarName',identificationMokhtarName);
            form_data.append('identificationCarType',identificationCarType);
            form_data.append('identificationCarColor',identificationCarColor);
            form_data.append('identificationCarDobDatepicker',identificationCarDobDatepicker);
            form_data.append('identificationCarNumber',identificationCarNumber);
            form_data.append('identificationCarYearly',identificationCarYearly);
            form_data.append('identificationCarYearlyExpiryDatepicker',identificationCarYearlyExpiryDatepicker);
            form_data.append('identificationDrivingLicence',identificationDrivingLicence);
            form_data.append('editIdentityID',editIdentityID);
            form_data.append('identificationDrivingLicenceExpiryDatepicker', identificationDrivingLicenceExpiryDatepicker);


            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'json',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: form_data,
                beforeSend:function(){
                    jQuery("#spinner").css('display','inline-block');
                    jQuery("#identification_btn").css('pointer-events', 'none');
                },
                success: function(data){
                    alert('تم تعديل الطلب بنجاح!');
                    location.reload();
                }
            });
        }
    });

    // audit vip application acceptance
    jQuery("#audit_accept_vip").click((e)=>{
        e.preventDefault();

        var app_id = jQuery("#edit_vip_id").val();
        var form_data = new FormData();
        form_data.append('action', 'audit_vip_form');
        form_data.append('status', 'accepted');
        form_data.append('app_id', app_id);

        if (confirm('هل انت متاكد من قبول هذا الطلب؟')) {
            // Save it!
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'json',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: form_data,
                success: function(data){
                    alert('تم قبول الطلب بنجاح!');
                    window.location.href = '/wp-admin/admin.php?page=vip_apps';
                }
            });
        } else {
            // Do nothing!
        }
    });

    // audit vip application rejection
    jQuery("#audit_reject_vip").click((e)=>{
        e.preventDefault();

        var app_id = jQuery("#edit_vip_id").val();
        var form_data = new FormData();
        form_data.append('action', 'audit_vip_form');
        form_data.append('status', 'rejected');
        form_data.append('app_id', app_id);

        if (confirm('هل انت متاكد من رفض هذا الطلب؟')) {
            // Save it!
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'json',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: form_data,
                success: function(data){
                    alert('تم رفض الطلب بنجاح!');
                    window.location.href = '/wp-admin/admin.php?page=vip_apps';
                }
            });
        } else {
            // Do nothing!
        }
    });

    // audit identify application acceptance
    jQuery("#audit_accept_identity").click((e)=>{
        e.preventDefault();

        var app_id = jQuery("#editIdentityID").val();
        var form_data = new FormData();
        form_data.append('action', 'audit_identity_form');
        form_data.append('status', 'accepted');
        form_data.append('app_id', app_id);

        if (confirm('هل انت متاكد من قبول هذا الطلب؟')) {
            // Save it!
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'json',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: form_data,
                success: function(data){
                    alert('تم قبول الطلب بنجاح!');
                    window.location.href = '/wp-admin/admin.php?page=identification_apps';
                }
            });
        } else {
            // Do nothing!
        }
    });

    // audit identify application rejection
    jQuery("#audit_reject_identity").click((e)=>{
        e.preventDefault();

        var app_id = jQuery("#editIdentityID").val();
        var form_data = new FormData();
        form_data.append('action', 'audit_identity_form');
        form_data.append('status', 'rejected');
        form_data.append('app_id', app_id);

        if (confirm('هل انت متاكد من رفض هذا الطلب؟')) {
            // Save it!
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'json',
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                data: form_data,
                success: function(data){
                    alert('تم رفض الطلب بنجاح!');
                    window.location.href = '/wp-admin/admin.php?page=identification_apps';
                }
            });
        } else {
            // Do nothing!
        }
    });
});