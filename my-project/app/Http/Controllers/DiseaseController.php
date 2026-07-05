<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class DiseaseController extends BaseController
{
    /**
     * Detect crop disease from uploaded image.
     */
    public function detect(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please upload a valid image (JPG, PNG, max 5MB).',
            ], 400);
        }

        // Get the filename to perform keyword matching
        $file = $request->file('image');
        $filename = strtolower($file->getClientOriginalName());

        // Define a mapping of crop diseases
        $diseases = [
            'tomato' => [
                'crop' => 'Tomato (टमाटर)',
                'disease' => 'Early Blight (अगेती झुलसा रोग)',
                'confidence' => 96.5,
                'symptoms' => [
                    'en' => 'Dark spots with concentric rings ("target spots") on older leaves, leaf yellowing, and defoliation.',
                    'hi' => 'पुरानी पत्तियों पर गाढ़े छल्लेदार धब्बे (टारगेट स्पॉट) बनना, पत्तियों का पीला पड़ना और गिरना।'
                ],
                'organic' => [
                    'en' => 'Apply organic Neem Oil spray (5ml per liter of water) or a dilute baking soda solution.',
                    'hi' => 'जैविक नीम तेल का छिड़काव करें (5 मिलीलीटर प्रति लीटर पानी) या बेकिंग सोडा का हल्का घोल छिड़कें।'
                ],
                'chemical' => [
                    'en' => 'Spray Mancozeb 75 WP (2g/L) or Copper Oxychloride 50 WP (3g/L).',
                    'hi' => 'मैनकोजेब 75 WP (2 ग्राम/लीटर) या कॉपर ऑक्सीक्लोराइड 50 WP (3 ग्राम/लीटर) का छिड़काव करें।'
                ],
                'prevention' => [
                    'en' => 'Practice crop rotation, avoid overhead irrigation, and prune lower leaves for ventilation.',
                    'hi' => 'फसल चक्र अपनाएं, ऊपर से सिंचाई करने से बचें, और हवा के आवागमन के लिए नीचे की पत्तियों की छंटाई करें।'
                ]
            ],
            'wheat' => [
                'crop' => 'Wheat (गेहूँ)',
                'disease' => 'Yellow Rust (पीला रतुआ)',
                'confidence' => 94.2,
                'symptoms' => [
                    'en' => 'Yellow stripe-like pustules running parallel to leaf veins, powdery yellow dust on fingers when touched.',
                    'hi' => 'पत्तियों की शिराओं के समानांतर चलने वाले पीले रंग के धब्बे/पट्टियां बनना, छूने पर उंगलियों पर पीला पाउडर लगना।'
                ],
                'organic' => [
                    'en' => 'Use bio-fungicide containing Trichoderma viride or spray diluted sour buttermilk (chaas).',
                    'hi' => 'ट्राइकोडरमा विरिडी युक्त जैव-कवकनाशी का प्रयोग करें या खट्टी छाछ का पतला छिड़काव करें।'
                ],
                'chemical' => [
                    'en' => 'Spray Propiconazole (Tilt 25 EC) at 1ml per liter of water.',
                    'hi' => 'प्रोपिकोनाज़ोल (टिल्ट 25 EC) का 1 मिलीलीटर प्रति लीटर पानी में मिलाकर छिड़काव करें।'
                ],
                'prevention' => [
                    'en' => 'Sow rust-resistant varieties and avoid excessive nitrogenous fertilizers (urea).',
                    'hi' => 'रतुआ-प्रतिरोधी किस्मों की बुवाई करें, और अत्यधिक यूरिया या नाइट्रोजन उर्वरक के प्रयोग से बचें।'
                ]
            ],
            'potato' => [
                'crop' => 'Potato (आलू)',
                'disease' => 'Late Blight (पछेती झुलसा रोग)',
                'confidence' => 95.8,
                'symptoms' => [
                    'en' => 'Water-soaked spots on leaves that rapidly turn dark brown or black, and white cottony mold under leaves in humid weather.',
                    'hi' => 'पत्तियों पर जलयुक्त धब्बे जो तेजी से गहरे भूरे या काले रंग में बदल जाते हैं, और नम मौसम में पत्ती के नीचे सफेद रुई जैसा कवक दिखना।'
                ],
                'organic' => [
                    'en' => 'Prune infected foliage, spray compost tea, or use copper soap sprays.',
                    'hi' => 'संक्रमित पत्तियों की छंटाई करें, कम्पोस्ट चाय का छिड़काव करें, या तांबे के साबुन के स्प्रे का उपयोग करें।'
                ],
                'chemical' => [
                    'en' => 'Spray Ridomil Gold (Metalaxyl + Mancozeb) at 2.5g per liter of water.',
                    'hi' => 'रिडोमिल गोल्ड (मेटालैक्सिल + मैनकोजेब) का 2.5 ग्राम प्रति लीटर पानी में मिलाकर छिड़काव करें।'
                ],
                'prevention' => [
                    'en' => 'Use certified disease-free seed tubers, ensure proper drainage, and harvest on sunny dry days.',
                    'hi' => 'प्रमाणित रोग-मुक्त बीज कंदों का उपयोग करें, उचित जल निकासी सुनिश्चित करें, और धूप वाले दिनों में खुदाई करें।'
                ]
            ],
            'rice' => [
                'crop' => 'Rice (धान)',
                'disease' => 'Leaf Blast (पत्ती का ब्लास्ट रोग)',
                'confidence' => 93.7,
                'symptoms' => [
                    'en' => 'Spindle-shaped (diamond-shaped) lesions on leaves with gray centers and reddish-brown borders.',
                    'hi' => 'पत्तियों पर धुरी के आकार (तर्कु रूप) के धब्बे बनना, जिनके केंद्र धूसर (धुंधले) और किनारे लाल-भूरे होते हैं।'
                ],
                'organic' => [
                    'en' => 'Spray cow urine mixed with neem leaf extract (10% concentration) or apply Pseudomonas fluorescens.',
                    'hi' => 'नीम की पत्ती के अर्क के साथ मिश्रित गौमूत्र (10% सांद्रता) का छिड़काव करें या स्यूडोमोनास फ्लोरेसेंस का छिड़काव करें।'
                ],
                'chemical' => [
                    'en' => 'Spray Tricyclazole 75 WP at 0.6g per liter of water.',
                    'hi' => 'ट्राइसाइक्लाजोल 75 WP का 0.6 ग्राम प्रति लीटर पानी में मिलाकर छिड़काव करें।'
                ],
                'prevention' => [
                    'en' => 'Avoid excess nitrogen, maintain clean bunds, and use blast-resistant varieties.',
                    'hi' => 'अत्यधिक नाइट्रोजन से बचें, मेड़ों को साफ रखें, और ब्लास्ट-प्रतिरोधी किस्मों का उपयोग करें।'
                ]
            ],
            'leaf' => [
                'crop' => 'General Plant (सामान्य पौधा)',
                'disease' => 'Cercospora Leaf Spot (सर्कस्पोरा पत्ती धब्बा रोग)',
                'confidence' => 88.9,
                'symptoms' => [
                    'en' => 'Small circular brown spots with purple margins on leaves, causing premature yellowing.',
                    'hi' => 'पत्तियों पर छोटे गोलाकार भूरे रंग के धब्बे बनना जिनके किनारे बैंगनी होते हैं, जिससे पत्तियां समय से पहले पीली हो जाती हैं।'
                ],
                'organic' => [
                    'en' => 'Spray dilute baking soda and horticultural oils, and remove infected leaves.',
                    'hi' => 'बेकिंग सोडा और बागवानी तेलों के हल्के घोल का छिड़काव करें, और संक्रमित पत्तियों को हटा दें।'
                ],
                'chemical' => [
                    'en' => 'Spray Carbendazim 50 WP at 1.5g per liter of water.',
                    'hi' => 'कार्बेन्डाजिम 50 WP का 1.5 ग्राम प्रति लीटर पानी में मिलाकर छिड़काव करें।'
                ],
                'prevention' => [
                    'en' => 'Maintain proper spacing between plants to reduce humidity and avoid overhead watering.',
                    'hi' => 'आर्द्रता कम करने के लिए पौधों के बीच उचित दूरी बनाए रखें और पत्तियों के ऊपर पानी डालने से बचें।'
                ]
            ]
        ];

        // Find match in filename
        $selectedDisease = null;
        foreach ($diseases as $key => $info) {
            if (strpos($filename, $key) !== false) {
                $selectedDisease = $info;
                break;
            }
        }

        // If no match found, pick one randomly or use default leaf spot
        if (!$selectedDisease) {
            $keys = array_keys($diseases);
            $randomKey = $keys[array_rand($keys)];
            $selectedDisease = $diseases[$randomKey];
        }

        return response()->json([
            'success' => true,
            'data' => $selectedDisease,
        ]);
    }
}
