<?php

require_once("model/manager.php");

class ViewManager extends Manager
{

    public function alert($msg, $type)
    {
        ob_start(); ?>
        <div class="alert alert-<?= $type ?> mb-5" role="alert">
            <?= $msg ?>
        </div>
        <?php $alert = ob_get_clean();

        return $alert;
    }

}