<?php

// define admin roles and permissions
function najaf_roles() {

    $admin = get_role('administrator');

    //add the new users roles
    add_role(
        'supervisor',
        __('Supervisor - مشرف'),
        array(
            'read'         => true,
        )
    );
    $supervisor = get_role('supervisor');



    add_role(
        'checker',
        'checker - مدقق',
        array(
            'read'         => true,
        )
    );
    $checker = get_role('checker');
    $checker->remove_cap('najaf_roles');
    $checker->add_cap('vip_roles');
    $checker->add_cap('identity_roles');

    add_role(
        'national_security',
        'National Security - امن وطني',
        array(
            'read'         => true,
        )
    );
    $national_security = get_role('national_security');


    add_role(
        'passage',
        'Passage - مرور',
        array(
            'read'         => true
        )
    );
    $passage = get_role('passage');

    add_role(
        'governorate_office_supervisor',
        'Governorate Office Supervisor - مشرف مكتب محافظة',
        array(
            'read'         => true,
            'delete_posts' => false
        )
    );
    $governorate_office_supervisor = get_role('governorate_office_supervisor');
}
add_action('admin_init', 'najaf_roles');


