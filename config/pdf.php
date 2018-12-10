<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',	
	'default_font_size'    	=> '12',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('resources/fonts/'), //('../temp/')
];


// 'mode'                 => '',
// 	'format'               => 'A4',
// 	'default_font_size'    => '12',
// 	'default_font'         => 'sans-serif',
// 	'margin_left'          => 10,
// 	'margin_right'         => 10,
// 	'margin_top'           => 10,
// 	'margin_bottom'        => 10,
// 	'margin_header'        => 0,
// 	'margin_footer'        => 0,
// 	'orientation'          => 'P',
// 	'title'                => 'Laravel mPDF',
// 	'author'               => '',
// 	'watermark'            => '',
// 	'show_watermark'       => false,
// 	'watermark_font'       => 'sans-serif',
// 	'display_mode'         => 'fullpage',
// 	'watermark_text_alpha' => 0.1


// return [
//     'mode'                  => 'utf-8',
//     'format'                => 'A4',
//     'default_font_size'     => '',
//     'default_font'          => 'chevin',
//     'margin_left'           => 0,
//     'margin_right'          => 0,
//     'margin_top'            => 0,
//     'margin_bottom'         => 0,
//     'margin_header'         => 0,
//     'margin_footer'         => 0,
//     'orientation'           => 'P',
//     'title'                 => '',
//     'author'                => '',
//     'watermark'             => '',
//     'show_watermark'        => false,
//     'watermark_font'        => 'chevin',
//     'display_mode'          => 'fullpage',
//     'watermark_text_alpha'  => 0.1,
//     'custom_font_path' => base_path('/resources/fonts/'), // don't forget the trailing slash!
//     'custom_font_data' => [
//         'chevin' => [
//             'R'  => 'ChevinLight.ttf',    // regular font
//             'B'  => 'ChevinBold.ttf',     // optional: bold font
//             'I'  => 'ChevinLight.ttf',    // optional: italic font
//             'BI' => 'ChevinBold.ttf'      // optional: bold-italic font
//         ],
//         'dinnextltarabic' => [
//             'R'  => 'DINNextLTArabic-Light.ttf',    // regular font
//             'B'  => 'DINNextLTArabic.ttf',          // optional: bold font
//             'I'  => 'DINNextLTArabic-Light.ttf',    // optional: italic font
//             'BI' => 'DINNextLTArabic.ttf'           // optional: bold-italic font
//         ]
//     ]
// ];




// return [
// 	'font_path' => base_path('resources/fonts/'),
// 	'font_data' => [
// 		'examplefont' => [
// 			'R'  => 'SolaimanLipi.ttf',    // regular font
// 			'B'  => 'SolaimanLipi.ttf',       // optional: bold font
// 			'I'  => 'SolaimanLipi.ttf',     // optional: italic font
// 			'BI' => 'SolaimanLipi.ttf', // optional: bold-italic font
// 			'useOTL' => 0xFF,    
// 			'useKashida' => 75, 
// 		]
// 		// ...add as many as you want.
// 	]
// ];
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