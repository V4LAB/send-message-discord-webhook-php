<?php 

include('discord_function.php');

$discord_array = array(
    'webhook' => '', // Webhook API
    'content' => '', // The content of the message
    'username' => '', // The username of the sender
    'avatar_url' => '', // Avatar URL

    'embeds' => array(
        0 => array(
            'content' => '', // The content of the embed
            'description' => '', // The description of the embed
            'url' => '', // The url of the embed
            'timestamp' => '', // When is the embed created UNIX_TIMESTAMP/time() format
            'thumbnail' => '', // Embed SMALL thumbnail next to description
            'image' => '', // Embed HEAD Image
            'footer' => array(
                'text' => '', // Text in the footer, next to the timestamp
                'icon_url' => '', // Icon url next to the text
            ),
            'author' => array(
                'name' => '', // The name of the author
                'url' => '', // Author url
            ),
        ),
    ),

    'fields' => array(
        0 => array(
            'name' => '', // Field name
            'value' => '', // Field value
            "inline" => true, // true/false
        ),
    ),

);

sendRequest($discord_array);