<?php
/**
* About Theme
*/
	add_action( 'admin_enqueue_scripts', 'eight_sec_admin_scripts_welcome' );
	function eight_sec_admin_scripts_welcome()
	{
		wp_enqueue_style( 'eight-sec-admin-welcome', get_template_directory_uri().'/welcome/admin.css' );
		wp_enqueue_script('eight-sec-admin-welcome', get_template_directory_uri().'/welcome/admin.js', array('jquery'),'1.0',true);
		wp_localize_script( 'eight-sec-admin-welcome', 'EightSecWelcomeObject', array(
			'admin_nonce'   => wp_create_nonce('eight_sec_plugin_installer_nonce'),
			'activate_nonce'    => wp_create_nonce('eight_sec_plugin_activate_nonce'),
			'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php' ) ),
			'activate_btn' => esc_html__('Activate', 'eight-sec'),
			'installed_btn' => esc_html__('Activated', 'eight-sec'),
			'demo_installing' => esc_html__('Installing Demo', 'eight-sec'),
			'demo_installed' => esc_html__('Demo Installed', 'eight-sec'),
			'demo_confirm' => esc_html__('Are you sure to import demo content ?', 'eight-sec'),
		) );
	}
	class Eight_Sec_About_Themes {
		public $eight_sec_req_plugins = array(); // For Storing the list of the Required Plugins
		public function __construct() {
			/* create dashbord page */
			add_action( 'admin_menu', array( $this, 'eight_sec_welcome_register_menu' ) );
			/* activation notice */
			add_action( 'load-themes.php', array( $this, 'eight_sec_activation_admin_notice' ) );

			/** List of required Plugins **/
			$this->eight_sec_req_plugins = array(
				'instant-demo-importer' => array(
					'slug' => 'instant-demo-importer',
					'name' => esc_html__('Instant Demo Importer', 'eight-sec'),
					'filename' =>'instant-demo-importer.php',
					'class' => 'Instant_Demo_Importer',
					'github_repo' => true,
					'bundled' => true,
					'location' => 'https://github.com/8degreethemes/instant-demo-importer/archive/master.zip',
					'info' => esc_html__('Instant Demo Importer Plugin adds the feature to Import the Demo Conent with a single click.', 'eight-sec'),
				),
			);

			/** Plugin Installation Ajax **/
			add_action( 'wp_ajax_eight_sec_plugin_installer', array( $this, 'eight_sec_plugin_installer_callback' ) );

			/** Plugin Installation Ajax **/
			add_action( 'wp_ajax_eight_sec_plugin_offline_installer', array( $this, 'eight_sec_plugin_offline_installer_callback' ) );

			/** Plugin Activation Ajax **/
			add_action( 'wp_ajax_eight_sec_plugin_activation', array( $this, 'eight_sec_plugin_activation_callback' ) );

			/** Plugin Activation Ajax (Offline) **/
			add_action( 'wp_ajax_eight_sec_plugin_offline_activation', array( $this, 'eight_sec_plugin_offline_activation_callback' ) );
		}
		public function eight_sec_welcome_register_menu() {
			$title = esc_html__( 'About Eight Sec', 'eight-sec' );

			add_theme_page( esc_html__( 'About Eight Sec', 'eight-sec' ), $title, 'edit_theme_options', 'eight-sec-about', array(
				$this,
				'eight_sec_about_theme_page'
			) );
		}
		public function eight_sec_about_theme_page() {
			require_once( ABSPATH . 'wp-load.php' );
			require_once( ABSPATH . 'wp-admin/admin.php' );
			require_once( ABSPATH . 'wp-admin/admin-header.php' );

			$eight_sec_lite      = wp_get_theme();
			$active_tab   = isset( $_GET['tab'] ) ? $_GET['tab'] : 'getting_started';
			?>

			<div class="wrap eight-sec-wrap">

				<div class="top-wrap">
					<div class="text-wrap">
						<h1><?php echo esc_html__( 'Welcome to Eight Sec! - Version ', 'eight-sec' ) . esc_html( $eight_sec_lite['Version'] ); ?></h1>

						<div
						class="about-text"><?php echo esc_html__( 'Eight Sec is now installed and ready to use! Get ready to build something beautiful. We hope you enjoy it! We want to make sure you have the best experience using Eight Sec and that is why we gathered here all the necessary information for you. We hope you will enjoy using Eight Sec, as much as we enjoy creating great products.', 'eight-sec' ); ?></div>
					</div>

					<div class="logo-wrap">
						
					</div>
				</div>

				<div class="bottom-block">
					<ul class="eight-sec-tab-wrapper wp-clearfix">
						<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=eight-sec-about&tab=getting_started' ) ); ?>"
							class="eight-sec-tab <?php echo $active_tab == 'getting_started' ? 'eight-sec-tab-active' : ''; ?>"><?php echo esc_html__( 'Getting Started', 'eight-sec' ); ?>

						</a></li>
						<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=eight-sec-about&tab=recommended_plugins' ) ); ?>"
							class="eight-sec-tab <?php echo $active_tab == 'recommended_plugins' ? 'eight-sec-tab-active' : ''; ?> "><?php echo esc_html__( 'Recommended Plugins', 'eight-sec' ); ?>

						</a></li>
						<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=eight-sec-about&tab=demo_import' ) ); ?>"
							class="eight-sec-tab <?php echo $active_tab == 'demo_import' ? 'eight-sec-tab-active' : ''; ?> "><?php echo esc_html__( 'Import Demo', 'eight-sec' ); ?>

						</a></li>
						<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=eight-sec-about&tab=support' ) ); ?>"
							class="eight-sec-tab <?php echo $active_tab == 'support' ? 'eight-sec-tab-active' : ''; ?> "><?php echo esc_html__( 'Support', 'eight-sec' ); ?>

						</a></li>
						<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=eight-sec-about&tab=changelog' ) ); ?>"
							class="eight-sec-tab <?php echo $active_tab == 'changelog' ? 'eight-sec-tab-active' : ''; ?> "><?php echo esc_html__( 'Changelog', 'eight-sec' ); ?>

						</a></li>
						<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=eight-sec-about&tab=more_wp' ) ); ?>"
							class="eight-sec-tab <?php echo $active_tab == 'more_wp' ? 'eight-sec-tab-active' : ''; ?> "><?php echo esc_html__( 'More WordPress Stuff', 'eight-sec' ); ?>

						</a></li>
					</ul>
					<div class="eight-sec-content-wrapper">
						<?php
						switch ( $active_tab ) {
							case 'getting_started':
							require_once get_template_directory() . '/welcome/step-first.php';
							break;
							case 'recommended_plugins':
							require_once get_template_directory() . '/welcome/step-second.php';
							break;
							case 'support':
							require_once get_template_directory() . '/welcome/step-third.php';
							break;
							case 'changelog':
							require_once get_template_directory() . '/welcome/step-fourth.php';
							break;
							case 'more_wp':
							require_once get_template_directory() . '/welcome/step-fifth.php';
							break;
							case 'demo_import':
							require_once get_template_directory() . '/welcome/step-demo.php';
							break;
							default:
							echo "Start";
							require_once get_template_directory() . '/welcome/step-first.php';
							break;
						}
						?>
					</div>
				</div>
			</div><!--/.wrap.about-wrap-->

			<?php
		}

		public function call_plugin_api( $slug ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );

			if ( false === ( $call_api = get_transient( 'eight_sec_plugin_information_transient_' . $slug ) ) ) {
				$call_api = plugins_api( 'plugin_information', array(
					'slug'   => $slug,
					'fields' => array(
						'downloaded'        => false,
						'rating'            => false,
						'description'       => false,
						'short_description' => true,
						'donate_link'       => false,
						'tags'              => false,
						'sections'          => true,
						'homepage'          => true,
						'added'             => false,
						'last_updated'      => false,
						'compatibility'     => false,
						'tested'            => false,
						'requires'          => false,
						'downloadlink'      => false,
						'icons'             => true
					)
				) );
				set_transient( 'eight_sec_plugin_information_transient_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

			return $call_api;
		}

		public function check_active( $slug ) {
			if(is_array($slug)){
				$slug = (isset($slug['slug']))?$slug['slug']:$slug['location'];
			}
			if ( file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $slug . '.php' ) ) {
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

				$needs = is_plugin_active( $slug . '/' . $slug . '.php' ) ? 'deactivate' : 'activate';
				$key = $slug . '/' . $slug . '.php';
				return array( 'status' => is_plugin_active( $slug . '/' . $slug . '.php' ), 'needs' => $needs, 'key'=>$key );
			}
			$all_plugins = get_plugins();
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			// echoes the main file plugin if it's active
			foreach($all_plugins as $key => $plugin) {
				$kerarr = explode('/',$key);
				if($kerarr[0]==$slug){
					if( is_plugin_active($key) ) {
						$needs = is_plugin_active( $key ) ? 'deactivate' : 'activate';
						return array( 'status' => is_plugin_active($key), 'needs' => $needs,'key'=>$key);
					}
				}
			}
			$key = $slug . '/' . $slug . '.php';
			return array( 'status' => false, 'needs' => 'install','key'=>$key );
		}

		public function check_for_icon( $arr ) {
			if ( ! empty( $arr['svg'] ) ) {
				$plugin_icon_url = $arr['svg'];
			} elseif ( ! empty( $arr['2x'] ) ) {
				$plugin_icon_url = $arr['2x'];
			} elseif ( ! empty( $arr['1x'] ) ) {
				$plugin_icon_url = $arr['1x'];
			} else {
				$plugin_icon_url = $arr['default'];
			}

			return $plugin_icon_url;
		}

		public function create_action_link( $state, $slug, $key ) {
			switch ( $state ) {
				case 'install':
				return wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'install-plugin',
							'plugin' => $slug
						),
						network_admin_url( 'update.php' )
					),
					'install-plugin_' . $slug
				);
				break;
				case 'deactivate':
				return add_query_arg( array(
					'action'        => 'deactivate',
					'plugin'        => rawurlencode( $key ),
					'plugin_status' => 'all',
					'paged'         => '1',
					'_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . $key ),
				), network_admin_url( 'plugins.php' ) );
				break;
				case 'activate':
				return add_query_arg( array(
					'action'        => 'activate',
					'plugin'        => rawurlencode( $key ),
					'plugin_status' => 'all',
					'paged'         => '1',
					'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $key ),
				), network_admin_url( 'plugins.php' ) );
				break;
			}
		}

		/**
		 * Adds an admin notice upon successful activation.
		 *
		 * @since 1.8.2.4
		 */
		public function eight_sec_activation_admin_notice() {
			global $pagenow;

			if ( is_admin() && ( 'themes.php' == $pagenow ) && isset( $_GET['activated'] ) ) {
				add_action( 'admin_notices', array( $this, 'eight_sec_welcome_admin_notice' ), 99 );
			}
		}

		/**
		 * Display an admin notice linking to the welcome screen
		 *
		 * @since 1.8.2.4
		 */
		public function eight_sec_welcome_admin_notice() {
			?>
			<div class="updated notice is-dismissible">
				<p><?php 
				/* translators: Theme description */
				echo sprintf( esc_html__( 'Welcome! Thank you for choosing Eight Sec! To fully take advantage of the best our theme can offer please make sure you visit our %1$swelcome page%2$s.', 'eight-sec' ), '<a href="' . esc_url( admin_url( 'themes.php?page=eight-sec-about' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=eight-sec-about' ) ); ?>" class="button"
					style="text-decoration: none;"><?php esc_html_e( 'Get started with Eight Sec', 'eight-sec' ); ?></a></p>
				</div>
				<?php
			}

		public function get_local_dir_path($plugin) {

			$url = wp_nonce_url(admin_url('themes.php?page=eight-sec-about&tab=demo_import'),'eight-sec-file-installation');
			if (false === ($creds = request_filesystem_credentials($url, '', false, false, null) ) ) {
				return; // stop processing here
			}

			if ( ! WP_Filesystem($creds) ) {
				request_filesystem_credentials($url, '', true, false, null);
				return;
			}

			global $wp_filesystem;
			$file = $wp_filesystem->get_contents( $plugin['location'] );

			$file_location = get_template_directory().'/welcome/demo/'.$plugin['slug'].'.zip';

			$wp_filesystem->put_contents( $file_location, $file, FS_CHMOD_FILE );

			return $file_location;
		}



		/* ========== Plugin Installation Ajax =========== */
		public function eight_sec_plugin_installer_callback(){

			if ( ! current_user_can('install_plugins') ){
				wp_die( esc_html__( 'Sorry, you are not allowed to install plugins on this site.', 'eight-sec' ) );
			}

			$nonce = $_POST["nonce"];
			$plugin = $_POST["plugin"];
			$plugin_file = $_POST["plugin_file"];

			// Check our nonce, if they don't match then bounce!
			if (! wp_verify_nonce( $nonce, 'eight_sec_plugin_installer_nonce' ))
				wp_die( esc_html__( 'Error - unable to verify nonce, please try again.', 'eight-sec') );


     		// Include required libs for installation
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
			require_once ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php';
			require_once ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php';

			// Get Plugin Info
			$api = $this->eight_sec_call_plugin_api($plugin);

			$skin     = new WP_Ajax_Upgrader_Skin();
			$upgrader = new Plugin_Upgrader( $skin );
			$upgrader->install($api->download_link);

			$plugin_file = ABSPATH . 'wp-content/plugins/'.esc_html($plugin).'/'.esc_html($plugin_file);

			if($api->name) {
				$main_plugin_file = $this->get_plugin_file($plugin);
				if($main_plugin_file){
					activate_plugin($main_plugin_file);
					echo "success";
					die();
				}
			}
			echo "fail";

			die();
		}

		/** Plugin Offline Installation Ajax **/
		public function eight_sec_plugin_offline_installer_callback() {


			$file_location = $_POST['file_location'];
			$file = $_POST['file'];
			$github = $_POST['github'];
			$slug = $_POST['slug'];
			$plugin_directory = ABSPATH . 'wp-content/plugins/';

			$zip = new ZipArchive;
			if ($zip->open(esc_html($file_location), ZIPARCHIVE::CREATE) === TRUE) {

				$zip->extractTo($plugin_directory);
				$zip->close();

				if($github) {
					rename(realpath($plugin_directory).'/'.$slug.'-master', realpath($plugin_directory).'/'.$slug);
				}

				activate_plugin($file);
				echo "success";
				die();
			} else {
				echo 'failed';
			}

			die();
		}

		/** Plugin Offline Activation Ajax **/
		public function eight_sec_plugin_offline_activation_callback() {

			$plugin = $_POST['plugin'];
			$plugin_file = ABSPATH . 'wp-content/plugins/'.esc_html($plugin).'/'.esc_html($plugin).'.php';

			if(file_exists($plugin_file)) {
				activate_plugin($plugin_file);
			} else {
				echo "Plugin Doesn't Exists";
			}

			die();

		}

		/** Plugin Activation Ajax **/
		public function eight_sec_plugin_activation_callback(){

			if ( ! current_user_can('install_plugins') )
				wp_die( esc_html__( 'Sorry, you are not allowed to activate plugins on this site.', 'eight-sec' ) );

			$nonce = $_POST["nonce"];
			$plugin = $_POST["plugin"];

			// Check our nonce, if they don't match then bounce!
			if (! wp_verify_nonce( $nonce, 'eight_sec_plugin_activate_nonce' ))
				die( esc_html__( 'Error - unable to verify nonce, please try again.', 'eight-sec' ) );


         	// Include required libs for activation
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
			require_once ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php';


			// Get Plugin Info
			$api = $this->eight_sec_call_plugin_api(esc_attr($plugin));


			if($api->name){
				$main_plugin_file = $this->get_plugin_file(esc_attr($plugin));
				$status = 'success';
				if($main_plugin_file){
					activate_plugin($main_plugin_file);
					$msg = $api->name .' successfully activated.';
				}
			} else {
				$status = 'failed';
				$msg = esc_html__('There was an error activating $api->name', 'eight-sec');
			}

			$json = array(
				'status' => $status,
				'msg' => $msg,
			);

			wp_send_json($json);

		}
	}
	new Eight_Sec_About_Themes();

		/** Initializing Demo Importer if exists **/
		if(class_exists('Instant_Demo_Importer')) :
			$demoimporter = new Instant_Demo_Importer();

			$demoimporter->demos = array(
				'corporate' => array(
					'title' => esc_html__('Eight Sec', 'eight-sec'),
					'name' => 'main',
					'screenshot' => 'https://8degreethemes.com/demo/eight-sec/eight-sec.jpg',
					'home_page' => 'home',
					'menus' => array(
						'Menu 1' => 'menu-1',
					)
				),
			);

		$demoimporter->demo_dir = get_template_directory().'/welcome/demo/'; // Path to the directory containing demo files
		$demoimporter->options_replace_url = ''; // Set the url to be replaced with current siteurl
		$demoimporter->option_name = ''; // Set the the name of the option if the theme is based on theme option
	endif;