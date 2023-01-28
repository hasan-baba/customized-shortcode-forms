<?php

function all_identification_applications(){
    $identification_application = new Identification_List_Table();
    $identification_application->prepare_items();
    if(isset($_GET['filter_option'])) {
        $selected = $_GET['filter_option'];
    }else{
        $selected = 'pending';
    }
    ?>

    <div class="wrap">
        <div style="text-align: end;">
            <h1 class="wp-heading-inline"><?php echo esc_html(get_admin_page_title()); ?></h1>
        </div>
        <div>
            <form id="" method="get">
                <div class="status-filters" style="float: left;">
                    <select name="filter_option">
                        <option value="pending" <?php echo ($selected == 'pending') ? 'selected' : '' ?>>الطلبات الجديدة</option>
                        <option value="accepted" <?php echo ($selected == 'accepted') ? 'selected' : '' ?>>الطلبات المقبولة</option>
                        <option value="rejected" <?php echo ($selected == 'rejected') ? 'selected' : '' ?>>الطلبات المرفوضة</option>
                    </select>
                    <input type="submit" class="button action" value="بحث الحالة">
                </div>
                <input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
                <?php $identification_application->search_box('Search', 'search') ?>
                <?php $identification_application->display(); ?>
                <?php $identification_application->get_user_role(); ?>
            </form>
        </div>
    </div>
<?php }