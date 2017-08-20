<?php
/**
 * Scroll Text Plugin Part - Text Fields
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 * @returned @vars in use: $plugin_dir
 */



?>

<fieldset class="form-group">
	<div class="scroll-atts"><a href="<?php echo $plugin_url . '&type=edit&slug=' . $_GET['slug'] . '&delete=' . $c; ?>">Delete Item</a></div>
	<label class="label-top" for="scroll-content[]">Scroll Text #<?php echo $c; ?>:</label>
	<textarea rows="5" cols="50" name="scroll-content[]" id="scroll-content"><?php echo $con; ?></textarea>
	<input type="hidden" name="slide-number[]" value="<?php echo $c; ?>">
</fieldset>