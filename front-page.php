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
      <div class="level_tab level_tab-beginner" onclick="switchSongs('beginner')">
        <div class="level_tab_title">初級</div>
      </div>
      <div class="level_tab level_tab-intermediate" onclick="switchSongs('intermediate')">
        <div class="level_tab_title">中級</div>
      </div>
    </section>
    <section class="song_list">
      <!-- 初級の曲 -->
      <div class="song song-beginner">
        <div class="song_icon">
          <i class="fas fa-circle"></i>
        </div>
        <div class="song_title">初級曲1</div>
      </div>
      <div class="song song-beginner">
        <div class="song_icon">
          <i class="fas fa-circle"></i>
        </div>
        <div class="song_title">初級曲2</div>
      </div>
      <div class="song song-beginner">
        <div class="song_icon">
          <i class="fas fa-circle"></i>
        </div>
        <div class="song_title">初級曲3</div>
      </div>
      <!-- 中級の曲 -->
      <div class="song song-intermediate" style="display:none">
        <div class="song_icon">
          <i class="fas fa-circle"></i>
        </div>
        <div class="song_title">中級曲1</div>
      </div>
      <div class="song song-intermediate" style="display:none">
        <div class="song_icon">
          <i class="fas fa-circle"></i>
        </div>
        <div class="song_title">中級曲2</div>
      </div>
      <div class="song song-intermediate" style="display:none">
        <div class="song_icon">
          <i class="fas fa-circle"></i>
        </div>
        <div class="song_title">中級曲3</div>
      </div>
    </section>
  </main>

  <?php get_footer(); ?>
</body>
</html>
