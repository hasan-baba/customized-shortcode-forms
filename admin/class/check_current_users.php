<?php

class Check_user_status
{
    // check user VIP status
    function vip_check_user($id){
        global $wpdb;
        // checks if user already accepted or rejected the application
        $vip_audit_table = $wpdb->prefix.'vip_validate_app';

        $user_role = wp_get_current_user()->roles;
        $user_id = wp_get_current_user()->id;

        if(in_array('checker',$user_role)) {
            $col = 'checker';
        }else if(in_array('national_security',$user_role)){
            $col = 'national_security';
        }else{
            $col = 'supervisor';
        }

        $result = $wpdb->get_row("SELECT $col FROM $vip_audit_table WHERE application_id=$id");
        $exists = 0;

        if(!empty($result->$col)) {
            $data = unserialize($result->$col);

            foreach ($data as $dt) {
                if(in_array($user_id,$dt, TRUE)) {
                    $exists = 1;
                }
            }
        }
        return $exists;
    }

    // check user Identification status
    function identify_check_user($id){
        global $wpdb;
        $identity_audit_table = $wpdb->prefix.'identity_validate_app';

        $user_role = wp_get_current_user()->roles;
        $user_id = wp_get_current_user()->id;

        if(in_array('checker',$user_role)) {
            $col = 'checker';
        }else if(in_array('national_security',$user_role)){
            $col = 'national_security';
        }else if(in_array('supervisor',$user_role)){
            $col = 'supervisor';
        }else if(in_array('passage',$user_role)){
            $col = 'passage';
        }else {
            $col = 'governorate_office_supervisor';
        }

        $result = $wpdb->get_row("SELECT $col FROM $identity_audit_table WHERE application_id=$id");
        $exists = 0;

        if(!empty($result->$col)) {
            $data = unserialize($result->$col);
            foreach ($data as $dt) {
                if(in_array($user_id,$dt, TRUE)) {
                    $exists = 1;
                }
            }
        }
        return $exists;
    }
}