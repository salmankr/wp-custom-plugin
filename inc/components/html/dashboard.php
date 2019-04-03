<?php
/**
 * @package customPlugin
 */

namespace Inc\components\html;

class dashboard{

	/**
	 * Plugin's main dashboard render function
	 * @return [html] [admin dashboard html]
	 */
	public function html(){

		?>
        <div class="wrap">
        	<h1>Custom Plugin Dashboard</h1>
        	<?php settings_errors(); ?>
            <p>This is just a custom plugin test</p>
        	<form method="post" action="options.php">
        		<?php 
        			settings_fields( 'first_name' );
        			settings_fields( 'last_name' );
        			$f_name_val = esc_attr( get_option('first_name') );
        			$l_name_val = esc_attr( get_option('last_name') );
        				?>
        				<label>First Name</label>
        			    <input type="text" name="first_name" value="<?php echo $f_name_val; ?>"><br>

    			    	<label>Last Name</label>
    			        <input type="text" name="last_name" value="<?php echo $l_name_val; ?>">
        			    <?php
        			submit_button();
        		?>
        	</form>
        </div>
		<?php
	}
}
