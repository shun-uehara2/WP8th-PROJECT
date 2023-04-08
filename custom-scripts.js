function switchSongs(level) {
    const beginnerSongs = document.querySelectorAll('.song-beginner');
    const intermediateSongs = document.querySelectorAll('.song-intermediate');
    const songIcons = document.querySelectorAll('.song_icon i');
  
    if (level === 'beginner') {
      beginnerSongs.forEach(song => song.style.display = 'flex');
      intermediateSongs.forEach(song => song.style.display = 'none');
      songIcons.forEach(icon => icon.style.color = '#9ccc65'); // アイコンの色を初級の背景色に変更
    } else if (level === 'intermediate') {
      beginnerSongs.forEach(song => song.style.display = 'none');
      intermediateSongs.forEach(song => song.style.display = 'flex');
      songIcons.forEach(icon => icon.style.color = '#42a5f5'); // アイコンの色を中級の背景色に変更
    }
  }
  