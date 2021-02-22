<?php 


function sendRequest($d=array()){
    $json_data = array(
        "content" => $d['content'],
        "username" => $d['username'],
        "avatar_url" => $d['avatar_url'],
        "tts" => false,
    );

    $i = 0;
    foreach((array)$d['embeds'] AS $e){
        $e['timestamp'] = (!empty($e['timestamp']) ? $e['timestamp'] : time());
        $json_data["embeds"][$i] = array(
            "title" => $e['content'],
            "type" => "rich",
            "description" => $e['description'],
            "url" => $e['url'],
            "timestamp" => date('Y-m-d\TH:i:s.v\Z', $e['timestamp']),

            "footer" => [
                "text" => $e['footer']['text'],
                "icon_url" => $e['footer']['icon_url'],
            ],

            "image" => [
                "url" => $e['image'],
            ],

            "thumbnail" => [
                "url" => $e['thumbnail'],
            ],

            "author" => [
                "name" => $e['author']['name'],
                "url" => $e['author']['url'],
            ],

        );
        $i++;
    }
    $i = 0;
    $fields = array();
    if(!empty($d['fields']['name']) && !empty($d['fields']['value'])){
        foreach((array)$d['fields'] AS $e){

            $fields[$i] = array(
                'name' => $e['name'],
                'value' => $e['value'], 
                'inline' => $e['inline'], 
            );


            $i++;
        }

        $json_data['embeds'][0]['fields'] = $fields;
    }

    $json_data = json_encode($json_data);

    $ch = curl_init( $d['webhook'] );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec( $ch );
    curl_close( $ch );

}