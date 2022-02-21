<?php

namespace Vkapi\AppTest;

use PHPUnit\Framework\TestCase;

use function Vkapi\readinput\readInput;
use function Vkapi\events\event\{confirmation};
use function Vkapi\env\setEnv;

class AppTest extends TestCase
{
    /**
     * @dataProvider additionProviderConfirmation
     */
    public function testConfirmation($json, $expected, $env)
    {
        $input = readInput(__DIR__ . $json);
        $this->expectOutputString($expected);
        confirmation($input, $env);
    }

    public function additionProviderConfirmation()
    {
        setEnv();
        return [
            "confirmation" => [
                "/fixtures/confirmation.json", '5e52c648',
                [
                    [
                        'group_id' => 'sfasfasfasf',
                        'secret' => 'ewqevsdvsdv',
                        'confirmation' => 'asdasdasdas'
                    ],
                    [
                        'group_id' => $_ENV["GROUP_ID"],
                        'secret' => $_ENV["SECRET"],
                        'confirmation' => $_ENV["CONFIRMATION_TOKEN"]
                    ]
                ]
            ],
            "confirmation2" => [
                "/fixtures/confirmation.json", '',
                [
                    [
                        'group_id' => 'sfasfasfasf',
                        'secret' => 'ewqevsdvsdv',
                        'confirmation' => 'asdasdasdas'
                    ]
                ]
            ],
            "confirmation3" => [
                "/fixtures/confirmation.json", '',
                [
                    [
                        'group_id' => 'sfasfasfasf',
                        'secret' => 'ewqevsdvsdv',
                        'confirmation' => 'asdasdasdas'
                    ],
                    [
                        'group_id' => 'sfasfasfasf1',
                        'secret' => 'ewqevsdvsdv1',
                        'confirmation' => 'asdasdasdas1'
                    ],
                    [
                        'group_id' => 'sfasfasfasf2',
                        'secret' => 'ewqevsdvsdv2',
                        'confirmation' => 'asdasdasdas2'
                    ]
                ]
            ]
        ];
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
                    'id' => 456239030,
                    'owner_id' => -78441729,
                    'title' => 'Neptune Day',
                    'description' => 'Neptune Day description',
                    'duration' => 20,
                    'image' => 'https://i.mycdn.me/getVideoPreview?id=863288625746&idx=0&type=39&tkn=yyGWkrWD-m0o1xe5Ylrh1Xk3oJ8&fn=vid_w',
                    'first_frame' => 'https://i.mycdn.me/getVideoPreview?id=863288625746&idx=0&type=39&tkn=yyGWkrWD-m0o1xe5Ylrh1Xk3oJ8',
                    'date' => 1645245852,
                    'width' => 320,
                    'height' => 240,
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
                    'date' => 1643916766,
                    'image' => 'https://sun9-74.userapi.com/impg/z7zr4jeIF7JFeAfUQVxzHca264k6ZRBHnC8qyg/vH36KVXige0.jpg?size=700x486&quality=95&sign=5526491b3377f9cfc1aa101162932471&c_uniq_tag=E_TuH-zhqr98NCVbfsK4e3CR-zO2ZlpFBWNn5lEwzQM&type=album'
                ],
                "entities/photo_new.json", "photo_new"
            ],
            "wall_post_new_with_audio" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 61,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1645247002,
                    'post_type' => 'post',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'created_by' => 11412368,
                    'audio' =>
                    [
                        0 =>
                        [
                            'type' => 'audio',
                            'id' => 456244679,
                            'owner_id' => 2000460691,
                            'artist' => 'Walk Off The Earth',
                            'title' => 'Natalie',
                            'duration' => 25,
                            'url' => 'https://vk.com/mp3/audio_api_unavailable.mp3',
                            'date' => 1645247002,
                        ],
                        1 =>
                        [
                            'type' => 'audio',
                            'id' => 456244197,
                            'owner_id' => 2000271416,
                            'artist' => 'Nathan Brown',
                            'title' => 'Natalie',
                            'duration' => 25,
                            'url' => 'https://vk.com/mp3/audio_api_unavailable.mp3',
                            'genre_id' => 1001,
                            'date' => 1645247002,
                        ],

                        2 =>
                        [
                            'type' => 'audio',
                            'id' => 456244897,
                            'owner_id' => 2000138843,
                            'artist' => 'Umberto Rosario Balsamo',
                            'title' => 'Natali',
                            'duration' => 25,
                            'url' => 'https://vk.com/mp3/audio_api_unavailable.mp3',
                            'date' => 1645247002,
                        ]

                    ],
                    'group_id' => 78441729,
                    'event_id' => '920100b435909d9fcc1fd35898bc0ffe300ac67d',
                ],
                "wall_post_new/wall_post_new_with_audio.json", "wall_post_new"
            ],
            "wall_post_new_with_doc" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 62,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1645247979,
                    'post_type' => 'post',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'created_by' => 11412368,
                    'doc' => [[
                            'type' => 'doc',
                            'id' => 627716662,
                            'owner_id' => 11412368,
                            'title' => 'Untitled 1.pdf',
                            'size' => 1148,
                            'ext' => 'pdf',
                            'date' => 1645247970,
                            'doc_type' => 1,
                            'url' => 'https://vk.com/doc11412368_627716662?hash=464f6763992415547b&dl=GEYTIMJSGM3DQ:1645247979:93491981ec88beb7e3&api=1&no_preview=1',
                            'access_key' => '47a0e59354ffa84c13',
                        ], [
                            'type' => 'doc',
                            'id' => 627716663,
                            'owner_id' => 11412368,
                            'title' => 'Untitled 1.odt',
                            'size' => 7902,
                            'ext' => 'odt',
                            'date' => 1645247970,
                            'doc_type' => 1,
                            'url' => 'https://vk.com/doc11412368_627716663?hash=00b2d46cab5db09cd4&dl=GEYTIMJSGM3DQ:1645247979:7b9485945faaa5fab0&api=1&no_preview=1',
                            'access_key' => '02cb4283c2fe5f520a',
                        ]],
                    'group_id' => 78441729,
                    'event_id' => '85823a9e7f3e4a393cc0471ee9868860040deaaa',
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
                    'group_id' => 78441729,
                    'event_id' => '3520030806ab05934a7d7305bc45e1b5d42ccde6',
                ], "wall_post_new/wall_post_new_with_geo.json", 'wall_post_new'
            ],
            "wall_post_new_with_link" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 63,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1645248634,
                    'post_type' => 'post',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'created_by' => 11412368,
                    'link' => [
                        0 =>
                        [
                            'type' => 'link',
                            'url' => 'https://m.vk.com/@-78441729-lorem-ipsum-dolor',
                            'title' => 'Lorem ipsum dolor',
                            'caption' => 'm.vk.com',
                            'description' => '?4??4??4??4??5??5?',
                            'photo' => [
                                'type' => 'link',
                                'id' => 457239028,
                                'album_id' => -66,
                                'owner_id' => -78441729,
                                'user_id' => 100,
                                'date' => 1645248623,
                                'image' => 'https://sun9-5.userapi.com/impg/4UEBb2d0fzh24MgpVMRlboe-5FRsPoWk4JqyKA/6hGCcq_NmIk.jpg?size=700x486&quality=96&sign=e4c20c32d232abe7049e3fb8e324fd14&c_uniq_tag=9lzEdEil6OSbj4JCUypDZDBP6LG3Uv1gKxuhLN1Gqog&type=album',
                            ],
                        ],
                    ],
                    'group_id' => 78441729,
                    'event_id' => 'cc74e6f2c8ea9786eb1ef9bfc3c266b1f96b6c86',
                ], "wall_post_new/wall_post_new_with_link.json", 'wall_post_new'
            ],
            "wall_post_new_with_photo" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 64,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1645249137,
                    'post_type' => 'post',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'created_by' => 11412368,
                    'photo' =>
                    [
                        0 =>
                        [
                            'type' => 'photo',
                            'id' => 457239029,
                            'album_id' => -7,
                            'owner_id' => -78441729,
                            'user_id' => 100,
                            'date' => 1645249137,
                            'image' => 'https://sun9-5.userapi.com/impg/Nhp8T8BrDiIaKKq-V-x6i8E7QCwl9eSKhU8RDw/UgqU9ifmgTY.jpg?size=620x413&quality=95&sign=747fa5bab35e665c23035d58ae110f98&c_uniq_tag=W5tv5vRD-thEV4WSkDBEyUHvd_4q9pRfDkK8cXoug2g&type=album',
                        ],
                        1 =>
                        [
                            'type' => 'photo',
                            'id' => 457239030,
                            'album_id' => -7,
                            'owner_id' => -78441729,
                            'user_id' => 100,
                            'date' => 1645249137,
                            'image' => 'https://sun9-74.userapi.com/impg/z7zr4jeIF7JFeAfUQVxzHca264k6ZRBHnC8qyg/vH36KVXige0.jpg?size=700x486&quality=95&sign=5526491b3377f9cfc1aa101162932471&c_uniq_tag=E_TuH-zhqr98NCVbfsK4e3CR-zO2ZlpFBWNn5lEwzQM&type=album',
                        ]
                    ],
                    'group_id' => 78441729,
                    'event_id' => 'f35d0a375224ec92cf0400a6d628e6b303ec5c4e',
                ], "wall_post_new/wall_post_new_with_photo.json", 'wall_post_new'
            ],
            "wall_post_new_with_poll" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 65,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1645250121,
                    'post_type' => 'post',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'created_by' => 11412368,
                    'poll' => [
                        0 => [
                            'type' => 'poll',
                            'multiple' => true,
                            'end_date' => 1645336440,
                            'closed' => false,
                            'is_board' => false,
                            'can_edit' => true,
                            'can_vote' => true,
                            'can_report' => false,
                            'can_share' => true,
                            'created' => 1645250121,
                            'id' => 691795406,
                            'owner_id' => -78441729,
                            'question' => 'Lorem ipsum dolor sit amet',
                            'votes' => 0,
                            'disable_unvote' => true,
                            'anonymous' => true,
                            'answer_ids' => [],
                            'embed_hash' => '691795406_1bd0edadbc2c0a5cf4',
                            'answers' =>
                            [
                                0 => [
                                    'id' => 1965967976,
                                    'rate' => 0,
                                    'text' => 'consectetur adipiscing elit',
                                    'votes' => 0,
                                ],
                                1 =>
                                [
                                    'id' => 1965967977,
                                    'rate' => 0,
                                    'text' => 'sed do eiusmod tempor',
                                    'votes' => 0,
                                ]
                            ],
                            'author_id' => -78441729,
                            'background' => '',
                        ],
                    ],
                    'group_id' => 78441729,
                    'event_id' => '4ca718088a18a566883647e3a9edb4cef0d1cea8',
                ], "wall_post_new/wall_post_new_with_poll.json", 'wall_post_new'
            ],
            "wall_post_new_with_video" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 66,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1645250930,
                    'post_type' => 'post',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'created_by' => 11412368,
                    'video' => [
                        0 => [
                            'type' => 'video',
                            'id' => 456239031,
                            'owner_id' => -78441729,
                            'title' => 'Видео от Тестовая 1',
                            'duration' => 16,
                            'image' => 'https://i.mycdn.me/getVideoPreview?id=868846799498&idx=8&type=39&tkn=Xz4p8oRgiG5XtLlkLlx_NxEzP7w&fn=vid_w',
                            'first_frame' => 'https://i.mycdn.me/getVideoPreview?id=868846799498&idx=0&type=39&tkn=BPS7Gncux70UMJtjpr3y9ZgZt7s',
                            'date' => 1645250692,
                            'width' => 320,
                            'height' => 240,
                            'access_key' => '7f662f42f6c8f39886',
                        ],
                        1 => [
                            'type' => 'video',
                            'id' => 456239094,
                            'owner_id' => 11412368,
                            'title' => '50c358340ccb.480 1_cut(1)',
                            'duration' => 7,
                            'image' => 'https://sun9-37.userapi.com/impf/c830108/v830108452/13782f/HXwwesVCvhs.jpg?size=800x450&quality=96&sign=76c1c4140ee104b8c990b9448037e7e6&c_uniq_tag=buqRmtKD0XWfdwPmY3Dubf3L6_78XOotPgeJxtPeqEk&type=video_vertical_thumb',
                            'first_frame' => 'https://sun9-72.userapi.com/impf/c831109/v831109452/141db5/lSiyJVAgEfg.jpg?size=800x640&quality=96&sign=193a40c3d304fc2d17fd0d8b9770cde0&c_uniq_tag=lUTq4vRo5QCNO-rX3pMCBsM8dHlJ2YJdv-XH42m2_EI&type=video_first_frame',
                            'date' => 1530779166,
                            'width' => 960,
                            'height' => 720,
                            'access_key' => '9520d62565bcf8715f',
                        ],
                        2 =>
                        [
                            'type' => 'video',
                            'id' => 456239032,
                            'owner_id' => -78441729,
                            'title' => 'Sed ut perspiciatis',
                            'description' => 'Sed ut perspiciatis, unde omnis iste natus',
                            'duration' => 24,
                            'image' => 'https://sun9-41.userapi.com/hkxeYK6b4Ik-DZZaLuZ7PGesM84P-XS44-znDQ/fbUghEFXzN0.jpg',
                            'date' => 1645250923,
                            'platform' => 'YouTube',
                            'access_key' => '6185d93f3fd09dfa60',
                        ],
                    ],
                    'group_id' => 78441729,
                    'event_id' => '45c27388eec9f10b7651b7ceb70da919342bff6b'
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
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'post_id' => 47,
                    'owner_id' => -78441729,
                    "parents_stack" => [48],
                    'reply_to_user' => 11412368,
                    'reply_to_comment' => 49,
                    'post_owner_id' => -78441729,
                    'secret' => 'law3xcx1',
                    'group_id' => 78441729,
                    'event_id' => '9183d109ea0d62fa892f784081d783b1ed1c0757'
                ], "reply/wall_reply_new.json", 'wall_reply_new'
            ],
            "wall_reply_restore" => [
                [
                    'type' => 'wall_reply_restore',
                    'id' => 49,
                    'from_id' => 11412368,
                    'date' => 1644331445,
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'owner_id' => -78441729,
                    "parents_stack" => [48],
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
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'post_id' => 47,
                    'owner_id' => -78441729,
                    "parents_stack" => [48],
                    'post_owner_id' => -78441729,
                    'secret' => 'law3xcx1',
                ], "reply/wall_reply_edit.json", 'wall_reply_edit'
            ],
            "wall_post_new_with_copy_history" => [
                [
                    'type' => 'wall_post_new',
                    'id' => 67,
                    'from_id' => -78441729,
                    'owner_id' => -78441729,
                    'date' => 1645257558,
                    'post_type' => 'post',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'created_by' => 11412368,
                    'copy_history_id' => 27,
                    'copy_history_from_id' => -31121976,
                    'copy_history_owner_id' => -31121976,
                    'copy_history_date' => 1645257546,
                    'copy_history_post_type' => 'post',
                    'copy_history_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'copy_history_video' =>
                        array(
                        1 =>
                            array(
                            'type' => 'video',
                            'access_key' => 'bdd766fc9ae3452244',
                            'id' => 456239021,
                            'owner_id' => -31121976,
                            'title' => 'Видео от Тестовая 2',
                            'duration' => 16,
                            'image' => 'https://i.mycdn.me/getVideoPreview?id=868846799498&idx=8&type=39&tkn=Xz4p8oRgiG5XtLlkLlx_NxEzP7w&fn=vid_w',
                            'first_frame' => 'https://i.mycdn.me/getVideoPreview?id=868846799498&idx=0&type=39&tkn=BPS7Gncux70UMJtjpr3y9ZgZt7s',
                            'date' => 1645257531,
                            'width' => 320,
                            'height' => 240,
                        ),
                        ),
                        'copy_history_photo' =>
                        array(
                        0 =>
                            array(
                            'type' => 'photo',
                            'id' => 457239025,
                            'album_id' => -7,
                            'owner_id' => -31121976,
                            'date' => 1645257546,
                            'image' => 'https://sun9-74.userapi.com/impg/z7zr4jeIF7JFeAfUQVxzHca264k6ZRBHnC8qyg/vH36KVXige0.jpg?size=700x486&quality=95&sign=5526491b3377f9cfc1aa101162932471&c_uniq_tag=E_TuH-zhqr98NCVbfsK4e3CR-zO2ZlpFBWNn5lEwzQM&type=album',
                            'user_id' => 100
                        ),
                        ),
                        'copy_history_audio' => [
                        2 =>
                            array(
                            'type' => 'audio',
                            'id' => 456244365,
                            'artist' => 'Walk Off The Earth',
                            'title' => 'Natalie',
                            'duration' => 25,
                            'url' => 'https://vk.com/mp3/audio_api_unavailable.mp3',
                            'owner_id' => 2000043182,
                            'date' => 1645257546,
                            ),
                    ],
                    'group_id' => 78441729,
                    'event_id' => '3bd0ccf4f857ed3a56879934617fe5d2ad6f22b8',
                ], "copy_history/wall_post_new_with_copy_history.json", 'wall_post_new'
            ]
        ];
    }
}
