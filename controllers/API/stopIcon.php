<?php
header("Content-type: image/svg+xml");

// Get the color from the query string
$color = isset($_GET['color']) ? $_GET['color'] : '000000';
$svg = '<?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
    "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
    width="180.000000pt" height="260.000000pt" viewBox="0 0 180.000000 260.000000"
    preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,260.000000) scale(0.100000,-0.100000)"
fill="#' . $color . '" stroke="none">
<path d="M737 2554 c-350 -63 -634 -348 -701 -703 -27 -140 -16 -316 34 -526
94 -402 349 -834 714 -1210 l116 -120 90 95 c489 513 760 1047 786 1550 31
573 -473 1016 -1039 914z m47 -396 c14 -20 16 -80 16 -463 0 -507 4 -485 -81
-485 -97 0 -89 -43 -89 485 0 527 -8 484 87 485 42 0 55 -4 67 -22z m367 12
c18 -10 19 -26 19 -475 0 -528 8 -485 -89 -485 -85 0 -81 -22 -81 485 0 507
-4 485 81 485 28 0 59 -5 70 -10z"/>
</g>
</svg>';


echo $svg;
