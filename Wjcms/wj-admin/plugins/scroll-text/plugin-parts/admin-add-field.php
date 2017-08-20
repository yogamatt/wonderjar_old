<?php
/**
 * Scroll Text Plugin Part - Add Text Field
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 * @returned @vars in use: $plugin_id, $plugin_name, $plugin_dir, $dir
 */



?>

<fieldset class="form-group">
	<label class="label-top" for="scroll-content[]">New Scroll Text Item:</label>
	<textarea rows="5" cols="50" name="scroll-content[]" id="scroll-content"></textarea>
	<input type="hidden" name="slide-number[]" value="<?php echo get_num_slides(); ?>">
	<input type="hidden" name="add-num-slides" value="1">
</fieldset>