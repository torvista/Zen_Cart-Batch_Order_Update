<?php

/**
 * Plugin Batch Order Update
 * @link https://github.com/torvista/Zen_Cart-Batch_Order_Update
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author torvista
 * @version 9 May 2025 torvista
 */

declare(strict_types=1);

/**
 * @class zcObserverPluginBatchOrderUpdate
 */
class zcObserverPluginBatchOrderUpdate extends base
{
    public function __construct()
    {
        $this->attach($this, [
            'NOTIFY_ADMIN_ORDERS_LIST_EXTRA_COLUMN_HEADING', // add the column heading Batch Update
            'NOTIFY_ADMIN_ORDERS_LIST_EXTRA_COLUMN_DATA'     // add a Batch Update checkbox for each order
        ]);
    }

    /**
     * @param $class
     * @param $eventID
     * @param $p1
     * @param $extra_headings
     * @return void
     */
    public function notify_admin_orders_list_extra_column_heading(&$class, $eventID, $p1, &$extra_headings): void
    {
        if (!empty($_GET['statusFilterSelect'])) {
            //check if another observer has already created this array
            if ($extra_headings === false) {
                $extra_headings = [];
            }
            $extra_headings[] = ['align' => 'center', 'text' => BATCH_HEADING_UPDATE];
        }
    }

    /**
     * @param $class
     * @param $eventID
     * @param $p1
     * @param $p2
     * @param $extra_data
     * @return void
     */
    public function notify_admin_orders_list_extra_column_data(&$class, $eventID, $p1, &$p2, &$extra_data): void
    {
        if (!empty($_GET['statusFilterSelect'])) {
            if ($extra_data === false) {
                $extra_data = [];
            }
            $batch_status_update_checkbox = zen_draw_checkbox_field(
                'batch_status_update[]',
                $p2['orders_id'],
                false,
                '',
                'id="batchStatusUpdateCheckbox_' . $p2['orders_id'] . '" class="batchStatusUpdateCheckbox"'
            );
            $extra_data[] = ['align' => 'center dataTableButtonCell', 'text' => $batch_status_update_checkbox];
        }
    }
}

/**
 *  Return a pull-down menu of the available order-status values,
 *  optionally prefixed by a "please choose" selection.
 *  Copied from zen_draw_order_status_dropdown but with an extra parameter to omit the current selection
 *
 * @param $field_name
 * @param $default_value
 * @param  array|string  $first_selection
 * @param  string  $parms
 * @param  string  $omit
 * @return string
 */
function batch_draw_order_status_dropdown($field_name, $default_value, array|string $first_selection = '', string $parms = '', string $omit = ''): string
{
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
        if ($status['id'] === $omit) continue;
        //eof
        $statuses_array[] = [
            'id' => $status['id'],
            'text' => "{$status['text']} [{$status['id']}]"
        ];
    }
    return zen_draw_pull_down_menu($field_name, $statuses_array, $default_value, $parms);
}
if (!function_exists('mv_printVar')) {
    /**
     * @param $a
     * function generates formatted debugging output
     */
    function mv_printVar($a): void
    {
        $backtrace = debug_backtrace()[0];
        $fh = fopen($backtrace['file'], 'rb');
        $line = 0;
        $code = '';
        while (++$line <= $backtrace['line']) {
            $code = fgets($fh);
        }
        fclose($fh);
        if ($code !== false) {
            preg_match('/' . __FUNCTION__ . '\s*\((.*)\)\s*;/u', $code, $name);
        } else {
            $name = '';
        }
        echo '<pre>';
        if (!empty($name[1])) {
            echo '<strong>' . trim($name[1]) . '</strong> (' . gettype($a) . "):\n";
        }
        //var_export($a);
        print_r($a);
        echo '</pre><br>';
    }
}
