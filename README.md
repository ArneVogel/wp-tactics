# Wordpress Chess Tactics
Add tactics/puzzles to your wordpress site.

This plugin adds the shortcode `tactic` which can be used to add an interactive chess tactic to posts.

## Install
A installable `.zip` can be found in the `bin` folder: [tactics.zip](https://github.com/ArneVogel/wp-tactics/blob/main/bin/tactics.zip).

## Usage
Example usage:

`[tactic fen="r3k3/pppb4/6N1/3Pp3/N3n2b/8/PP1P2PP/R1B2K1R b q - 0 17" last_move="h8g6" moves="Bb5+ d3 Bxd3+ Kg1 Bf2#" color="black" width="500"]`

Required parameters: `fen, moves, color`,
optional parameters: `last_move, width`

* `fen` any possible position as fen
* `moves` chess moves that solve the tactic in san notation, case sensitive
* `last_move` optional move that happened before the fen position occured
* `color` for which side the tactic is, possibe values: `black` or `white`, case sensitive
* `width` the width the chessboard should have in pixels, example `400` for a 400px big board, dont add the `px` yourself.
