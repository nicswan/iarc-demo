<?php

class OrganController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function showOrgan($topic_id)
    {
        $topic = Topic::find($topic_id);

		if( !$topic->is_organ_topic ) return Redirect::to('topic/'.$topic->topic_id);
        return View::make('organ', array('topic' => $topic));
    }

}