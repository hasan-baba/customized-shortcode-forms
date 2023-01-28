<?php

function forms_welcome(){ ?>
    <div class="wrap">
        <h1 class="wp-heading-inline"><?php echo esc_html(get_admin_page_title()); ?></h1>
        <div>
            <p>To get forms view & functionality, paste the shortcode in your frontend page:</p>
            <p>VIP Form: [identification_vvip_form]</p>
            <p>Identification Form: [identification_form]</p>
        </div>
    </div>
<?php }