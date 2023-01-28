<?php

// define identity survey shortcode
function identification_form_shortcode()
{
    $form_header = '<div class="wrap" dir="rtl">
        <form action="" method="post" id="sign_up" enctype="multipart/form-data">';

    $fourth_name = '<div class="form-group">
            <label for="">الاسم الرباعي واللقب : </label>
            <div class="row">
                <div class="col-md-3 form-group">
                    <input type="text" id="identification-fourth-name-1" name="identification-fourth-name-1" class="form-control" placeholder="الاسم الاول">
                    <small style="color:red;" id="identification-fourth-name-1-error"></small>
                </div>
                <div class="col-md-3 form-group">
                    <input type="text" id="identification-fourth-name-2" name="identification-fourth-name-2" class="form-control" placeholder="الاسم الثاني">
                    <small style="color:red;" id="identification-fourth-name-2-error"></small>
                </div> 
                <div class="col-md-3 form-group">
                    <input type="text" id="identification-fourth-name-3" name="identification-fourth-name-3" class="form-control" placeholder="الاسم الثالث">
                    <small style="color:red;" id="identification-fourth-name-3-error"></small>
                </div> 
                <div class="col-md-3 form-group">
                    <input type="text" id="identification-fourth-name-4" name="identification-fourth-name-4" class="form-control" placeholder="الاسم الرابع">
                    <small style="color:red;" id="identification-fourth-name-4-error"></small>
                </div> 
                <div class="col-md-3 form-group">
                    <input type="text" id="identification-fourth-name-5" name="identification-fourth-name-5" class="form-control" placeholder=" اللقب">
                    <small style="color:red;" id="identification-fourth-name-5-error"></small>
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
                            <input type="file" class="item-img file center-block" accept="image/*" id="identification-fourth-name-personal-image" name="file_photo" />
                            <small style="color:red;" id="identification-fourth-name-personal-image-error"></small>
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
        <input type="text" id="identification-mother-name" class="form-control" placeholder="اسم الام:">
        <small style="color:red;" id="identification-mother-name-error"></small>
    </div>';

    $date_of_birth = '<div class="form-group">
        <label for="">تاريخ الميلاد :</label>
        <input type="text" id="identification-dob-datepicker" name="identification-user-date-of-birth" />
        <small style="color:red;" id="identification-dob-error"></small>
    </div>';

    $job = '<div class="form-group">
        <label for=""> المهنة او الوظيفة:</label>
        <input type="text" id="identification-work" class="form-control" placeholder="المهنة او الوظيفة:">
        <small style="color:red;" id="identification-work-error"></small>
    </div>';

    $live_location = '<div class="form-group">
        <label for="">عنوان السكن:</label>
        <input type="text" id="identification-home-location" class="form-control" placeholder="عنوان السكن:">
        <small style="color:red;" id="identification-home-location-error"></small>
    </div>';

    $home_number = '<div class="form-group">
        <label for="">رقم الدار:</label>
        <input type="text" id="identification-home-number" class="form-control" placeholder="رقم الدار:">
        <small style="color:red;" id="identification-home-number-error"></small>
    </div>';

    $id_number = '<div class="row">
           <div class="col-12">
                <div class="form-group">
                    <label for="">رقم البطاقة الوطنية اوالاحوال الشخصية:</label>
                    <input type="text" id="identification-card-number" name="" class="form-control" placeholder="رقم البطاقة الوطنية اوالاحوال الشخصية">
                    <small style="color:red;" id="identification-card-number-error"></small>
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
                            <input type="file" accept="image/*" id="identifiction-card-number1-image" class="item-img file center-block" name="file_photo" />
                            <small style="color:red;" id="identifiction-card-number1-image-error"></small>
                        </label>
                    </div>
                    <div class="mb-3 w-100 col-md-6">
                        <label for="formFile" class="form-label">ترفق البطاقة (الوجه لثاني)</label>
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" accept="image/*" id="identifiction-card-number2-image" class="item-img file center-block" name="file_photo" />
                            <small style="color:red;" id="identifiction-card-number2-image-error"></small>
                        </label>
                    </div>
                </div>
            </div> 
    </div>';

    $residence_card_number = '<div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">رقم بطاقة السكن:</label>
                <input type="text" id="identification-living-card" class="form-control" placeholder="رقم بطاقة السكن">
                <small style="color:red;" id="identification-living-card-error"></small>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
               <label for="">تاريخ بطاقةالسكن :</label>
               <input type="text" id="identification-living-card-datepicker" name="identification-living-card-date" />
               <small style="color:red;" id="identification-living-card-date-error"></small> 
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
                        <input type="file" accept="image/*" id="identifiction-living-card1-image" class="item-img file center-block" name="file_photo" />
                        <small style="color:red;" id="identifiction-living-card1-image-error"></small>
                    </label>
                </div>
                <div class="mb-3 w-100 col-md-6">
                    <label for="formFile" class="form-label">ترفق البطاقة (الوجه لثاني)</label>
                    <label class="cabinet center-block">
                        <figure>
                            <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                            <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                        </figure>
                        <input type="file" accept="image/*" id="identifiction-living-card2-image" class="item-img file center-block" name="file_photo" />
                        <small style="color:red;" id="identifiction-living-card2-image-error"></small>
                    </label>
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
            <input type="text" id="identification-phone-number" class="form-control phone_number_input" placeholder="رقم الموبايل" autocomplete="off" style="height: 40px; padding-left: 100px;">
        </div>
        <small style="color:red;" id="identification-phone-number-error"></small>
    </div>';

    $mukhtar_name = '<div class="form-group">
        <label for="">اسم المختار:</label>
        <input type="text" id="identification-mokhtar-name" class="form-control" placeholder="اسم المختار:">
        <small style="color:red;" id="identification-mokhtar-name-error"></small>
    </div>';

    $car_type_color = '<div class="form-group">  
    <div class="row">
        <div class="col-6">
            <label for="">نوع المركبة:</label>
            <input type="text" id="identification-car-type" class="form-control" placeholder="نوع المركبة:">
            <small style="color:red;" id="identification-car-type-error"></small>
        </div>
        <div class="col-6">
            <label for="">لونها</label>
            <input type="text" id="identification-car-color" class="form-control" placeholder="لونها:">
             <small style="color:red;" id="identification-car-color-error"></small>
        </div>
    </div>  

    </div>';

    $year_of_manufact = '<div class="form-group">
        <label for="">سنة الصنع:</label>
        <input class="date-own form-control" id="identification-car-dob-datepicker" placeholder="مثلا: 2022" style="width: 100%;" type="text">
        <small style="color:red;" id="identification-car-dob-error"></small>
    </div>';

    $car_number = '<div>
        <div class="row">
           <div class="col-6">
                <div class="form-group">
                    <label for="">رقم المركبة</label>
                    <input type="text" id="identification-car-number"  class="form-control" placeholder="رقم المركبة">
                    <small style="color:red;" id="identification-car-number-error"></small>
                </div>
           </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">المحافظة </label>
                    <select id="identification-car-mohafaza" name="">
                      <option value="0"></option>
                      <option value="محافظة بغداد" >محافظة بغداد</option>
                      <option value="محافظة البصرة">محافظة البصرة</option>
                      <option value="محافظة نينوى">محافظة نينوى</option>
                      <option value="محافظة أربيل">محافظة أربيل</option>
                      <option value="محافظة النجف">محافظة النجف</option>
                      <option value="محافظة ذي قار">محافظة ذي قار</option>
                      <option value="محافظة كركوك">محافظة كركوك</option>
                      <option value="محافظة الأنبار">محافظة الأنبار</option>
                      <option value="محافظة ديالى">محافظة ديالى</option>
                      <option value="محافظة المثنى">محافظة المثنى</option>
                      <option value="محافظة القادسية">محافظة القادسية</option>
                      <option value="محافظة ميسان">محافظة ميسان</option>
                      <option value="محافظة واسط">محافظة واسط</option>
                      <option value="محافظة صلاح الدين">محافظة صلاح الدين</option>
                      <option value="محافظة دهوك">محافظة دهوك</option>
                      <option value="محافظة السليمانية">محافظة السليمانية</option>
                      <option value="محافظة بابل">محافظة بابل</option>
                      <option value="محافظة كربلاء">محافظة كربلاء</option>
                    </select>
                    <small style="color:red;" id="identification-car-mohafaza-error"></small>
                </div>
           </div>
           <div class="col-12 mb-2">
                <label for="">رقم السنوية:</label>
                <input type="text" id="identification-car-yearly" class="form-control" placeholder="رقم السنوية">
                <small style="color:red;" id="identification-car-yearly-error"></small>
           </div>
           <div class="col-12 mb-2">
                 <label for="">تاريخ نفاذ السنوية:</label>
                 <input type="text" id="identification-car-yearly-expiry-datepicker" name="identification-car-yearly-expiry"  placeholder="تاريخ نفاذ السنوية"/>
                 <small style="color:red;" id="identification-car-yearly-expiry-error"></small>    
           </div>
        </div>
        <div class="row">
             <div class="col-12">
                <div class="w-100 row">
                    <div class="mb-3 w-100 col-md-6">
                        <label for="formFile" class="form-label">ترفق السنوية (الوجه الاول)</label>
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" accept="image/*" id="identifiction-car-card1-image" class="item-img file center-block" name="file_photo" />
                            <small style="color:red;" id="identifiction-car-card1-image-error"></small>
                        </label>
                    </div>
                    <div class="mb-3 w-100 col-md-6">
                        <label for="formFile" class="form-label">ترفق السنوية (الوجه لثاني)</label>
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" accept="image/*" id="identifiction-car-card2-image" class="item-img file center-block" name="file_photo" />
                            <small style="color:red;" id="identifiction-car-card2-image-error"></small>
                        </label>
                    </div>
                </div>
        </div> 
        </div>
    </div>';


    $driving_licece = '<div class="form-group">
        <div class="row">
            <div class="col-6">
                <label for="">رقم اجازة السوق:</label>
                <input type="text" id="identification-driving-licence" class="form-control" placeholder="رقم اجازة السوق">
                <small style="color:red;" id="identification-driving-licence-error"></small>
            </div>
            <div class="col-6">
                <label for="">تاريخ نفاذ الإجازة:</label>
                <input type="text" id="identification-driving-licence-expiry-datepicker" class="form-control" placeholder="تاريخ نفاذ الإجازة">
                <small style="color:red;" id="identification-driving-licence-expiry-datepicker-error"></small>
            </div>
            <div class="col-12">
                <div class="w-100 row">
                    <div class="mb-3 w-100 col-md-6">
                        <label for="formFile" class="form-label">ترفق الاجازة (الوجه الاول)</label>
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" accept="image/*" id="identifiction-drivinglicence-card1-image" class="item-img file center-block" name="file_photo" />
                            <small style="color:red;" id="identifiction-drivinglicence-card1-image-error"></small>
                        </label>
                    </div>
                    <div class="mb-3 w-100 col-md-6">
                        <label for="formFile" class="form-label">ترفق الاجازة (الوجه لثاني)</label>
                        <label class="cabinet center-block">
                            <figure>
                                <img src="" class="front-vip img-responsive img-thumbnail" id="item-img-output" />
                                <figcaption><span class="dashicons dashicons-camera"></span></figcaption>
                            </figure>
                            <input type="file" accept="image/*" id="identifiction-drivinglicence-card2-image" class="item-img file center-block" name="file_photo" />
                            <small style="color:red;" id="identifiction-drivinglicence-card2-image-error"></small>
                        </label>
                    </div>
                </div>
            </div> 
        </div>
    </div>';



    $form_footer = '<div class="buttons">
            <a href="#" type="button" id="identification_btn" class="button back-btn">ارسال
            <div class="sp sp-circle" id="spinner"></div>
            </a>
        </div>
    </form>
    </div>';

    $form = $form_header . $fourth_name . $mom_name .$date_of_birth. $job . $live_location . $home_number . $id_number . $residence_card_number . $phone_number . $mukhtar_name . $car_type_color . $year_of_manufact . $car_number . $driving_licece . $form_footer;
    return $form;
}
add_shortcode('identification_form', 'identification_form_shortcode');