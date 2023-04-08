<?php
/*
Template Name: Custom Page Template
*/

get_header(); ?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>サンプルページ</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="/styles.css">

  <!-- Font Awesomeの追加 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
  <!-- JavaScriptの追加 -->
  <script src="scripts.js" defer></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/custom.js"></script>


</head>






<body>
  <main>
    <section class="level_wrap">
      <div class="level_tab level_tab-beginner " onclick="switchSongs('beginner')">
        <div class="level_tab_title">初級</div>
      </div>

      <div class="level_tab level_tab-intermediate" onclick="switchSongs('intermediate')">
        <div class="level_tab_title">中級</div>
      </div>
    </section>





    <section class="song_list">
  <!-- 初級の曲 -->
  <?php
    $args_beginner = array(
      'post_type' => 'song',
      'meta_query' => array(
        array(
          'key' => 'song-level',
          'value' => 'beginner',
          'compare' => 'LIKE'
        )
      )
    );

    $beginner_songs = new WP_Query($args_beginner);

    if($beginner_songs->have_posts()) {
      while($beginner_songs->have_posts()) {
        $beginner_songs->the_post();
        $song_title = get_field('song-title');
        ?>
        <div class="song song-beginner">
          <div class="song_icon">
            <i class="fas fa-circle"></i>
          </div>
          <div class="song_title"><?php echo esc_html($song_title); ?></div>
        </div>
        <?php
      }
      wp_reset_postdata();
    }
  ?>
  
  <!-- 中級の曲 -->
  <?php
    $args_intermediate = array(
      'post_type' => 'song',
      'meta_query' => array(
        array(
          'key' => 'song-level',
          'value' => 'intermediate',
          'compare' => 'LIKE'
        )
      )
    );

    $intermediate_songs = new WP_Query($args_intermediate);

    if($intermediate_songs->have_posts()) {
      while($intermediate_songs->have_posts()) {
        $intermediate_songs->the_post();
        $song_title = get_field('song-title');
        ?>
        <div class="song song-intermediate">
          <div class="song_icon">
            <i class="fas fa-circle"></i>
          </div>
          <div class="song_title"><?php echo esc_html($song_title); ?></div>
        </div>
        <?php
      }
      wp_reset_postdata();
    }
  ?>
</section>

  </main>

  <?php get_footer(); ?>
</body>
</html>
