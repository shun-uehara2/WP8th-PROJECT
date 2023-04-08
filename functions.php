<?php
/**
 * Lightning Child theme functions
 *
 * @package lightning
 */

/************************************************
 * 独自CSSファイルの読み込み処理
 *
 * 主に CSS を SASS で 書きたい人用です。 素の CSS を直接書くなら style.css に記載してかまいません.
 */

// 独自のCSSファイル（assets/css/）を読み込む場合は true に変更してください.
$my_lightning_additional_css = true;

if ( $my_lightning_additional_css ) {
	// 公開画面側のCSSの読み込み.
	add_action(
		'wp_enqueue_scripts',
		function() {
			wp_enqueue_style(
				'my-lightning-custom',
				get_stylesheet_directory_uri() . '/assets/css/style.css',
				array( 'lightning-design-style' ),
				filemtime( dirname( __FILE__ ) . '/assets/css/style.css' )
			);
		}
	);
	// 編集画面側のCSSの読み込み.
	add_action(
		'enqueue_block_editor_assets',
		function() {
			wp_enqueue_style(
				'my-lightning-editor-custom',
				get_stylesheet_directory_uri() . '/assets/css/editor.css',
				array( 'wp-edit-blocks', 'lightning-gutenberg-editor' ),
				filemtime( dirname( __FILE__ ) . '/assets/css/editor.css' )
			);
		}
	);
}

/************************************************
 * 独自の処理を必要に応じて書き足します
 */
/************************************************
 * JSの読み込み用コードを作成します。
 */


function enqueue_child_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('custom-styles', get_stylesheet_directory_uri().'/custom-styles.css');
}

add_action('wp_enqueue_scripts', 'enqueue_child_styles');

function enqueue_child_scripts() {
    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri().'/custom-scripts.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_child_scripts');

/************************************************
 * カスタム投稿タイプ用コードを作成します。
 */

 function create_song_post_type() {
    $labels = array(
        'name'               => _x('曲', 'post type general name', 'lightning-child'),
        'singular_name'      => _x('曲', 'post type singular name', 'lightning-child'),
        'menu_name'          => _x('曲', 'admin menu', 'lightning-child'),
        'name_admin_bar'     => _x('曲', 'add new on admin bar', 'lightning-child'),
        'add_new'            => _x('新しい曲を追加', 'song', 'lightning-child'),
        'add_new_item'       => __('新しい曲を追加', 'lightning-child'),
        'new_item'           => __('新しい曲', 'lightning-child'),
        'edit_item'          => __('曲を編集', 'lightning-child'),
        'view_item'          => __('曲を表示', 'lightning-child'),
        'all_items'          => __('すべての曲', 'lightning-child'),
        'search_items'       => __('曲を検索', 'lightning-child'),
        'parent_item_colon'  => __('曲:', 'lightning-child'),
        'not_found'          => __('曲が見つかりませんでした。', 'lightning-child'),
        'not_found_in_trash' => __('ゴミ箱に曲が見つかりませんでした。', 'lightning-child')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('曲の詳細とその他の情報。', 'lightning-child'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'song'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

    register_post_type('song', $args);
}

add_action('init', 'create_song_post_type');







function my_rest_song_query($args, $request) {
    $level = $request->get_param('level');

    if (!empty($level)) {
        $args['meta_query'] = array(
            array(
                'key' => 'song-level',
                'value' => $level,
                'compare' => 'LIKE'
            )
        );
    }

    return $args;
}
add_filter('rest_song_query', 'my_rest_song_query', 10, 2);

