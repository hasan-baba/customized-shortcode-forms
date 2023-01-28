<?php

function all_vip_applications(){
    $vip_application = new Vip_List_Table();
    $vip_application->prepare_items();
    if(isset($_GET['filter_option'])) {
        $selected = $_GET['filter_option'];
    }else{
        $selected = 'pending';
    }
    ?>

    <div class="wrap" style="text-align: end;">
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
                <?php $vip_application->search_box('Search', 'search') ?>
                <?php $vip_application->display(); ?>
            </form>
        </div>
    </div>
<?php }