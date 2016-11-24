<?php
// Add new input type "radio"
if ( function_exists('smile_add_input_type'))
{
	smile_add_input_type('radio' , 'radio_button_settings_field' );
}

/**
* Function to handle new input type "radio"
*
* @param $settings		- settings provided when using the input type "radio"
* @param $value			- holds the default / updated value
* @return string/html 	- html output generated by the function
*/
function radio_button_settings_field($name, $settings, $value)
{
	$input_name = $name;
	$type = isset($settings['type']) ? $settings['type'] : '';
	$class = isset($settings['class']) ? $settings['class'] : '';
	$options = isset($settings['options']) ? $settings['options'] : '';
	$output = '';
	$n = 0;
	foreach ( $options as $text_val => $val ) {
		if ( is_numeric( $text_val ) && ( is_string( $val ) || is_numeric( $val ) ) ) {
			$text_val = $val;
		}
		$text_val = __( $text_val, "smile" );
		$checked = '';
		if ( $value !== '' && (string)$val === (string)$value ) {
			$checked = ' checked="checked"';
		}
		$output .= '<input type="radio" name="' . $input_name . '" value="'.$val.'" id="smile_'.$input_name.'_'.$n.'" class="form-control smile-input smile-'.$type.' ' . $input_name . ' ' . $type . '" '.$checked.'> <label for="smile_'.$input_name.'_'.$n.'">'.$text_val.'</label>';
		$n++;
	}
	return $output;
}