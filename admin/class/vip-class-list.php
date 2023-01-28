<?php

/**
 * Class for displaying Subscribers Entries
 */
class Vip_List_Table extends WP_List_Table {

    public function get_users_role(){
        $user = wp_get_current_user();
        $user_role = $user->roles[0];
        return $user_role;
    }

    // table columns
    public function get_columns() {
        $user_role = $this->get_users_role();
        if($user_role === 'administrator' || $user_role === 'checker'){
            $table_columns = array(
                'residence_card_number' => 'رقم البطاقة الوطنية',
                'vip_fourth_name_1' => 'الاسم',
                'vip_date_of_birth' => 'تاريخ الميلاد',
                'vip_job_name' => 'المهنة او الوظيفة',
                'vip_phone_number' => 'رقم الموبايل',
                'action' => 'تعديل / تدقيق',
                'status' => 'الحالة',
            );
        } else{
            $table_columns = array(
                'residence_card_number' => 'رقم البطاقة الوطنية',
                'vip_fourth_name_1' => 'الاسم',
                'vip_date_of_birth' => 'تاريخ الميلاد',
                'vip_job_name' => 'المهنة او الوظيفة',
                'vip_phone_number' => 'رقم الموبايل',
                'action' => 'تدقيق',
                'status' => 'الحالة',
            );
        }

        return $table_columns;
    }
    // display if there is no rows
    public function no_items() {
        echo 'لا يوجد اي طلب!';
    }
    // sort columns
    public function get_sortable_columns() {
        return $sortable = array(
            'residence_card_number'=>array('residence_card_number',true),
            'vip_fourth_name_1'=>array('vip_fourth_name_1',false),
            'vip_date_of_birth'=>array('vip_date_of_birth',false),
            'vip_job_name'=>array('vip_job_name',false),
            'vip_phone_number'=>array('vip_phone_number',false),
            'action'=>array('action',false),
            'status'=>array('status',false)
        );
    }

    // prepare rows
    public function prepare_items() {

        global $wpdb;
        $per_page = 20;


        $table_vip = $wpdb->prefix . 'vip';
        $vip_audit_table = $wpdb->prefix.'vip_validate_app';

        if (isset($_GET['page']) && isset($_GET['s']) && $_GET['page'] == 'vip_apps' && isset($_GET['filter_option'])) {

            $search = "%" . $_GET['s'] . "%";
            $status = $_GET['filter_option'];
            $sql = $wpdb->prepare("SELECT *,$table_vip.id FROM $table_vip LEFT JOIN $vip_audit_table ON $table_vip.id=$vip_audit_table.application_id WHERE residence_card_number Like %s OR vip_fourth_name_1 Like %s OR vip_date_of_birth Like %s OR vip_job_name Like %s OR vip_phone_number Like %s", $search, $search, $search,$search, $search);
            $results = $wpdb->get_results($sql);
        } else if(isset($_GET['page']) && isset($_GET['s']) && $_GET['page'] == 'vip_apps') {

            $search = "%" . $_GET['s'] . "%";
            $sql = $wpdb->prepare("SELECT *,$table_vip.id FROM $table_vip LEFT JOIN $vip_audit_table ON $table_vip.id=$vip_audit_table.application_id WHERE residence_card_number Like %s OR vip_fourth_name_1 Like %s OR vip_date_of_birth Like %s OR vip_job_name Like %s OR vip_phone_number Like %s", $search, $search, $search,$search, $search);
            $results = $wpdb->get_results($sql);

        } else if(isset($_GET['page']) && $_GET['page'] == 'vip_apps' && isset($_GET['filter_option'])) {

            $status = $_GET['filter_option'];
            $sql = $wpdb->prepare("SELECT *,$table_vip.id FROM $table_vip LEFT JOIN $vip_audit_table ON $table_vip.id=$vip_audit_table.application_id");
            $results = $wpdb->get_results($sql);

        } else {
            $sql = $wpdb->prepare("SELECT *,$table_vip.id FROM $table_vip LEFT JOIN $vip_audit_table ON $table_vip.id=$vip_audit_table.application_id");
            $results = $wpdb->get_results($sql);
        }

        $data = array();
        $user_role = wp_get_current_user()->roles;
        $user_id = wp_get_current_user()->id;
        if(in_array('national_security',$user_role)){
            foreach ( $results as $item ) {
                if(!empty($item->checker)) {
                    $inner_data = unserialize($item->checker);
                    $checker_reject = true;
                    foreach ($inner_data as $dt) {
                        if($dt['status'] == 'rejected'){
                            $checker_reject = false;
                        }
                    }
                    if($checker_reject) {
                        $args = array(
                            'role' => 'checker'
                        );
                        $result = $wpdb->get_row("SELECT checker FROM $vip_audit_table WHERE application_id=$item->id");

                        $count_acceptance = 0;

                        if(!empty($result->checker)) {
                            $row_data = unserialize($result->checker);
                            foreach ($row_data as $dt) {
                                if(in_array('accepted',$dt, TRUE)) {
                                    $count_acceptance += 1;
                                }
                            }
                        }
                        if($count_acceptance > 0) {
                            $row['id'] = $item->id;
                            $row['date'] = $item->date;
                            $row['residence_card_number'] = $item->residence_card_number;
                            $row['vip_fourth_name_1'] = $item->vip_fourth_name_1;
                            $row['vip_date_of_birth'] = date('d-m-Y', strtotime($item->vip_date_of_birth));
                            $row['vip_job_name'] = $item->vip_job_name;
                            $row['vip_phone_number'] = $item->vip_phone_number;

                            // Check user status VIP
                            $exist = new Check_user_status();
                            $exists = $exist->vip_check_user($item->id);

                            if($exists == 1) {
                                $row['action'] = '<button disabled="true">تدقيق</button>';
                            }else{
                                $row['action'] = '<a href="'. get_admin_url() .'admin.php?page=validate-app&id='. $item->id .'" class="button button-primary button-large">تدقيق</a>';
                            }

                            $role = 'national_security';
                            if(!empty($item->$role)) {
                                $inner_data = unserialize($item->$role);

                                foreach ($inner_data as $dt) {
                                    if(in_array($user_id,$dt, TRUE)) {
                                        $sts = $dt['status'];
                                    }
                                }
                            }
                            if($sts == 'accepted') {
                                $sts = 'مقبول';
                                $color = '#5b841b';
                            } else if($sts == 'rejected') {
                                $sts = 'مرفوض';
                                $color = 'red';
                            } else {
                                $sts = 'لم يتم التدقيق بعد';
                                $color = '#777';
                            }
                            $row['status'] = '<p style="color: '.$color.'">'.$sts.'</p>';
                            $data[] = $row;
                        }
                    } else {
                        // do nothing
                    }
                }else{
                    // do no thing
                }
            }
        } else {
            foreach ( $results as $item ) {
                $row['id'] = $item->id;
                $row['date'] = $item->date;
                $row['residence_card_number'] = $item->residence_card_number;
                $row['vip_fourth_name_1'] = $item->vip_fourth_name_1;
                $row['vip_date_of_birth'] = date('d-m-Y', strtotime($item->vip_date_of_birth));
                $row['vip_job_name'] = $item->vip_job_name;
                $row['vip_phone_number'] = $item->vip_phone_number;

                // Check user status VIP
                $exist = new Check_user_status();
                $exists = $exist->vip_check_user($item->id);

                if($exists == 1) {
                    $row['action'] = '<button class="button button-primary button-large" disabled="true">تعديل / تدقيق</button>';
                }else{
                    $row['action'] = '<a href="'. get_admin_url() .'admin.php?page=edit-app&id='. $item->id .'" class="button button-primary button-large" >تعديل / تدقيق</a>';
                }




                if(in_array('checker',$user_role)) {
                    $role = 'checker';
                } else {
                    $role = 'supervisor';
                }
                if(!empty($item->$role)) {
                    $inner_data = unserialize($item->$role);

                    foreach ($inner_data as $dt) {
                        if(in_array($user_id,$dt, TRUE)) {
                            $sts = $dt['status'];
                        }
                    }
                }
                if($sts == 'accepted') {
                    $sts = 'مقبول';
                    $color = '#5b841b';
                } else if($sts == 'rejected') {
                    $sts = 'مرفوض';
                    $color = 'red';
                } else {
                    $sts = 'لم يتم التدقيق بعد';
                    $color = '#777';
                }
                $row['status'] = '<p style="color: '.$color.'">'.$sts.'</p>';
                $data[] = $row;
            }
        }

        $current_page = $this->get_pagenum();
        $total_items = count( $data );
        $data = array_slice( $data, ( ( $current_page - 1 ) * $per_page ), $per_page );
        $this->items = $data;

        $columns  = $this->get_columns();
        $hidden   = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array( $columns, $hidden, $sortable );

        function usort_reorder($a, $b)
        {
            // If no sort, default to
            $orderby = (!empty($_GET['orderby'])) ? $_GET['orderby'] : 'date';

            // If no order, default to desc
            $order = (!empty($_GET['order'])) ? $_GET['order'] : 'desc';

            // Determine sort order
            $result = strcmp($a[$orderby], $b[$orderby]);

            // Send final sort direction to usort
            return ($order === 'asc') ? $result : -$result;
        }

        usort($this->items, 'usort_reorder');

        // pagination
        $this->set_pagination_args( array(
            'total_items' => $total_items,
            'per_page'    => $per_page,
            'total_pages' => ceil( $total_items / $per_page ),
        ) );
    }

    public function column_default( $item, $column_name ) {
        switch ( $column_name ) {
            default:
                return $item[$column_name];
        }
    }
}