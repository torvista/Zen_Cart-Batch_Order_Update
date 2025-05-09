<?php
declare(strict_types=1);

/**
 * Class zcObserverZzMvOrders
 */
class zcObserverPluginBatchOrderUpdate extends base
{
    public function __construct()
    {
        $this->attach($this, [
            //'NOTIFY_ADMIN_ORDERS_SEARCH_PARMS', //add extra fields, search in comments
            // 'NOTIFY_ADMIN_ORDERS_ADDRESS_FOOTERS', //add tax id
            'NOTIFY_ADMIN_ORDERS_LIST_EXTRA_COLUMN_HEADING', //add Mobile Order, country
            'NOTIFY_ADMIN_ORDERS_LIST_EXTRA_COLUMN_DATA' //as above
        ]);
    }

    function notify_admin_orders_list_extra_column_heading(&$class, $eventID, $p1, &$p2)
    {
        if (!empty($_GET['statusFilterSelect'])) {
            $p2[] = ['align' => 'center', 'text' => TEXT_BATCH_UPDATE];
        }
    }

    function notify_admin_orders_list_extra_column_data(&$class, $eventID, $p1, &$p2, &$p3)
    {
        if (!empty($_GET['statusFilterSelect'])) {
            $batch_status_update_checkbox = zen_draw_checkbox_field('batch_status_update[]', $p2['orders_id'], false, '',
                'id="batchStatusUpdateCheckbox_' . $p2['orders_id'] . '" class="batchStatusUpdateCheckbox"');
            $p3[] = ['align' => 'center dataTableButtonCell', 'text' => $batch_status_update_checkbox];
        }
    }
}
