<?php
## ./IkiGanteng
function curl($url, $data = 0, $header = 0, $cookie = 0) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    if($header) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    }
    if($data) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    if($cookie) {
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    }
    $x = curl_exec($ch);
    curl_close($ch);
    return $x;
}
while (true) {
$list = file_get_contents('token.txt');
$datas = explode("\n", str_replace("\r", "", $list));
for ($i = 0; $i < count($datas); $i++) {
$cookie = $datas[$i];
$url = 'https://citizen.dosi.world/api/citizen/v1';
$headers = array();
$headers[] = 'Host: citizen.dosi.world';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0';
$headers[] = 'Accept: application/json, text/plain, */*';
$headers[] = 'Accept-Language: id,en-US;q=0.7,en;q=0.3';
$headers[] = 'Accept-Encoding: gzip, deflate, br';
$headers[] = 'Referer: https://citizen.dosi.world/bonus';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Cookie: '.$cookie ;

$post = curl($url.'/events/check-in',1,$headers);
$coin = curl($url.'/balance',0,$headers);
$nft = curl($url.'/membership',0,$headers);
$totalnft = json_decode($nft);
$total = json_decode($coin);
echo $i++;
echo $post."\n";
echo 'total coin: '.$total->amount."\n";
echo 'total NFT: '.$totalnft->nftCount."\n";
}
echo 'tidur selama 24 jam';
sleep(86460);
}
			?>
