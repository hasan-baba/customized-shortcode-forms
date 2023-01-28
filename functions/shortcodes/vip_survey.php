<?php
// define identity VVIP survey shortcode
function vvip_form_shortcode()
{
    $form_header = '<div class="wrap" dir="rtl">
        <form action="" method="post" id="vip_form" enctype="multipart/form-data">';

    $fourth_name = '<div class="form-group">
            <label for="">الاسم الرباعي واللقب : </label>
            <div class="row">
                <div class="col-md-3 form-group">
                    <input type="text" id="vip-fourth-name-1" name="vip-fourth-name-1" class="form-control" placeholder="الاسم الاول">
                    <small style="color:red;" id="vip-fourth-name-1-error"></small>
                </div>
                <div class="col-md-3 form-group">
                    <input type="text" id="vip-fourth-name-2" name="vip-fourth-name-2" class="form-control" placeholder="الاسم الثاني">
                    <small style="color:red;" id="vip-fourth-name-2-error"></small>
                </div> 
                <div class="col-md-3 form-group">
                    <input type="text" id="vip-fourth-name-3" name="vip-fourth-name-3" class="form-control" placeholder="الاسم الثالث">
                    <small style="color:red;" id="vip-fourth-name-3-error"></small>
                </div> 
                <div class="col-md-3 form-group">
                    <input type="text" id="vip-fourth-name-4" name="vip-fourth-name-4" class="form-control" placeholder="الاسم الرابع">
                    <small style="color:red;" id="vip-fourth-name-4-error"></small>
                </div>
                <div class="col-md-3 form-group">
                    <input type="text" id="vip-fourth-name-5" name="vip-fourth-name-5" class="form-control" placeholder=" اللقب">
                    <small style="color:red;" id="vip-fourth-name-5-error"></small>
                </div>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">اضافة صورة شخصية لصاحب الهوية:</label>
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" class="item-img file center-block" accept="image/*" id="vip-fourth-nam-personal-image" name="vip-fourth-nam-personal-image" />
                            <small style="color:red;" id="vip-fourth-name-personal-image-error"></small>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                <?=multiLanguage( "Edit Foto" , "Edit Photo" )?>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div id="upload-demo" class="center-block"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
                        </div>
                    </div>
                </div>
            </div>            
            </div>
            </div>';


    $mom_name = '<div class="form-group">
        <label for="">اسم الام:</label>
        <input type="text" id="vip-mother-name" name="vip-mother-name" class="form-control" placeholder="اسم الام:">
        <small style="color:red;" id="vip-mother-name-error"></small>
    </div>';

    $date_of_birth = '<div class="form-group">
        <label for="">تاريخ الميلاد :</label>
        <input type="text" id="vip-dob-datepicker" name="vip-user-date-of-birth" />
        <small style="color:red;" id="vip-user-date-of-birth-error"></small>
    </div>';

    $job = '<div class="form-group">
        <label for=""> المهنة او الوظيفة:</label>
        <input type="text" id="vip-job-name" name="vip-job-name" class="form-control" placeholder="المهنة او الوظيفة:">
        <small style="color:red;" id="vip-job-name-error"></small>
        <!-- <div class="w-100 row">
            <div class="mb-3 w-100 col-md-6">
                <label for="formFile" class="form-label">يرفق الكتاب او الهوية (الوجه الاول) اختياري</label>
                <label class="cabinet center-block">
                    <figure>
                        <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                        <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                    </figure>
                    <input type="file" class="item-img file center-block" id="vip-job-name1-image" accept="image/*" name="vip-job-name1-image" />
                </label>
            </div>
            <div class="mb-3 w-100 col-md-6">
                <label for="formFile" class="form-label"> يرفق الكتاب او الهوية (الوجه لثاني) اختياري</label>
                <label class="cabinet center-block">
                    <figure>
                        <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                        <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                    </figure>
                    <input type="file" class="item-img file center-block" id="vip-job-name2-image" accept="image/*" name="vip-job-name2-image" />
                </label>
            </div>
        </div>
    </div> -->';

    $live_location = '<div class="form-group">
        <label for="">عنوان السكن:</label>
        <input type="text" name="vip-live-location" id="vip-live-location" class="form-control" placeholder="عنوان السكن">
        <small style="color:red;" id="vip-live-location-error"></small>
    </div>';

    $home_number = '<div class="form-group">
        <label for="">رقم الدار:</label>
        <input type="text" name="vip-home-number" id="vip-home-number" class="form-control" placeholder="رقم الدار:">
        <small style="color:red;" id="vip-home-number-error"></small>
    </div>';

    $id_number = '<div class="row">
           <div class="col-12">
                <div class="form-group">
                    <label for="">رقم البطاقة الوطنية اوالاحوال الشخصية:</label>
                    <input type="text" id="vip-card-number" name="vip-card-number" class="form-control" placeholder="رقم البطاقة الوطنية اوالاحوال الشخصية">
                    <small style="color:red;" id="vip-card-number-error"></small>
                </div>
           </div> 
           <div class="col-12">
                <div class="w-100 row">
                    <div class="mb-3 w-100 col-md-6">
                        <label for="formFile" class="form-label">ترفق البطاقة (الوجه الاول)</label>
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" accept="image/*" id="vip-card-number1-image" class="item-img file center-block" name="vip-card-number1-image" />
                            <small style="color:red;" id="vip-card-number1-image-error"></small>
                        </label>
                    </div>
                    <div class="mb-3 w-100 col-md-6">
                        <label for="formFile" class="form-label">ترفق البطاقة (الوجه لثاني)</label>
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" accept="image/*" id="vip-card-number2-image" class="item-img file center-block" name="vip-card-number2-image" />
                            <small style="color:red;" id="vip-card-number2-image-error"></small>
                        </label>
                    </div>
                </div>
            </div> 
    </div>';

    $residence_card_number = '<div class="form-group">
        <div class="row">
            <div class="col-6">
                <label for="">رقم بطاقة السكن:</label>
                <input type="text" id="residence-card-number" name="residence-card-number" class="form-control" placeholder="رقم بطاقة السكن">
                <small style="color:red;" id="residence-card-number-error"></small>
            </div>
            <div class="col-6">
                <label for="">تاريخ بطاقة السكن :</label>
                <input type="text" id="vip-residence-card-number-datepicker" name="residence-card-date" />
                <small style="color:red;" id="residence-card-date-error"></small>
            </div>
            <div class="col-12">
                <div class="w-100 row">
                    <div class="mb-3 w-100 col-md-6">
                        <label for="formFile" class="form-label">ترفق البطاقة (الوجه الاول)</label>
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" accept="image/*" id="residence-card-number1-image" class="item-img file center-block" name="residence-card-number1-image" />
                            <small style="color:red;" id="residence-card-number1-image-error"></small>
                        </label>
                    </div>
                    <div class="mb-3 w-100 col-md-6">
                        <label for="formFile" class="form-label">ترفق البطاقة (الوجه لثاني)</label>
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" accept="image/*" id="residence-card-number2-image" class="item-img file center-block" name="residence-card-number2-image" />
                            <small style="color:red;" id="residence-card-number2-image-error"></small>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>';

    $phone_number = '<div class="form-group">
        <label for="">رقم الموبايل:</label>
        <div class="flag_container" style="direction: ltr;">
            <div class="init_selected" style="height: 40px;">
                <div class="flag">
                    <img decoding="async" src="https://najafdacards.com/wp-content/plugins/otp-api/assets/images/iraq.png">
                </div>
                <div class="country_code">+964</div>
            </div>
            <input type="text" id="vip-phone-number" class="form-control phone_number_input" placeholder="رقم الموبايل" name="vip-phone-number" autocomplete="off" style="height: 40px; padding-left: 100px;">
        </div>
        <small style="color:red;" id="vip-phone-number-error"></small>
    </div>';

    $mukhtar_name = '<div class="form-group">
        <label for="">اسم المختار:</label>
        <input type="text" id="vip-mokhtar-name" name="vip-mokhtar-name" class="form-control" placeholder="اسم المختار:">
        <small style="color:red;" id="vip-mokhtar-name-error"></small>
    </div>';



    $form_footer = '<div class="buttons">
            <a href="#" type="button" id="vip_submit_form" class="button back-btn m-0">ارسال
              <div class="sp sp-circle" id="spinner"></div>
            </a>
        </div>
    </form>
    </div>';

    $form = $form_header . $fourth_name . $mom_name .$date_of_birth. $job . $live_location . $home_number . $id_number . $residence_card_number . $phone_number . $mukhtar_name . $form_footer;
    return $form;
}
add_shortcode('identification_vvip_form', 'vvip_form_shortcode');