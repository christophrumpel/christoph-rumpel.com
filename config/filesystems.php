<?php

return [

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'backupFolder' => [
            'driver'   => 'ftp',
            'host'     => 'nomoreencore.com',
            'username' => env('BACKUP_FTP_USER'),
            'password' => env('BACKUP_FTP_PW')
        ],

        'posts' => [
            'driver' => 'local',
            'root' => base_path('content/posts'),
        ],

        'talks' => [
            'driver' => 'local',
            'root' => base_path('content/talks'),
        ],
    ],

];
