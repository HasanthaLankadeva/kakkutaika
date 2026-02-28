<?php

return [
    'smtp_host'     => Env::get('MAIL_HOST'),
    'smtp_port'     => Env::get('MAIL_PORT'),
    'smtp_username' => Env::get('MAIL_USERNAME'),
    'smtp_password' => Env::get('MAIL_PASSWORD'),
    'from'          => Env::get('MAIL_FROM'),
    'from_name'     => Env::get('MAIL_FROM_NAME')
];

?>