<?php
/** Plugin Batch Order Update
 * @copyright Copyright 2003-2021 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

/**
 * Return a pull-down menu of the available order-status values,
 * optionally prefixed by a "please choose" selection.
 * copied from zen_draw_order_status_dropdown but with extra parameter to omit current selection
 */
function btc_draw_order_status_dropdown($field_name, $default_value, $first_selection = '', $parms = '', $omit = '') {
    global $db;
    $statuses = $db->Execute(
            "SELECT orders_status_id AS `id`, orders_status_name AS `text`
            FROM " . TABLE_ORDERS_STATUS . "
            WHERE language_id = " . (int) $_SESSION['languages_id'] . "
            ORDER BY sort_order ASC, orders_status_id ASC"
    );
    $statuses_array = [];
    if (is_array($first_selection)) {
        $statuses_array[] = $first_selection;
    }
    foreach ($statuses as $status) {
        //skip an option
        if ($status['id']===$omit) continue;
        //eof
        $statuses_array[] = [
                'id' => $status['id'],
                'text' => "{$status['text']} [{$status['id']}]"
        ];
    }
    return zen_draw_pull_down_menu($field_name, $statuses_array, $default_value, $parms);
}