<?php

namespace Vkapi\events\event;

use function Vkapi\parser\{getValue};

function poll($data)
{
    $array = [
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
        "answer_ids" => getValue($data, ['poll', 'answer_ids']),
        "embed_hash" => getValue($data, ['poll', 'embed_hash']),
        "answers" =>  getValue($data, ['poll', 'answers']),
        "author_id" => getValue($data, ['poll', 'author_id']),
        "background" => getValue($data, ['poll', 'background'])
    ];

    return $array;
}
