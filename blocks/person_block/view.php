<?php

    defined('C5_EXECUTE') or die("Access Denied.");
    
    $c = Page::getCurrentPage();
        
        if($imgID) {
            // Create file object for image
            $f = \File::getByID($imgID);
            
        }

    if (!$content && is_object($c) && $c->isEditMode()) {
        // edit mode, display placeholder
        ?>
        <div class="ccm-edit-mode-disabled-item">
	        <?php 
	        	echo t('Person: ' . $personName);
	        	// Also alert the user if no image has been selected
	        	echo !is_object($f) ? "<br /><strong style='color: red;'>**NO IMAGE SELECTED**</strong>" : "";
	        ?>
        </div> 
<?php
	    }
	    else { 
	    	// normal block display
?>
			<div class="ci-block-person">
		    	<!-- optional URL -->
		       	<?php echo !empty($personLink) ? "<a href='$personLink' target='_blank'>" : ""; ?>
			    <div class="ci-block-person-wrapper-img">
			    <?php if (is_object($f)) { ?>
			       	<!-- Image -->
			       	<img src="<?php echo $f->getURL(); ?>" alt="<?php echo $altText; ?>" />
			    <?php } else { ?>
			    	<pre>Disculpe, imagen por venir</pre>
			   	<?php } ?>
				</div>
				
            <div class="ci-block-person-title">
                <p>
                    <strong><?php echo $personName; ?></strong>
                </p>
            <?php echo !empty($personDesc) ? "<p class='ci-block-person-title-description'>$personDesc</p>" : "";
            ?>
            </div>
            <?php echo !empty($personLink) ? "</a>" : ""; ?>
        </div>
<?php } ?>
<?php 