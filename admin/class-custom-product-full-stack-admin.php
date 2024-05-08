<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://the-gujarati.free.nf
 * @since      1.0.0
 *
 * @package    Custom_Product_Full_Stack
 * @subpackage Custom_Product_Full_Stack/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_Product_Full_Stack
 * @subpackage Custom_Product_Full_Stack/admin
 * @author     Parth Dodiya <parthdodiya.dodiya@gmail.com>
 */
class Custom_Product_Full_Stack_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Product_Full_Stack_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Product_Full_Stack_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/custom-product-full-stack-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Product_Full_Stack_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Product_Full_Stack_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/custom-product-full-stack-admin.js', array( 'jquery' ), $this->version, false );

		wp_localize_script( $this->plugin_name , 'ajax_object',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' )
			)
		);

	}

	public function create_settings_page() {

		$page_title = 'Create Product';
		$menu_title = 'Products';
		$capability = 'manage_options';
		$slug = 'products';
		$callback = array($this, 'create_product_html');
		$icon = 'dashicons-products';
		$position = 25;
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);

	}

	public function create_product_html() {
		add_settings_section( 'products_section', 'Fill below form to create product', array(), 'products' );
	    ?>
		<div class="wrap">
			<h1>Create Product</h1>
			<?php settings_errors(); ?>
			<form method="POST" id="save_product">
				<?php
					// settings_fields( 'products' );
					do_settings_sections( 'products' );
				?>
				<input type="hidden" id="_wpnonce" name="_wpnonce" value="<?php echo wp_create_nonce("form_submit_nounce"); ?>">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row"><label for="title">Title*</label></th>
							<td><input name="title" type="text" id="title" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><label for="description">Description*</label></th>
							<td>
								<fieldset>
									<p>
										<textarea name="description" rows="10" cols="50" id="description" class="large-text code"></textarea>
									</p>
								</fieldset>
							</td>
						</tr>
						<tr>
							<th scope="row">Price</th>
							<td>
								<label for="users_can_register">
										<input name="price" type="text" id="price" class="regular-text">
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="country">Country</label>
							</th>
							<td>
								<select name="country" id="country">
									<option value="United States" selected="selected">United States</option>
									<option value="South Africa" lang="af">South Africa</option>
									<option value="Canada">Canada</option>
									<option value="UK">UK</option>
									<option value="India">India</option>
									<option value="Australia">Australia</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Argentina">Argentina</option>
									<option value="Chile">Chile</option>
									<option value="Colombia">Colombia</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Ecuador">Ecuador</option>
									<option value="República Dominicana">República Dominicana</option>
									<option value="Perú">Perú</option>
									<option value="Uruguay">Uruguay</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="México">México</option>
									<option value="Guatemala">Guatemala</option>
									</optgroup>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="email">E-mail</label></th>
							<td><input name="email" type="email" id="email" class="regular-text ltr"></td>
						</tr>
						<tr>
							<th scope="row"><label for="hobby">Hobby</label></th>
							<td>
								<fieldset>
									<label for="hobby">
										<input name="hobby[]" type="checkbox" id="hobby1" value="cricket"> Cricket
										<br>
										<input name="hobby[]" type="checkbox" id="hobby2" value="music"> Music
										<br>
										<input name="hobby[]" type="checkbox" id="hobby3" value="movies"> Movies
										<br>
										<input name="hobby[]" type="checkbox" id="hobby4" value="web_surfing"> Web Surfing
									</label>
								</fieldset>
							</td>
						</tr>
						<!-- <tr class="error-title" style="display: block;height: 20px;">
							<th scope="row">Title is required.</th>
						</tr>
                        <tr class="error-description" style="display: block;height: 20px;">
							<th scope="row">Description is required.</th>
						</tr>
                        <tr class="error-email" style="display: block;height: 20px;">
							<th scope="row">Please enter a valid email address.</th>
						</tr> -->
					</tbody>
				</table>
				<p class="submit"><button type="button" name="submit" id="submit" class="button button-primary">Save Changes</button></p>
				<table class="error">
					<tr class="error-title" style="display: none; height: 20px;">
						<th scope="row">Title is required.</th>
					</tr>
	                <tr class="error-description" style="display: none; height: 20px;">
						<th scope="row">Description is required.</th>
					</tr>
	                <tr class="error-email" style="display: none; height: 20px;">
						<th scope="row">Please enter a valid email address.</th>
					</tr>
				</table>
			</form>
		</div> <?php
	}

	public function save_product() {

		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit();

		// Check nonce for security
    	check_ajax_referer('form_submit_nounce', 'security');

    	// Validate and sanitize form data
	    $title = sanitize_text_field($_POST['data'][1]['value']);
	    $description = sanitize_textarea_field($_POST['data'][2]['value']);
	    $price = sanitize_text_field($_POST['data'][3]['value']);
	    $country = sanitize_text_field($_POST['data'][4]['value']);
	    $email = sanitize_email($_POST['data'][5]['value']);
	    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : array();

	    // echo "<pre>";
	    // print_r($title);
	    // echo "</pre>";
	    // exit();

	    // echo "<pre>";
	    // print_r($description);
	    // echo "</pre>";
	    // exit();
	    
	    

	    // Perform validation on the data
	    $errors = array();

	    if (empty($title)) {
	        $errors['title'] = 'Title is required.';
	    }

	    if (empty($description)) {
	        $errors['description'] = 'Description is required.';
	    }

	    if (empty($email) || !is_email($email)) {
	        $errors['email'] = 'Please enter a valid email address.';
	    }

	    // echo "<pre>";
	    // print_r($errors);
	    // echo "</pre>";
	    // exit();
	    

	    // Return response
	    if (!empty($errors)) {
	        wp_send_json_error($errors);
	    } else {
	        // insert the post
			$post_id = wp_insert_post(array (
			    'post_type' => 'product',
			    'post_title' => $title,
			    'post_content' => $description,
			    'post_status' => 'draft',
			    'comment_status' => 'closed',
			    'ping_status' => 'closed'
			));

			// echo "<pre>";
			// print_r($post_id );
			// echo "</pre>";
			// exit();
			

			if ($post_id) {
			    // insert post meta
			    add_post_meta($post_id, '_price', $price);
			    add_post_meta($post_id, '_country', $country);
			    add_post_meta($post_id, '_email', $email);
			    add_post_meta($post_id, '_hobbies', $hobbies);
			}

	        wp_send_json_success('Product created successfully.');
	    }

	    // Always use die() or exit after sending JSON response
	    die();

    }

    public function create_product() {

		$labels = array(
			'name'                  => _x( 'Products', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Product', 'text_domain' ),
			'name_admin_bar'        => __( 'Products', 'text_domain' ),
			'archives'              => __( 'Product Archives', 'text_domain' ),
			'attributes'            => __( 'Product Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Product', 'text_domain' ),
			'add_new_item'          => __( 'Add New Product', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Product', 'text_domain' ),
			'edit_item'             => __( 'Edit Product', 'text_domain' ),
			'update_item'           => __( 'Update Product', 'text_domain' ),
			'view_item'             => __( 'View Product', 'text_domain' ),
			'view_items'            => __( 'View Product', 'text_domain' ),
			'search_items'          => __( 'Search Product', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Products list', 'text_domain' ),
			'items_list_navigation' => __( 'Products list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Products list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Product', 'text_domain' ),
			'description'           => __( 'Custom Product', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-media-default',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'product', $args );

	}
	
}
