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
                        <form method="post" action="options.php">
                            <?php 
                            settings_fields( 'admin_settings_group' );
                            do_settings_sections( 'main_page' );
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
