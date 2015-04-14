<?php
$flashMessages = Yii::app()->user->getFlashes();
if ($flashMessages) {
    echo '<ul class="flashes">';
    foreach($flashMessages as $key => $message) {
        echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
    }
    echo '</ul>';
}
?>
<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>