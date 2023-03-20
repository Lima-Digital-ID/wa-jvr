<?
header('content-type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

file_put_contents('whatsapp.txt', '[' . date('Y-m-d H:i:s') . "]\n" . json_encode($data) . "\n\n", FILE_APPEND);
$message = strtolower($data['message']); // ini menangkap pesan masuk
$from = $data['from']; // ini menangkap nomor pengirim pesan
$respon = false;


function sayHello(){
    return ["text" => 'Halloooo! {name} '];
}
function gambar(){
    return [
        'image' => ['url' => 'https://seeklogo.com/images/W/whatsapp-logo-A5A7F17DC1-seeklogo.com.png'],
        'caption' => 'Logo whatsapp!'
    ];
}
function button(){
    
    // maximal 3 button
    $buttons = [
        ['buttonId' => 'id1', 'buttonText' => ['displayText' => 'BUTTON 1'], 'type' => 1], // button 1 // 
        ['buttonId' => 'id2', 'buttonText' => ['displayText' => 'BUTTON 2'], 'type' => 1], // button 2
        ['buttonId' => 'id3', 'buttonText' => ['displayText' => 'BUTTON 3'], 'type' => 1], // button 3
    ];
    $line = "\r\n";
    $pesan = "halo,".$line."ini baris baru";
    $buttonMessage = [
        'text' => $pesan, // pesan utama nya
        'footer' => 'ini pesan footer', // pesan footernya, 
        'buttons' => $buttons,
        'headerType' => 1 // biarkan default
    ];
    return $buttonMessage;
}
function kirim($pesan){
    return ["text" => $pesan];
}



if($message === 'hi'){
    $respon = sayHello();
} else if($message === 'gambar'){
    $respon = gambar();
} else if($message === 'kirim'){
    $respon = kirim("kirim ini aja");
} else if($message === 'btn'){
    $respon = button();
}

include_once("../helper/koneksi.php");
include_once("../helper/function.php");
// $message = 'test';
$query = mysqli_query($koneksi,"select * from autoreplies where keyword = '$message' ");
$cek = mysqli_num_rows($query);
if($cek==0){
    $msg = explode(' ',$message);
    $count = count($msg);
    $where = "where ";
    foreach ($msg as $key => $value) {
        $or = $count != ($key+1) ? 'or ' : '';
        $where .= "keyword like '$value%' $or";
    }
    $querySQL = "select * from autoreplies $where";
    $sql = mysqli_query($koneksi, $querySQL);
    $cek2 = mysqli_num_rows($sql);
    if($cek2!=0){
        $d = mysqli_fetch_assoc($sql);

        if($d['type'] == 'text'){
            $reply = substr($d['reply'],9);
            $reply = str_replace('"}','',$reply);
            $slice = explode('\r\n',$reply);
            $textMsg = "";
            foreach($slice as $i => $v){
                $newLine = $i != 0 ? "\r\n" : "";
                $textMsg .= $newLine.$v;
            }
            $respon = kirim($textMsg);
        }
    }
}

echo json_encode($respon);