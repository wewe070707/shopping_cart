<?php
// ini_set('memory_limit', '-1');

// include('simple_html_dom.php');
// $html = new simple_html_dom();

// $html = file_get_html('https://shopee.tw/api/v2/search_items/?by=pop&fe_categoryids=1529&limit=50&newest=0&order=desc&page_type=search');
// $res=$html->find(".col-xs-2-4 shopee-search-item-result__item a");




// $url =  'https://shopee.tw/%E7%s9F%AD%E8%A4%B2-cat.63.1529';
// $text  = file_get_contents($url);
// var_dump($text);

// $test = file_get_contents('https://shopee.tw/api/v2/search_items/?by=pop&fe_categoryids=1529&limit=50&newest=0&order=desc&page_type=search');
// echo $test;

// file_get_contents($ch, CURLOPT_URL, 'https://shopee.tw/api/v2/search_items/?by=pop&fe_categoryids=1529&limit=50&newest=0&order=desc&page_type=search');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
// curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
// $html = curl_exec($ch);
// curl_close($ch);
// var_dump($html);

// $ch = curl_init('https://cf.shopee.tw/file/1bfc63fa390237c4380b37e0341a584f_tn');
// $fp = fopen('uploads/crawler/test.jpeg', 'wb');
// curl_setopt($ch, CURLOPT_FILE, $fp);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_exec($ch);
// curl_close($ch);
// fclose($fp);

$url = 'https://shopee.tw/api/v2/search_items/?by=pop&fe_categoryids=1529&limit=50&newest=0&order=desc&page_type=search';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
$headers = [
    'authority: shopee.tw',
    'method: GET',
'path: /api/v2/search_items/?by=pop&fe_categoryids=1529&limit=50&newest=0&order=desc&page_type=search',
'scheme: https',
'if-none-match: "ad65c6c8715ae1ac8e0a913721bd095e;gzip"',
'if-none-match-: 55b03-2b38d69db68fa44122bdd8459705cd99',
    'referer: https://shopee.tw/%E7%9F%AD%E8%A4%B2-cat.63.1529',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36',
    'x-api-source: pc',
    'x-requested-with: XMLHttpRequest',
    'cookie: _gcl_au=1.1.1747297676.1561342156; _med=refer; _fbp=fb.1.1561342155737.501684442; csrftoken=ku6kCFi883EeOMwoqnKTLCM0HnNVrCXQ; SPC_IA=-1; SPC_EC=-; SPC_U=-; REC_MD_20=1561342233; __BWfp=c1561342156079xebb87ee57; welcomePkgShown=true; SPC_F=CEvuz5erRdt8orqvNd8LkAfiGvXsDLDU; REC_MD_14=1561342336; REC_T_ID=1169cb9a-9625-11e9-a59e-f8f21e1a66d2; SPC_SI=qf11uszjyu9d5xpoegyix9ez4i08xcn5; cto_lwid=ab617fc4-5896-4d74-8800-af3584714cbf; AMP_TOKEN=%24NOT_FOUND; _ga=GA1.2.1637981246.1561342157; _gid=GA1.2.215175119.1561342157; _dc_gtm_UA-61915057-6=1; SPC_T_IV="8yZBqXi/+rhV7hJoeAXzKw=="; SPC_T_ID="HbX3mZp5Vebaxe7+XQ6XAHk8w2aX1Gj//avPYqpAAztWJVSJcUee5VvPYxwxTN5QCvMJuE/jHf8RVJTurEAneNeefELlOOrSVH7ckJAU8EM="'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$html = curl_exec($ch);
curl_close($ch);

$json = json_decode($html,true);
$items = $json['items'];

// var_dump($html);
// echo gettype($json);
// echo '<pre>'.print_r($items).'</pre>';

// Load data and save image
foreach ($items as $item) {
    $brand[] = $item['brand'];
    $name[] = $item['name'];
    $price[] = $item['price'];
    $historical_sold[] = $item['historical_sold'];
    $price_before_discount[] = $item['price_before_discount'];
    $stock[] = $item['stock'];
    $itemid[] = $item['itemid'];
    $image[] = $item['image'];
    $multi_image[] = $item['images'];
//
//
//
//     $url = 'https://cf.shopee.tw/file/' . $image .'_tn';
//     $img = 'uploads/crawler/'.$itemid .'.jpeg';
//     file_put_contents($img, file_get_contents($url));
//

}
// $i = 0;
// foreach ($items as $item => $outer_value) {
//     $data_array = array(
//         'type' => 'pants',
//         'name' => $outer_value['name'],
//         'stock' => $outer_value['stock'],
//         'image' => $outer_value['itemid'] . '_0.jpeg',
//         'description' => '',
//         'price' => $outer_value['price']/100000,
//         'price_before_discount' => $outer_value['price_before_discount']/100000
//     );
//     Database::get()->insert('products',$data_array);
//     $product_id = Database::get()->getLastId();
//     foreach ($multi_image[$item] as $key => $value) {
//         $data_array = array(
//             'product_id' => $product_id,
//             'image' => $itemid[$item]."_".$key .'.jpeg'
//         );
//         $i++;
//         Database::get()->insert("product_images",$data_array);
//     }
// }






foreach ($multi_image as $outer_key => $outer_value) {
    foreach ($outer_value as $key => $value) {
        // if($value == "0819353b1ad611ec0d2c1f5b93ac7a52"){
        //     $url = 'https://cf.shopee.tw/file/' . $value;
        //     $img = 'uploads/crawler/'.$itemid[$outer_key]."_".$key .'.jpeg';
        //     file_put_contents($img, file_get_contents($url));
        //     echo $url . "=>" . $img;
        // }else{
        //     $url = 'https://cf.shopee.tw/file/' . $value .'_tn';
        //     $img = 'uploads/crawler/'.$itemid[$outer_key]."_".$key .'.jpeg';
        //     file_put_contents($img, file_get_contents($url));
        //     echo $url . "=>" . $img . "<br>";
        // }


    }
    // echo $key[$value];

}

// if (($key = array_search('0819353b1ad611ec0d2c1f5b93ac7a52', $multi_image)) !== false) {
//     unset($messages[$key]);
// }
echo "Finish";
echo $i;
// print_r($brand);
// print_r($name);
// print_r($price);
// print_r($price_before_discount);
// foreach($multi_image as $i)
    // print_r($multi_image)
?>
