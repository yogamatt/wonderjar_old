<?php
/**
 * Scroll Text Plugin Part - Text Fields
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 * @returned @vars in use: $plugin_id, $plugin_name, $plugin_dir, $dir
 */



?>

<fieldset class="form-group">
	<label class="label-top" for="scroll-content[]">Scroll Text #<?php echo $c; ?>:</label>
	<textarea rows="5" cols="50" name="scroll-content[]" id="scroll-content-"><?php echo $scroll['content']; ?></textarea>
	<input type="hidden" name="slide-number[]" value="<?php echo $c; ?>">
</fieldset>