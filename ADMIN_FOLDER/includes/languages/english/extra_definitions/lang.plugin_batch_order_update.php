<?php

/**
 * Plugin Batch Order Update
 * @link https://github.com/torvista/Zen_Cart-Batch_Order_Update
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author torvista
 * @version 9 May 2025 torvista
 */

declare(strict_types=1);

$define = [
    'BATCH_HEADING_TITLE' => 'Batch Order Update',
    'BATCH_HEADING_UPDATE' => 'Batch Update?',
    'BATCH_TEXT_NO_CHECKBOX_SELECTED' => 'Error: no Order checkbox selected!',
    'BATCH_TEXT_NO_STATUS_SELECTED' => 'Error: no new Order Status selected!',
    'BATCH_TEXT_SELECT_ALL' => 'Select All',
    'BATCH_TEXT_SELECT_NEW_STATUS' => 'Select new status for selected Orders',
    'BATCH_TEXT_STATUS_UPDATE' => 'Update Selected Orders',
    //core constants modified to include order #
    'SUCCESS_ORDER_UPDATED' => 'Success: order %s has been updated.',
    'WARNING_ORDER_NOT_UPDATED' => 'Warning: Nothing to change. Order %s was not updated.',
    ];

return $define;
