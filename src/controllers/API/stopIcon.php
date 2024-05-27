<?php
// circle.php

// Get the digit from the GET request, default to '0' if not set
$digit = isset($_GET['digit']) ? htmlspecialchars($_GET['digit']) : '0';

// Set the Content-Type to image/svg+xml
header('Content-Type: image/svg+xml');

// Output the SVG code
echo <<<SVG
<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg">
    <!-- Draw a white circle with black border -->
    <circle cx="50" cy="50" r="45" stroke="black" stroke-width="6" fill="#337eff" />
    <!-- Draw the digit in the center of the circle -->
    <text x="48" y="55" font-family="Poppins" font-size="48" font-weight="900" fill="white" text-anchor="middle" dominant-baseline="middle">$digit</text>
</svg>
SVG;
