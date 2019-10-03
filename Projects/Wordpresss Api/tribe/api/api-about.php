<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Max-Age: 86400'); // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS,PUT");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  exit(0);
}

header('Content-Type: application/json');



$data = [
	'image' => 'https://tribe228.com/wp-content/uploads/2019/06/About-Us.png',
	'title' => 'ABOUT THE TRIBE',
	'content' => '
	Providing contemporary designs with modernity, African heritage, and superior artistry.

Sharing the African culture with the world through fashion, accessories, and art.
From the exotic landscapes of Africa and the effervescent land of Togo, Tribe 228 brings you unique African inspired clothing influenced by the gorgeous patterns and entrenched Togolese culture with the dash of western Africa styling and culture.

Tribe 228 delivers you so much more than just clothing as we welcome you to the tribe – a way of life, community, and the style of breathtaking Africa. Tribe 228 celebrates the African culture and endeavors to bring it closer to people all over the world.

With the inclusion of bold patterns, vibrant colors, beautiful designs, and deep blacks, we enable a connection to the African way of life and the traditions as well as the unique cultures of the Togolese tribes.

At Tribe 228, every piece of clothing is made with the utmost care by the local community, providing employment to its members and enabling them to create a better life for themselves. At the same time, every piece of Tribe 228 clothing creates a connection between the consumer and the African culture, making the individual part of the deep-rooted tribe.

Tribe’s goal is to share the African culture with the world through its specific fashion, accessories, and art. Talented local designers and tailors from Togo are appointed. Therefore every garment sold is providing a job for a local artisan back home that helps in providing a better lifestyle for the families. This sets the production process at Tribe apart from the competitors.

We make authentic African design and couture for our clients. Cognizant of how difficult it is to find authentic African clothes at affordable prices, we at Tribe 228 focused on finding a way to bring those items straight from the place where they originated centuries ago.

All the Tribe 228 clothing is made using authentic African wax fabric infused with beautiful colors and traditional patterns with modern and chic designs. This combination compliments and personifies our tribe members with the best of both worlds – contemporary clothing with a touch of the Tribe.

Tribe 228 instead of working with expensive domestic tailors focuses on affordability and makes sure that the people of Togo can be a part of the world by bringing their art to everyone.

Taking this initiative enables us at Tribe 228 to keep the genuineness of our brand while repaying the local artisans for the centuries-old tradition that they are keeping alive and prudent.

So go ahead and experience the strength and freedom that comes with every unique and colorful piece of clothing brought to you by Tribe 228.

Become a part of the oldest of Togolese traditions and join us as we bring them closer to the world with modern eccentric and modern touches.

<p><strong>Be a Part of the Tribe.</strong><br>
<strong>Tribe 228.</strong></p>
'
];
print(json_encode($data));