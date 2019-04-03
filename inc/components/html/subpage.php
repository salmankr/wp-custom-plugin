<?php
/**
 * @package customPlugin
 */

namespace Inc\components\html;

class subpage{

	/**
	 * Plugin's subpage render function
	 * @return [html] [subpage html]
	 */
	public function html(){
		settings_errors();
        ?>
        <h1>Dashboard Subpage</h1>
        <p>Custom field for Sub page</p>
        <form action="options.php" method="post">
        	<?php
            settings_fields( 'sub_option_grp' );
        	?>
        	<input type="text" name="sub_test_field" value="<?php echo esc_attr( get_option('sub_test_field') ) ?>">
        	<?php
            submit_button();
        	?>
        </form>
        <?php
	}
}
