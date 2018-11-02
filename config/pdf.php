<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('resources/fonts/') //('../temp/')
];


// return [
// 	'font_path' => base_path('resources/fonts/'),
// 	'font_data'	=>[

// 		'bangla' => [
// 				'R'  => 'SolaimanLipi.ttf',    // regular font
// 				'B'  => 'SolaimanLipi.ttf',       // optional: bold font
// 				'I'  => 'SolaimanLipi.ttf',     // optional: italic font
// 				'BI' => 'SolaimanLipi.ttf' // optional: bold-italic font
// 				//'useOTL' => 0xFF,   
// 				//'useKashida' => 75, 
// 			]
// 	]

// ];

// return [
// 	'font_path' => base_path('resources/fonts/'), 
// 	'font_data' => [ 'examplefont' => [ 'R' => 'ExampleFont-Regular.ttf', 
// 										// regular font 'B' => 'ExampleFont-Bold.ttf', 
// 										// optional: bold font 'I' => 'ExampleFont-Italic.ttf', 
// 										// optional: italic font 'BI' => 'ExampleFont-Bold-Italic.ttf' 
// 										// optional: bold-italic font 'useOTL' => 0xFF,
// 										'useKashida' => 75, 
// 									  ] // ...add as many as you want. ]
// 					];