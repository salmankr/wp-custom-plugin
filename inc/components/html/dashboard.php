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
        <div class="tabset">
            <!-- Tab 1 -->
            <input type="radio" name="tabset" id="tab1" aria-controls="settings" checked>
            <label for="tab1">Settings</label>
            <!-- Tab 2 -->
            <input type="radio" name="tabset" id="tab2" aria-controls="updates">
            <label for="tab2">Updates</label>
            <!-- Tab 3 -->
            <input type="radio" name="tabset" id="tab3" aria-controls="about">
            <label for="tab3">About</label>
          
            <div class="tab-panels">
                <section id="settings" class="tab-panel">
                    <div class="wrap">
                        <h1>Custom Plugin Dashboard</h1>
                        <?php settings_errors(); ?>
                        <p>This is just a custom plugin test</p>
                        <form method="post" action="options.php">
                            <?php 
                            wp_nonce_field();
                            settings_fields( 'admin_settings_group' );
                            // $checkbox_cpt = get_option('CPT_checkbox');
                            //     if ($checkbox_cpt == 'unchecked') {
                            //         $class_cpt = '';
                            //     }else{
                            //         $class_cpt = 'checked';
                            //     }

                            // $checkbox_metabox = get_option('metabox_checkbox');

                            ?>
                            <label class="checkbox-label">CPT</label>
                            <label class="switch">
                                <input type="checkbox" <?php echo (get_option('CPT_checkbox') == 'checked' ? 'checked' : ''); ?> name="CPT_checkbox">
                                <span class="slider round"></span>
                            </label>

                            <label class="checkbox-label">Metabox</label>
                            <label class="switch">
                                <input type="checkbox" <?php echo (get_option('metabox_checkbox') == 'checked' ? 'checked' : ''); ?> name="metabox_checkbox">
                                <span class="slider round"></span>
                            </label>
                            <?php
                            submit_button();
                            ?>
                        </form>
                    </div>
                </section>
                <section id="updates" class="tab-panel">
                    updates
                </section>
                <section id="about" class="tab-panel">
                    about
                </section>
            </div>
        </div>

		<?php
	}
}
