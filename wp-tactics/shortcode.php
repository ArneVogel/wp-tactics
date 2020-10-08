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
    $css = empty($atts["css"]) ? 'empty' : '<link rel=&quot;stylesheet&quot; href=&quot;' . $atts["css"] . '&quot; />';
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
</style>
  </head>
  <body>
<main role=&quot;main&quot; class=&quot;container&quot;>
<div class=&quot;with_sidebar&quot;>
  <div id=&quot;game_container&quot; class=&quot;sidebar_main&quot;>
    <div class=&quot;chessboard cg-wrap cg-board-wrap orientation-white manipulable &quot; id=&quot;chessground&quot;></div>
  </div>
  <p>
  <span id=&quot;to_win&quot;><span id=&quot;color_span&quot;></span> to move and win!</span>
    ". $credit . "
  </p>
</div>

<script defer src=&quot;". plugins_url( 'static/tactics.js' , __FILE__ ) ."&quot;></script>
<script>
let i18n = {
    &quot;share_on&quot;: &quot;Share on&quot;
};
fen = &quot;". $fen."&quot;;
color = &quot;". $color."&quot;;
moves = &quot;". $moves."&quot;;
last_move = &quot;". $last_move."&quot;;
document.getElementById(&quot;color_span&quot;).innerText = color.charAt(0).toUpperCase() + color.slice(1);
i18n.success = &quot;Tactic solved&quot;;
i18n.wrong_move = &quot;Wrong Move&quot;;
</script>

    </main>
</html>
'></iframe>"; 
    return $Content;
}

add_shortcode('tactic', 'tactic');
