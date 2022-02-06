<?php

namespace Vkapi\AppTest;

use PHPUnit\Framework\TestCase;

use function Vkapi\readinput\readInput;
use function Vkapi\event\{confirmation, wall_post_new, video_new,};

class AppTest extends TestCase
{
    public function testConfirmation()
    {
        $input = readInput(__DIR__ . "/fixtures/confirmation.json");
        $this->expectOutputString('a9279469');
        confirmation($input);
    }


    /**
     * @dataProvider additionProvider
     */

    public function testWall($expect, $json, $func)
    {
        $fixtures = __DIR__ . '/fixtures/';
        $data = readInput("{$fixtures}{$json}");
        $event = "Vkapi\\event\\{$func}";
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
                    'description' => '',
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
                "video_new.json", "video_new"
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
                "photo_new.json", "photo_new"
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

                    'group_id' => 78441729,
                    'event_id' => 'a5206b158abea573d6b35ee4e35e40fb10137b2a',
                    'hash_tags' =>         []



                ],
                "wall_post_new_with_audio.json", "wall_post_new"
            ],
            "wall_post_new_with_doc" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 35,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1643996222,
                    'post_type' => 'post',
                    'text' => '(alternatives) и /usr/bin/php является символической ссылкой (symlink) на /etc',
                    'created_by' => 11412368,
                    'signer_id' => '',
                    'audio' => [],
                    'video' => [],
                    'photo' => [],
                    'link' => [],
                    'group_id' => 78441729,
                    'event_id' => '933b7ed2ffd09e04710d0f2f211462d889f7185f',
                    'hash_tags' => [],
                ], "wall_post_new_with_audio.json", 'wall_post_new'
            ],
            "wall_post_new_with_geo" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 35,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1643996222,
                    'post_type' => 'post',
                    'text' => '(alternatives) и /usr/bin/php является символической ссылкой (symlink) на /etc',
                    'created_by' => 11412368,
                    'signer_id' => '',
                    'audio' => [],
                    'video' => [],
                    'photo' => [],
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
                    'link' => [],
                    'group_id' => 78441729,
                    'event_id' => '933b7ed2ffd09e04710d0f2f211462d889f7185f',
                    'hash_tags' => [],
                ], "wall_post_new_with_geo.json", 'wall_post_new'
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
                    'signer_id' => '',
                    'audio' => [],
                    'video' => [],
                    'photo' => [],
                    'geo' => [],
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
                    'group_id' => 78441729,
                    'event_id' => 'b888455221a1e81f800185f48c913fe3b34c4de1',
                    'hash_tags' => []
                ], "wall_post_new_with_link.json", 'wall_post_new'
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
                            'album_id' => '',
                            'owner_id' => -123611341,
                            'user_id' => '',
                            'text' => '',
                            'date' => 1643307586,
                            'image' => 'https://sun9-2.userapi.com/impg/p0AnyCwQXf8atDO-6Aa2hpahHZtbGKXDQ8g-HA/fLatVqLoxJA.jpg?size=1280x1279&quality=95&sign=fdb87f0b7aa753de65830fca2540655e&c_uniq_tag=epwU28YE0MIF4YivFYgP4XGF2prqanU10jhVw6Abbhw&type=album',
                        ],
                        1 =>
                        [
                            'type' => 'photo',
                            'id' => 457239019,
                            'album_id' => '',
                            'owner_id' => -123611341,
                            'user_id' => '',
                            'text' => '',
                            'date' => 1643307586,
                            'image' => 'https://sun9-7.userapi.com/impg/s-ypBFXDYHfsUxCioOpnu2RPC9Plwbwt56HaMQ/yjrsogUVG18.jpg?size=230x230&quality=95&sign=e55883825020e6e14177d094d38e4ebd&c_uniq_tag=E6qXukOZOrtQtbfU56I69D5uaXRQqrzJZya0Ivauriw&type=album',
                        ],
                        2 =>
                        [
                            'type' => 'photo',
                            'id' => 457239020,
                            'album_id' => '',
                            'owner_id' => -123611341,
                            'user_id' => '',
                            'text' => '',
                            'date' => 1643307586,
                            'image' => 'https://sun9-3.userapi.com/impg/hP0_F0Kw82rqBwlp77JNmZ64ZuKgH86qadNpAg/yd-Wjd4I3o4.jpg?size=863x744&quality=95&sign=b1cd5ad9a23ff66b9945fe4bb6a7dcf7&c_uniq_tag=Gs1Plv_obOqvICMgSwX2TgF2oXj7cpo0uTuaKBSQCsk&type=album',
                        ],
                        3 =>
                        [
                            'type' => 'photo',
                            'id' => 457239021,
                            'album_id' => '',
                            'owner_id' => -123611341,
                            'user_id' => '',
                            'text' => '',
                            'date' => 1643307586,
                            'image' => 'https://sun9-30.userapi.com/impg/UnEUsC2fvSNbvdhT5z2UvZGnpVfs-pi06XEkRw/bsQEPviKZiU.jpg?size=1332x850&quality=95&sign=5368a0b52a33e71359a775dc07948faf&c_uniq_tag=22bSobyl6EkU1uhYFeorDZvhXNsC5QqrstnHqTl5cyQ&type=album',
                        ],
                    ],
                    'geo' => [],
                    'link' => [],
                    'group_id' => 123611341,
                    'event_id' => 'ddc6df788093d1bf13385cf6f64a39f3c46e757c',
                    'hash_tags' => []
                ], "wall_post_new_with_photo.json", 'wall_post_new'
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
                        'signer_id' => '',
                        'audio' => [],
                        'video' => [],
                        'photo' => [],
                        'geo' => [],
                        'link' => [],
                        'group_id' => 78441729,
                        'event_id' => '940821a86885a7df0d03431c9c5c459a39597488',
                        'hash_tags' => []
                ], "wall_post_new_with_poll.json", 'wall_post_new'
            ]
        ];
    }
}
