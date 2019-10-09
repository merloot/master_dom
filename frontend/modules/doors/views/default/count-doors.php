<?php

//\Yii::$app->response->format = 'json';
?>
<form method="post" action="<?=\yii\helpers\Url::to('create')?>">
    <textarea name="count" id="count"></textarea>
    <input type="submit" value="Send" />
</form>

