<?php

function forms_menu()
{
    add_menu_page('Najaf Forms', 'Najaf Forms', 'activate_plugins', 'forms_functioality', 'forms_welcome', 'dashicons-smartphone', 63);
    add_submenu_page( 'forms_functioality', 'VIP طلبات استمارة هوية', 'VIP طلبات استمارة هوية', 'vip_roles', 'vip_apps','all_vip_applications', null );
    add_submenu_page( 'forms_functioality', 'طلبات استمارة الحصول على الهوية التعريفية', 'طلبات استمارة الحصول على الهوية التعريفية', 'identity_roles', 'identification_apps','all_identification_applications', null );

    // VIP edit & validate
    add_submenu_page(
        'null',
        'تعديل طلب استمارة الحصول على الهوية التعريفية',
        'null',
        'identity_roles',
        'edit-identification',
        'edit_identification_application',
        null
    );
    add_submenu_page(
        'null',
        'تدقيق طلب استمارة الحصول على الهوية التعريفية',
        'null',
        'identity_roles',
        'validate-app-identity',
        'validate_identity_application',
        null
    );
    // VIP edit & validate
    add_submenu_page(
        'null',
        'VIP تعديل طلب استمارة هوية',
        'null',
        'vip_roles',
        'edit-app',
        'edit_vip_application',
        null
    );
    add_submenu_page(
        'null',
        'VIP تدقيق طلب استمارة هوية',
        'null',
        'vip_roles',
        'validate-app',
        'validate_vip_application',
        null
    );
}
add_action('admin_menu', 'forms_menu');