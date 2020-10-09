<?php
/**
 * Plugin Name: Listudy Chess Tactics
 * Plugin URI: https://github.com/ArneVogel/wp-tactics
 * Description: Add chess tactics to your posts with shortcodes
 * Version: 0.1
 * Text Domain: chess-puzzle
 * Author: Arne Vogel
 * Author URI: https://listudy.org
 */
 
 function tactic($atts) {
    $fen = empty($atts["fen"]) ? 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1' : $atts["fen"];
    $moves = empty($atts["moves"]) ? 'e4 e5 Ke2' : $atts["moves"];
    $color = empty($atts["color"]) ? 'white' : $atts["color"];
    $last_move = empty($atts["last_move"]) ? '' : $atts["last_move"];
    $width = empty($atts["width"]) ? '400' : $atts["width"];
    $board_bg = empty($atts["board_bg"]) ? 'blue' : $atts["board_bg"];
    $css = empty($atts["css"]) ? '' : '<link rel=&quot;stylesheet&quot; href=&quot;' . $atts["css"] . '&quot; />';
    $credit = empty($atts["nocredit"]) ? '<span class=&quot;float_right&quot;>Powered by: <a target=&quot;_blank&quot; rel=&quot;noopener&quot; href=&quot;https://listudy.org/en&quot;>listudy.org</a></span>' : '';

	$Content = "<iframe style=\"width:". $width ."px;\" frameborder=0 height='". ($width+80) ."' width='". $width ."' srcdoc='
<!DOCTYPE html>
<html class=&quot;". $board_bg ." cburnett&quot;>
  <head>
    <meta charset=&quot;utf-8&quot;/>
    <meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;/>
    <meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/>
    <link rel=&quot;stylesheet&quot; href=&quot;". plugins_url( 'static/chessground.css' , __FILE__ ) ."&quot; />
    ". $css ."
<script>
window.sound_enabled = false;
</script>
<style>
.float_right {
    float: right;
}
.hidden {
    display: none;
}
</style>
  </head>
  <body>
<form class=&quot;hidden&quot;>
<input type=&quot;text&quot; id=&quot;fen&quot; value=&quot;". $fen ."&quot;>
<input type=&quot;text&quot; id=&quot;color&quot; value=&quot;". $color ."&quot;>
<input type=&quot;text&quot; id=&quot;moves&quot; value=&quot;". $moves ."&quot;>
<input type=&quot;text&quot; id=&quot;last_move&quot; value=&quot;". $last_move ."&quot;>
</form>
<main role=&quot;main&quot; class=&quot;container&quot;>
<div class=&quot;with_sidebar&quot;>
  <div id=&quot;game_container&quot; class=&quot;sidebar_main&quot;>
    <div class=&quot;chessboard cg-wrap cg-board-wrap orientation-white manipulable &quot; id=&quot;chessground&quot;></div>
  </div>
  <p>
<div>
  <span id=&quot;success&quot; class=&quot;hidden&quot;>
    <span id=&quot;success_symbol&quot;></span>
    <b id=&quot;success_bold&quot;></b>
    <span id=&quot;success_text&quot;></span>
  </span>
</div>
<div>
  <span id=&quot;info&quot; class=&quot;hidden&quot;>
    <span id=&quot;info_symbol&quot;></span>
    <b id=&quot;info_bold&quot;></b>
    <span id=&quot;info_text&quot;></span>
  </span>
</div>
<div>
  <span id=&quot;error&quot; class=&quot;hidden&quot;>
    <span id=&quot;error_symbol&quot;></span>
    <b id=&quot;error_bold&quot;></b>
    <span id=&quot;error_text&quot;></span>
  </span>
</div>
    ". $credit . "
  </p>
</div>

<script defer src=&quot;". plugins_url( 'static/tactics.js' , __FILE__ ) ."&quot;></script>
<script>
let i18n = {
    &quot;share_on&quot;: &quot;Share on&quot;
};
i18n.success = &quot;Tactic solved!&quot;;
i18n.wrong_move = &quot;Wrong Move.&quot;;
i18n.best_move = &quot;Best Move!&quot;;
i18n.keep_going = &quot;Keep going...&quot;;
i18n.your_turn = &quot;Your turn.&quot;;
i18n.keep_trying = &quot;Keep trying!&quot;;
i18n.find_the_best_white = &quot;Find the best move for white.&quot;;
i18n.find_the_best_black = &quot;Find the best move for black.&quot;;
</script>

    </main>
</html>
'></iframe>"; 
    return $Content;
}

add_shortcode('tactic', 'tactic');
