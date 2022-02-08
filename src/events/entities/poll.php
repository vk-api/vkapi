<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue};

function poll($data)
{
    return [
        "type" => getValue($data, ['type']),
        "multiple" =>  getValue($data, ['poll', 'multiple']),
        "end_date" =>  getValue($data, ['poll', 'end_date']),
        "closed" =>  getValue($data, ['poll', 'closed']),
        "is_board" =>  getValue($data, ['poll', 'is_board']),
        "can_edit" =>  getValue($data, ['poll', 'can_edit']),
        "can_vote" =>  getValue($data, ['poll', 'can_vote']),
        "can_report" => getValue($data, ['poll', 'can_report']),
        "can_share" => getValue($data, ['poll', 'can_share']),
        "created" => getValue($data, ['poll', 'created']),
        "id" => getValue($data, ['poll', 'id']),
        "owner_id" => getValue($data, ['poll', 'owner_id']),
        "question" => getValue($data, ['poll', 'question']),
        "votes" => getValue($data, ['poll', 'votes']),
        "disable_unvote" => getValue($data, ['poll', 'disable_unvote']),
        "anonymous" => getValue($data, ['poll', 'anonymous']),
        "answer_ids" => [], // getValue($data, ['poll', 'answer_ids']),
        "embed_hash" => getValue($data, ['poll', 'embed_hash']),
        "answers" =>                             [
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
        ], // getValue($data, ['poll', 'answers']),
        "author_id" => getValue($data, ['poll', 'author_id']),
        "background" => [
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
        ] //getValue($data, ['poll', 'background']) 
    ];
}
