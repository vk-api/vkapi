<?php

namespace Vkapi\AppTest;

use PHPUnit\Framework\TestCase;

use function Vkapi\readinput\readInput;
use function Vkapi\events\event\{confirmation};
use function Vkapi\env\setEnv;


class AppTest extends TestCase
{
    public function testConfirmation()
    {
        setEnv();
        $input = readInput(__DIR__ . "/fixtures/confirmation.json");
        $this->expectOutputString('a9279469');
        confirmation([[
            $_ENV["CONFIRMATION_TOKEN"],
            $_ENV["ACCESS_TOKEN"],
            $_ENV["API"],
            $_ENV["CHAT_ID"]
        ]]);
    }

    /**
     * @dataProvider additionProvider
     */

    public function testWall($expect, $json, $func)
    {
        $fixtures = __DIR__ . '/fixtures/';
        $data = readInput("{$fixtures}{$json}");
        $event = "Vkapi\\events\\event\\{$func}";
        $result = $event($data);
        $this->assertEquals($expect, $result);
    }

    public function additionProvider()
    {
        return [
            "video_new" => [
                [
                    'type' => 'video_new',
                    'id' => 456239021,
                    'owner_id' => -123611341,
                    'title' => '240(1)',
                    'description' => 'Это description видеоролика',
                    'duration' => 20,
                    'photo' => 'https://i.mycdn.me/getVideoPreview?id=863288625746&idx=0&type=39&tkn=yyGWkrWD-m0o1xe5Ylrh1Xk3oJ8&fn=vid_w',
                    'first_frame' => 'https://i.mycdn.me/getVideoPreview?id=863288625746&idx=0&type=39&tkn=yyGWkrWD-m0o1xe5Ylrh1Xk3oJ8',
                    'date' => 1643617926,
                    'adding_date' => '',
                    'player' => '',
                    'platform' => '',
                    'access_key' => '',
                    'width' => 320,
                    'height' => 240,
                    'user_id' => '',
                    'type_video' => '',
                ],
                "entities/video_new.json", "video_new"
            ],
            "photo_new" => [
                [
                    'type' => 'photo_new',
                    'id' => 457239020,
                    'album_id' => 204228510,
                    'owner_id' => -78441729,
                    'user_id' => 100,
                    'text' => '',
                    'date' => 1643916766,
                    'image' => 'https://sun9-74.userapi.com/impg/z7zr4jeIF7JFeAfUQVxzHca264k6ZRBHnC8qyg/vH36KVXige0.jpg?size=700x486&quality=95&sign=5526491b3377f9cfc1aa101162932471&c_uniq_tag=E_TuH-zhqr98NCVbfsK4e3CR-zO2ZlpFBWNn5lEwzQM&type=album'
                ],
                "entities/photo_new.json", "photo_new"
            ],
            "wall_post_new_with_audio" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 28,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1643874965,
                    'post_type' => 'post',
                    'text' => 'lorem ipsum',
                    'created_by' => 11412368,
                    'signer_id' => '',
                    'audio' =>
                    [
                        0 =>
                        [
                            'type' => 'audio',
                            'id' => 456244892,
                            'owner_id' => 2000093746,
                            'artist' => 'Walk Off The Earth',
                            'title' => 'Natalie',
                            'duration' => 25,
                            'url' => 'https://vk.com/mp3/audio_api_unavailable.mp3',
                            'lyrics_id' => '',
                            'album_id' => '',
                            'genre_id' => '',
                            'date' => 1643874965,
                            'is_hq' => 1
                        ],
                        1 =>
                        [
                            'type' => 'audio',
                            'id' => 456244959,
                            'owner_id' => 2000098961,
                            'artist' => 'taf taf',
                            'title' => 'Без названия',
                            'duration' => 25,
                            'url' => 'https://vk.com/mp3/audio_api_unavailable.mp3',
                            'lyrics_id' => '',
                            'album_id' => '',
                            'genre_id' => 1001,
                            'date' => 1643874965,
                            'is_hq' => ''
                        ],

                        2 =>
                        [
                            'type' => 'audio',
                            'id' => 456244056,
                            'owner_id' => 2000347997,
                            'artist' => 'The Free',
                            'title' => 'Born Crazy',
                            'duration' => 25,
                            'url' => 'https://vk.com/mp3/audio_api_unavailable.mp3',
                            'lyrics_id' => '',
                            'album_id' => '',
                            'genre_id' => 2,
                            'date' => 1643874965,
                            'is_hq' => 1
                        ]

                    ],

                    'video' =>
                    [],


                    'photo' =>

                    [],

                    'link' =>

                    [],

                    'geo' => [],
                    'poll' => [],
                    'doc' => [],
                    'group_id' => 78441729,
                    'event_id' => 'a5206b158abea573d6b35ee4e35e40fb10137b2a',
                ],
                "wall_post_new/wall_post_new_with_audio.json", "wall_post_new"
            ],
            "wall_post_new_with_doc" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 35,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1643996222,
                    'post_type' => 'post',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                    'created_by' => 11412368,
                    'signer_id' => 11412368,
                    'audio' => [],
                    'video' => [],
                    'photo' => [],
                    'link' => [],
                    'geo' => [],
                    'poll' => [],
                    'doc' => [[
                        'type' => 'doc',
                        'id' => 533704291,
                        'owner_id' => 11412368,
                        'title' => 'Реклама на ремонт.docx',
                        'size' => 5186,
                        'ext' => 'docx',
                        'date' => 1580093797,
                        'doc_type' => 1,
                        'url' => 'https://vk.com/doc11412368_533704291?hash=48e0d9c2844e2ee10a&dl=GEYTIMJSGM3DQ:1643996222:b0507bcb26ac3acfdd&api=1&no_preview=1',
                        'access_key' => 'b5238817abb3324444',
                    ], [
                        'type' => 'doc',
                        'id' => 626401418,
                        'owner_id' => 11412368,
                        'title' => 'dotnet-install.sh',
                        'size' => 54544,
                        'ext' => 'sh',
                        'date' => 1643996215,
                        'doc_type' => 8,
                        'url' => 'https://vk.com/doc11412368_626401418?hash=6152d3e74d5accdf0d&dl=GEYTIMJSGM3DQ:1643996222:42b6dfe35a35642b2d&api=1&no_preview=1',
                        'access_key' => 'b0b9b6914c91d20f5c',
                    ]],
                    'group_id' => 78441729,
                    'event_id' => '933b7ed2ffd09e04710d0f2f211462d889f7185f',
                ], "wall_post_new/wall_post_new_with_doc.json", 'wall_post_new'
            ],
            "wall_post_new_with_geo" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 36,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1643996401,
                    'post_type' => 'post',
                    'text' => 'Sed ut perspiciatis, unde omnis iste natus',
                    'created_by' => 11412368,
                    'signer_id' => 11412368,
                    'geo' => [
                        'type' => 'point',
                        'coordinates' => '55.171233202864 61.433932747947',
                        'id' => 0,
                        'title' => 'Артиллерийская улица, Челябинск',
                        'latitude' => 0,
                        'longitude' => 0,
                        'created' => 0,
                        'icon' => 'https://vk.com/images/places/place.png',
                        'country' => 'Россия',
                        'city' => 'Челябинск',
                        'showmap' => 1
                    ],
                    'audio' => [],
                    'video' => [],
                    'photo' => [],
                    'link' => [],
                    'poll' => [],
                    'doc' => [],
                    'group_id' => 78441729,
                    'event_id' => '3520030806ab05934a7d7305bc45e1b5d42ccde6',
                ], "wall_post_new/wall_post_new_with_geo.json", 'wall_post_new'
            ],
            "wall_post_new_with_link" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 34,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1643981029,
                    'post_type' => 'post',
                    'text' => 'если эти пакеты установлены из официального репозитория, то используется механизм альтернатив (alternatives) и /usr/bin/php является символической ссылкой (symlink) на /etc/alternatives/php, которая, в свою очередь, тоже является символической ссылкой на реальный исполняемый файл. в вашем случае — /usr/bin/php7.0.',
                    'created_by' => 11412368,
                    'signer_id' => 11412368,
                    'audio' => [],
                    'video' => [],
                    'photo' => [],
                    'geo' => [],
                    'poll' => [],
                    'link' => [
                        0 =>
                        [
                            'type' => 'link',
                            'url' => 'https://m.vk.com/@-78441729-esli-eti-pakety-ustanovleny-iz-oficialnog',
                            'title' => '?4??4??4??1? ?5??4??1? ?4??4??4??4??4??5? ?4??4??4??4??4??4??4??4??4??4??5? ?4??1? ?4??4??4??4??4??4??4??5??4??4??6?',
                            'caption' => 'm.vk.com',
                            'description' => '?4??4??4??4??5??5?',
                            'photo' => [],
                            'text' => '',
                            'user_id' => '',
                        ],
                    ],
                    'doc' => [],
                    'group_id' => 78441729,
                    'event_id' => 'b888455221a1e81f800185f48c913fe3b34c4de1',
                ], "wall_post_new/wall_post_new_with_link.json", 'wall_post_new'
            ],
            "wall_post_new_with_photo" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 6,
                    'from_id' => -123611341,
                    'owner_id' => -123611341,
                    'date' => 1643307587,
                    'post_type' => 'post',
                    'text' => 'ntcn',
                    'created_by' => 11412368,
                    'signer_id' => '',
                    'audio' => [],
                    'video' => [],
                    'photo' =>
                    [
                        0 =>
                        [
                            'type' => 'photo',
                            'id' => 457239018,
                            'album_id' => -7,
                            'owner_id' => -123611341,
                            'user_id' => 100,
                            'text' => '',
                            'date' => 1643307586,
                            'image' => 'https://sun9-2.userapi.com/impg/p0AnyCwQXf8atDO-6Aa2hpahHZtbGKXDQ8g-HA/fLatVqLoxJA.jpg?size=1280x1279&quality=95&sign=fdb87f0b7aa753de65830fca2540655e&c_uniq_tag=epwU28YE0MIF4YivFYgP4XGF2prqanU10jhVw6Abbhw&type=album',
                        ],
                        1 =>
                        [
                            'type' => 'photo',
                            'id' => 457239019,
                            'album_id' => -7,
                            'owner_id' => -123611341,
                            'user_id' => 100,
                            'text' => '',
                            'date' => 1643307586,
                            'image' => 'https://sun9-7.userapi.com/impg/s-ypBFXDYHfsUxCioOpnu2RPC9Plwbwt56HaMQ/yjrsogUVG18.jpg?size=230x230&quality=95&sign=e55883825020e6e14177d094d38e4ebd&c_uniq_tag=E6qXukOZOrtQtbfU56I69D5uaXRQqrzJZya0Ivauriw&type=album',
                        ],
                        2 =>
                        [
                            'type' => 'photo',
                            'id' => 457239020,
                            'album_id' => -7,
                            'owner_id' => -123611341,
                            'user_id' => 100,
                            'text' => '',
                            'date' => 1643307586,
                            'image' => 'https://sun9-3.userapi.com/impg/hP0_F0Kw82rqBwlp77JNmZ64ZuKgH86qadNpAg/yd-Wjd4I3o4.jpg?size=863x744&quality=95&sign=b1cd5ad9a23ff66b9945fe4bb6a7dcf7&c_uniq_tag=Gs1Plv_obOqvICMgSwX2TgF2oXj7cpo0uTuaKBSQCsk&type=album',
                        ],
                        3 =>
                        [
                            'type' => 'photo',
                            'id' => 457239021,
                            'album_id' => -7,
                            'owner_id' => -123611341,
                            'user_id' => 100,
                            'text' => '',
                            'date' => 1643307586,
                            'image' => 'https://sun9-30.userapi.com/impg/UnEUsC2fvSNbvdhT5z2UvZGnpVfs-pi06XEkRw/bsQEPviKZiU.jpg?size=1332x850&quality=95&sign=5368a0b52a33e71359a775dc07948faf&c_uniq_tag=22bSobyl6EkU1uhYFeorDZvhXNsC5QqrstnHqTl5cyQ&type=album',
                        ],
                    ],
                    'geo' => [],
                    'link' => [],
                    'doc' => [],
                    'poll' => [],
                    'group_id' => 123611341,
                    'event_id' => 'ddc6df788093d1bf13385cf6f64a39f3c46e757c',
                ], "wall_post_new/wall_post_new_with_photo.json", 'wall_post_new'
            ],
            "wall_post_new_with_poll" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 37,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1643996510,
                    'post_type' => 'post',
                    'text' => 'ves) и /usr/bin/php является символической ссылкой (sym (alternatives) и /usr/bin/php является символической сс',
                    'created_by' => 11412368,
                    'signer_id' => 11412368,
                    'audio' => [],
                    'video' => [],
                    'photo' => [],
                    'geo' => [],
                    'poll' => [
                        0 => [
                            'type' => 'poll',
                            'multiple' => false,
                            'end_date' => 0,
                            'closed' => false,
                            'is_board' => false,
                            'can_edit' => true,
                            'can_vote' => true,
                            'can_report' => false,
                            'can_share' => true,
                            'created' => 1643996510,
                            'id' => 686710041,
                            'owner_id' => -78441729,
                            'question' => 'we',
                            'votes' => 0,
                            'disable_unvote' => false,
                            'anonymous' => false,
                            'answer_ids' => [],
                            'embed_hash' => '686710041_15b107b4fd663bf484',
                            'answers' =>
                            [
                                0 => [
                                    'id' => 1953967222,
                                    'rate' => 0,
                                    'text' => 'q',
                                    'votes' => 0,
                                ],
                                1 =>
                                [
                                    'id' => 1953967223,
                                    'rate' => 0,
                                    'text' => 'qeqeqe',
                                    'votes' => 0,
                                ],
                                2 =>
                                [
                                    'id' => 1953967224,
                                    'rate' => 0,
                                    'text' => 'q',
                                    'votes' => 0,
                                ],
                            ],
                            'author_id' => -78441729,
                            'background' =>
                            [
                                'angle' => 225,
                                'color' => '6248cb',
                                'id' => 1,
                                'name' => 'фон в тёплых тонах',
                                'points' =>
                                [
                                    0 =>
                                    [
                                        'color' => 'f24973',
                                        'position' => 0,
                                    ],
                                    1 =>
                                    [
                                        'color' => '3948e6',
                                        'position' => 1,
                                    ],
                                ],
                                'type' => 'gradient',
                            ],
                        ],
                    ],
                    'link' => [],
                    'doc' => [],
                    'group_id' => 78441729,
                    'event_id' => '940821a86885a7df0d03431c9c5c459a39597488',
                ], "wall_post_new/wall_post_new_with_poll.json", 'wall_post_new'
            ],
            "wall_post_new_with_video" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 32,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1643912521,
                    'post_type' => 'post',
                    'text' => 'Sed ut perspiciatis, unde omnis iste natus',
                    'created_by' => 11412368,
                    'signer_id' => 11412368,
                    'audio' => [],
                    'video' => [
                        0 => [
                            'type' => 'video',
                            'id' => 456239022,
                            'owner_id' => -78441729,
                            'title' => 'Sed ut',
                            'description' => 'Sed ut perspiciatis',
                            'duration' => 20,
                            'photo' => 'https://i.mycdn.me/getVideoPreview?id=863288625746&idx=0&type=39&tkn=yyGWkrWD-m0o1xe5Ylrh1Xk3oJ8&fn=vid_w',
                            'first_frame' => 'https://i.mycdn.me/getVideoPreview?id=863288625746&idx=0&type=39&tkn=yyGWkrWD-m0o1xe5Ylrh1Xk3oJ8',
                            'date' => 1643912234,
                            'adding_date' => '',
                            'player' => '',
                            'platform' => '',
                            'access_key' => '',
                            'width' => 320,
                            'height' => 240,
                            'user_id' => '',
                            'type_video' => '',
                        ],
                        1 => [
                            'type' => 'video',
                            'id' => 456239023,
                            'owner_id' => -78441729,
                            'title' => 'Sed ut',
                            'description' => 'Sed ut perspiciatis',
                            'duration' => 16,
                            'photo' => 'https://i.mycdn.me/getVideoPreview?id=868846799498&idx=8&type=39&tkn=Xz4p8oRgiG5XtLlkLlx_NxEzP7w&fn=vid_w',
                            'first_frame' => 'https://i.mycdn.me/getVideoPreview?id=868846799498&idx=0&type=39&tkn=BPS7Gncux70UMJtjpr3y9ZgZt7s',
                            'date' => 1643912235,
                            'adding_date' => '',
                            'player' => '',
                            'platform' => '',
                            'access_key' => '',
                            'width' => 320,
                            'height' => 240,
                            'user_id' => '',
                            'type_video' => '',
                        ],
                        2 =>
                        [
                            'type' => 'video',
                            'id' => 456241279,
                            'owner_id' => -143356656,
                            'title' => 'Sed ut',
                            'description' => 'Sed ut perspiciatis',
                            'duration' => 4802,
                            'photo' => 'https://sun9-60.userapi.com/impf/c851336/v851336137/52d5b/8A8dKZJ98sg.jpg?size=1280x718&quality=96&sign=f9907c63240e1a79a1aacc3d2d7424ed&c_uniq_tag=oRrBDM2yVa6HSDLAM2-3S7juKzlVTLya0pC-rpazQE4&type=video_thumb',
                            'first_frame' => 'https://sun9-85.userapi.com/impf/c851320/v851320137/5489a/gxmNDL7BnY0.jpg?size=1280x720&quality=96&sign=2567575c7ced50f2fe6bd965270ca6d6&c_uniq_tag=stV4faC1VRORRGu9FDTKKa5mlrawr__HdO4EJTPe95U&type=video_first_frame',
                            'date' => 1543180981,
                            'adding_date' => '',
                            'player' => '',
                            'platform' => '',
                            'access_key' => '',
                            'width' => 1280,
                            'height' => 720,
                            'user_id' => '',
                            'type_video' => '',
                        ],
                        3 =>
                        [
                            'type' => 'video',
                            'id' => 456239094,
                            'owner_id' => 11412368,
                            'title' => 'Sed ut',
                            'description' => 'Sed ut perspiciatis',
                            'duration' => 7,
                            'photo' => 'https://sun9-37.userapi.com/impf/c830108/v830108452/13782f/HXwwesVCvhs.jpg?size=800x450&quality=96&sign=76c1c4140ee104b8c990b9448037e7e6&c_uniq_tag=buqRmtKD0XWfdwPmY3Dubf3L6_78XOotPgeJxtPeqEk&type=video_vertical_thumb',
                            'first_frame' => 'https://sun9-72.userapi.com/impf/c831109/v831109452/141db5/lSiyJVAgEfg.jpg?size=800x640&quality=96&sign=193a40c3d304fc2d17fd0d8b9770cde0&c_uniq_tag=lUTq4vRo5QCNO-rX3pMCBsM8dHlJ2YJdv-XH42m2_EI&type=video_first_frame',
                            'date' => 1530779166,
                            'adding_date' => '',
                            'player' => '',
                            'platform' => '',
                            'access_key' => '',
                            'width' => 960,
                            'height' => 720,
                            'user_id' => '',
                            'type_video' => '',
                        ],
                        4 =>
                        [
                            'type' => 'video',
                            'id' => 456239024,
                            'owner_id' => -78441729,
                            'title' => 'Sed ut',
                            'description' => 'Sed ut perspiciatis',
                            'duration' => 916,
                            'photo' => 'https://sun9-20.userapi.com/WAS4D-621ALt2yoIjemuP2WqFiIBjFOYIuwlxg/qjR6Twe5C18.jpg',
                            'first_frame' => NULL,
                            'date' => 1643912302,
                            'adding_date' => '',
                            'player' => '',
                            'platform' => 'YouTube',
                            'access_key' => '',
                            'width' => '',
                            'height' => '',
                            'user_id' => '',
                            'type_video' => '',
                        ],
                        5 =>
                        [
                            'type' => 'video',
                            'id' => 456239025,
                            'owner_id' => -78441729,
                            'title' => 'Sed ut',
                            'description' => 'Sed ut perspiciatis',
                            'duration' => 55,
                            'photo' => 'https://sun9-46.userapi.com/djbs6FWBTCp-Uir851nfkruAesuiDUNlh5d7JA/DPy-WUDYj3k.jpg',
                            'first_frame' => NULL,
                            'date' => 1643912512,
                            'adding_date' => '',
                            'player' => '',
                            'platform' => 'Vimeo',
                            'access_key' => '',
                            'width' => '',
                            'height' => '',
                            'user_id' => '',
                            'type_video' => '',
                        ],
                    ],
                    'photo' => [],
                    'geo' => [],
                    'poll' => [],
                    'link' => [],
                    'doc' => [],
                    'group_id' => 78441729,
                    'event_id' => 'e4dc01c88521912aab5584804824254410c9e713'
                ], "wall_post_new/wall_post_new_with_video.json", 'wall_post_new'
            ],
            "wall_post_new" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 25,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1643806118,
                    'post_type' => 'post',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'created_by' => 11412368,
                    'signer_id' => '',
                    'audio'  => [],
                    'video' => [],
                    'photo' => [],
                    'geo' => [],
                    'poll' => [],
                    'link' => [],
                    'doc' => [],
                    'group_id' => 78441729,
                    'event_id' => 'c0984f16e39c98b428160ec4ad2ce3fdef5c46cd'
                ], "wall_post_new/wall_post_new.json", 'wall_post_new'
            ],
            "wall_reply_new" => [
                [
                    'type' => 'wall_reply_new',
                    'id' => 50,
                    'from_id' => 11412368,
                    'date' => 1644331511,
                    'text' => '[id11412368|Константин], Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'post_id' => 47,
                    'owner_id' => -78441729,
                    'reply_to_user' => 11412368,
                    'reply_to_comment' => 49,
                    'post_owner_id' => -78441729,
                    'group_id' => '',
                    'event_id' => '',
                    'secret' => '',
                ], "reply/wall_reply_new.json", 'wall_reply_new'
            ],
            "wall_reply_restore" => [
                [
                    'type' => 'wall_reply_restore',
                    'id' => 49,
                    'from_id' => 11412368,
                    'date' => 1644331445,
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'post_id' => '',
                    'owner_id' => -78441729,
                    'audio' =>
                    array(),
                    'video' =>
                    array(),
                    'photo' =>
                    array(),
                    'geo' => '',
                    'poll' =>
                    array(),
                    'link' =>
                    array(),
                    'post_owner_id' => -78441729,
                    'group_id' => 78441729,
                    'event_id' => '4b289f6040e25ffba15e3e305e77e5ef14367adf',
                    'secret' => 'law3xcx1',
                ], "reply/wall_reply_restore.json", 'wall_reply_restore'
            ],
            "wall_reply_delete" => [
                [
                    'type' => 'wall_reply_delete',
                    'owner_id' => -123611341,
                    'id' => 19,
                    'deleter_id' => 11412368,
                    'post_id' => 18,
                    'group_id' => 123611341,
                    'event_id' => 'eb73cb2f5e23959a0012f41e19d335fe7ba54c02',
                    'secret' => 'law3xcx4',
                ], "reply/wall_reply_delete.json", 'wall_reply_delete'
            ],
            "wall_reply_edit" => [
                [
                    'type' => 'wall_reply_edit',
                    'id' => 50,
                    'from_id' => 11412368,
                    'date' => 1644331511,
                    'text' => '[id11412368|Константин], Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'post_id' => 47,
                    'owner_id' => -78441729,
                    'audio' =>
                    array(),
                    'video' =>
                    array(),
                    'photo' =>
                    array(),
                    'geo' => '',
                    'poll' =>
                    array(),
                    'link' =>
                    array(),
                    'post_owner_id' => -78441729,
                    'group_id' => '',
                    'event_id' => '',
                    'secret' => 'law3xcx1',
                ], "reply/wall_reply_edit.json", 'wall_reply_edit'
            ]
        ];
    }
}
