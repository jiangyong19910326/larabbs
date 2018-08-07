<?php

namespace App\Observers;

use App\Models\Reply;

use App\Notifications\TopicReplied;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function creating(Reply $reply)
    {

        $reply->content = clean($reply->content, 'user_topic_body');
        $reply->topic->increment('reply_count',1);
        // 通知作者话题被回复了
        $topic = $reply->topic;
        $topic->user->notify(new TopicReplied($reply));
    }

    public function updating(Reply $reply)
    {
        //
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }



}