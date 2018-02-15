<?php

class TopicController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function showTopic($topic_id)
    {
        $topic = Topic::find($topic_id);

		if( $topic->is_organ_topic ) return Redirect::to('organ/'.$topic->topic_id); 
		
        return View::make('topic', array('topic' => $topic));
    }

}