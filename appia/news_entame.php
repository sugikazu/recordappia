<?php

 //XML上部分作成
$rssHeader = <<<RSS
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>
<title>サイトタイトル</title>
<link>サイトURL</link>
<description>サイト概要</description>
<author>管理人</author>
<pubDate>日付</pubDate>
<language>ja</language>
RSS;

//表示記事数
$hyojiNum = 30;
  
//フィード登録
$data['feedurl'][] = 'http://www.ideaxidea.com/feed';
$data['feedurl'][] = 'http://portal.nifty.com/rss/headline.rdf';
$data['feedurl'][] = 'http://feeds.feedburner.com/haishin/rss/index';



//$data['feedurl'][] = ''; 必要な分だけ追加してください
  
$rssList = $data['feedurl'];
  
    //同時呼び出し
    $rssdataRaw = multiRequest($rssList);
    for($n=0;$n<count($rssdataRaw);$n++){
        //URL設定
        $rssdata = simplexml_load_string($rssdataRaw[$n], 'SimpleXMLElement', LIBXML_NOCDATA);
        if($rssdata->channel->item) $rssdata = $rssdata->channel;
        if($rssdata->item){
            $b_title=$rssdata->title;
            foreach($rssdata->item as $myEntry){
   
                $myDate = $myEntry->pubDate;
                if(!$myDate) $myDate = $myEntry->children("http://purl.org/dc/elements/1.1/")
                  ->date;

                date_default_timezone_set('Asia/Tokyo');
                $myDateGNU = strtotime($myDate);
                $myDate = date('Y/m/d',$myDateGNU);



                $myTitle = $myEntry->title; //タイトル取得
 
                $myLink = $myEntry->link; //リンクURL取得
                
$myContent = $myEntry->children('http://purl.org/rss/1.0/modules/content/');
$myContent2 = $myContent->encoded;

preg_match('/<img .*?src ?= ?[\'"]([^>]+)[\'"].*?>/i', $myContent2, $img_all);
preg_match('/http.*?(\.gif|\.png|\.jpg|\.jpeg$|\.bmp)/i', $img_all[0], $gazo);

$outdata[$myDateGNU] =
'<item>
<title>'.$myTitle.'</title>
<link>' . $myLink . '</link>
<img>'.$gazo[0].'</img>
<date>'.$myDate.'</date>
</item>';
                
            }
        }
    }
  
ksort($outdata);

$nn = 0;
$html = '';
//
foreach($outdata as $outdata) {
    $nn++;
    $html.= $outdata;
     if($nn == $hyojiNum) break;
}

//XML下部分作成
$rssFooter = <<<RSS
</channel>
</rss>
RSS;


//echo $html;

print_r($rssHeader.$html.$rssFooter);


//　ここで「echo $html」 で一覧表示できます。
  
//ここから同時呼び出し関数

function multiRequest($data, $options = array()) {
   
  // 配列を用意します。
  $curly = array();
  // data to be returned
  $result = array();
   
  //並列ファンクション
  $mh = curl_multi_init();
   
  // loop through $data and create curl handles
  // then add them to the multi-handle
  foreach ($data as $id => $d) {
   
    $curly[$id] = curl_init();
   
    $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
    curl_setopt($curly[$id], CURLOPT_URL,            $url);
    curl_setopt($curly[$id], CURLOPT_HEADER,         0);
    curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
   
    // 投稿記事があるかどうか
    if (is_array($d)) {
      if (!empty($d['post'])) {
        curl_setopt($curly[$id], CURLOPT_POST, 1);
        curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);
      }
    }
   
    if (!empty($options)) { curl_setopt_array($curly[$id], $options);}
    curl_multi_add_handle($mh, $curly[$id]);
  }
   
  $running = null;
// ハンドルを実行
  do {
    curl_multi_exec($mh, $running);
  } while($running > 0);
   
  foreach($curly as $id => $c) {
    $result[$id] = curl_multi_getcontent($c);
    curl_multi_remove_handle($mh, $c);
  }
   
  // ハンドルを閉じる
  curl_multi_close($mh);
   
  return $result;
}

?>