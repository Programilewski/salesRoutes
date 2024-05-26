<?php
header("Content-type: image/svg+xml");

// Get the color from the query string
$color = isset($_GET['color']) ? $_GET['color'] : '000000';
$svg = '
<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 415 583" width="415" height="583">
	<title>store_icon</title>
	<defs>
		<image width="413" height="572" id="img1" href="data:image/png;base64,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du2KefPmGb+SLNByEMySYofoSGQCiVCQWwoVKgSJZlq5cmVLnGKlJEACJEACkQns3bsXF154IWSJzVAkC7RcebGk2CE6YvgsALr1NIk6LdGnWUiABEiABOwnMH78eMjdSUORlamQh2ZaZ5fohITFkfw6GzduZORpM3uTdZEACZBAlATq168PCcRsKDITGBtlFXG9ZpfoVAeww2jh2rVr0bhx47gM50ckQAIkQALxEQgT9kYqk9BlW+KrNbqv7BIdsUayuOnW0wYOHIgJEyZEZynfIgESIAESMIXAsGHDMG7cONuX1qRBO0XnLwBe1Xop58MluVtqaqopIFkJCZAACZBAZAJycKB69erYvXu38UVLwt4YG7FTdKTttTn3dnTraTNmzECvXr04TkiABEiABGwgkJmZiS5ddLGYpdVMY4Bmq0yxW3QkjbWks84tvLNjVdeyXhIgARIIJRDmbs5EAGl28LJbdG4CsFTrGO/s2NHNbIMESIAEgH379qFSpUqquzmdAcy3g5HdoiM+zQCgW0/jnR07upptkAAJ+J1Asu7maLknQ3SUd3Y2bNgAmfWwkAAJkAAJWEMgWXdzki06yjs7q1atwg033GANadZKAiRAAj4nsH79ejRoINmnQ4rld3OSLTrSfsidHTnBNm3aNAYB9fkPBt0nARKwhkD//v0xZcoUY+WWh70xNpiM5TWxQRK76TK5FS1aFDt37gwEoGMhARIgARIwj8CBAwcCAZaPHTtmrHQwgH+b11LeNSVLdMSyVQB062lPP/00RowYkbfVfIMESIAESCBqAk44QHDO2GSKzhAAL2up1ahRAxITKCUlJWqYfJEESIAESCA8gezsbEiA5S+++ML4kuXBPVVWJVN0LgOw02jUO++8A7m8xEICJEACJJA4gSVLlqBdO0lrFlJsPUDghJmO2PA0AN16mkQoePfdd1GgQIHEabMGEiABEvA5gTARCGw/QOAU0ekE4F3tmChYsCA+//xzyFIbCwmQAAmQQPwEvv/+e1xyySU4ffq0sZKeweSa8Vce55fJXF47Z/I7AHTraQ899BDGjBkTp0v8jARIgARIQAiMHj0ao0aNMsJYAkC53mYHNSeIzkMAdAojsYG2b9/OlAd2jAC2QQIk4EkCMruRWY7MdgxldM7/hyiRXRCcIDoS++YzALr1tMmTJ0MuM7GQAAmQAAnE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"/>
	</defs>
	<style>
		.s0 { fill: #000000 } 
	</style>
	<use id="Layer 1 copy" href="#img1" transform="matrix(1,0,0,1,1,6)"/>
	<path id="Layer" fill-rule="evenodd" class="s0" d="m310.6 202.4v91.2q0 9.5-6.7 16.3-6.8 6.7-16.3 6.7h-160.7q-9.4 0-16.2-6.7-6.7-6.8-6.7-16.3v-91.2q-6.6-6-10.2-15.5-3.6-9.5-0.1-20.7l12-39q2.3-7.4 8.2-12.3 5.9-4.9 13.6-4.9h159.6q7.7 0 13.5 4.7 5.7 4.8 8.3 12.5l12 39q3.5 11.2-0.1 20.4-3.6 9.2-10.2 15.8zm-78.1-12.1q7.8 0 11.8-5.3 4-5.3 3.2-11.9l-6.3-40.1h-22.4v42.4q0 6 4 10.5 4 4.4 9.7 4.4zm-51.6 0q6.6 0 10.8-4.4 4.1-4.5 4.1-10.5v-42.4h-22.4l-6.3 40.1q-1.1 6.9 3 12.1 4.2 5.1 10.8 5.1zm-51.1 0q5.2 0 9.1-3.7 3.8-3.7 4.7-9.5l6.3-44.1h-22.4l-11.5 38.4q-1.7 5.7 1.9 12.3 3.6 6.6 11.9 6.6zm155 0q8.3 0 12-6.6 3.8-6.6 1.7-12.3l-12-38.4h-21.8l6.3 44.1q0.9 5.8 4.7 9.5 3.9 3.7 9.1 3.7zm-157.9 103.3h160.7v-80.9q-1.4 0.6-1.8 0.6h-1q-7.8 0-13.7-2.6-5.8-2.6-11.6-8.3-5.1 5.2-11.7 8-6.6 2.9-14.1 2.9-7.8 0-14.5-2.9-6.7-2.8-11.9-8-4.9 5.2-11.3 8-6.5 2.9-14 2.9-8.3 0-15-2.9-6.8-2.8-11.9-8-6.1 6-11.9 8.5-5.9 2.4-13.4 2.4h-1.3q-0.7 0-1.6-0.6zm160.7 0h-160.7z"/>
</svg>';

echo $svg;