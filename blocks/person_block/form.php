<?php  
defined('C5_EXECUTE') or die("Access Denied.");

$assetLib = Loader::helper('concrete/asset_library');
$bf = null;
$bfo = null;
$args = array();

$pic = false;
if ($imgID) {
	$pic = \File::getByID($imgID);
}
?>

<fieldset>
	<legend><?php echo t('Information'); ?></legend>
	<div class="form-group">
		<label class="control-label"><?php echo t('Name:'); ?></label>
		<input type="text" class="form-control" name="personName" value="<?php echo $personName; ?>">
	</div>
	<div class="form-group">
		<label class="control-label"><?php echo t('Description:'); ?></label>
		<input type="text" class="form-control" name="personDesc" value="<?php echo $personDesc; ?>">
	</div>
	<div class="form-group">
		<label class="control-label"><?php echo t('Image alt-text<br />(leave blank to auto-generate one from the name and description fields):'); ?></label>
		<input type="text" class="form-control" name="altText" value="<?php echo $altText; ?>">
	</div>
	<div class="form-group">
		<label class="control-label"><?php echo t('Link (optional):'); ?></label>
		<input type="text" class="form-control" name="personLink" value="<?php echo $personLink; ?>">
	</div>
</fieldset>

<fieldset>
	<legend>Add Photo</legend>
	<div class="form-group">
	<label class="control-label">Select Image:</label>
	<?php
		$service = Core::make('helper/concrete/file_manager');
		print $service->image('img', 'imgID', 'Select image', $pic);
	?>
	</div>
</fieldset>

