<?php
function import($file) {
		
		$file_contents = file_get_contents( $file );
		$import_data = json_decode( $file_contents, true );

		$options_to_import = $import_data['options']['of_options_pmc'];


		$option_value = maybe_unserialize( $options_to_import );

			delete_option( 'of_options_pmc' );
			add_option( 'of_options_pmc', $option_value, '', 'no' );

	
}




