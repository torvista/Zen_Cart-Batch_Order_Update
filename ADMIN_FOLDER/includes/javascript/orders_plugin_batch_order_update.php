<?php

/**
 * Plugin Batch Order Update
 * @link https://github.com/torvista/Zen_Cart-Batch_Order_Update
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author torvista
 * @version 9 May 2025 torvista
 */

declare(strict_types=1);
?>
<script>
    $(function () {
        <?php
        // Select all checkboxes
        if (!empty($_GET['statusFilterSelect'])) { ?>
        $('#batchSelectAll').on('click', function (e) {
            $('[id^=batchStatusUpdateCheckbox_]').prop('checked', $(e.target).prop('checked'));
        });

        // Prevent Submit if no checkbox is selected or no status selected
        $("#batchStatusUpdateForm").submit(function (event) {
            let checkboxSelected = false;
            let statusSelected = false;
            let message = '';
            if ($('.batchStatusUpdateCheckbox:checked').length) {
                checkboxSelected = true;
            } else {
                message = ("<?= BATCH_TEXT_NO_CHECKBOX_SELECTED ?>");
            }
            if ($("#statusUpdateSelectBatch").val() === '') {
                message += ("\n" + "<?= BATCH_TEXT_NO_STATUS_SELECTED; ?>");
            } else {
                statusSelected = true;
            }
            if (checkboxSelected && statusSelected) {
                //alert("allowed");
                //event.preventDefault();
            } else {
                alert(message);
                event.preventDefault();
            }
        });
        <?php } ?>
    })
</script>
