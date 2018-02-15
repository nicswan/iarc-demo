<?php

class Topic extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'topic';
	protected $primaryKey = 'topic_id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

    public function parent() {

        return $this->hasOne('Topic', 'topic_id', 'parent_topic_id');

    }

    public function children() {

        return $this->hasMany('Topic', 'parent_topic_id', 'topic_id');
		//return $this->belongsTo('Tree', 'topic_id');
		//return $this->belongsTo('Tree');
		
    }  
    
    public function organChildren() {
    	
    	return $this->hasMany('Topic', 'parent_topic_id', 'topic_id')->where('is_organ_topic', '=', 1)->where('depth', '<=', 2);
    	
    }
    
    public function organTopic() {
    	return $this->hasOne('Topic', 'topic_id', 'organ_topic_id');
    }
    
    public static function getTree() {

        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_topic_id', '=', NULL)->orderBy('tree_order')->get();

    }
    
	public static function getBranch($id) {

        return static::with(implode('.', array_fill(0, 100, 'children')))->where('topic_id', '=', $id)->orderBy('tree_order')->get();

    }
    
    public static function getTopLevel() {
    	return static::where('parent_topic_id', '=', NULL)->orderBy('tree_order')->get();
    }
    
    public static function getOrganBranch($id) {
    	return static::where('parent_topic_id', '=', $id)->where('is_organ_topic', '=', true)->orderBy('tree_order')->orderBy('name')->get();
    }
    
    public static function getOrganTreeByDepth($depth) {
        	return static::with(implode('.', array_fill(0, 100, 'organChildren')))
        		->where('parent_topic_id', '=', NULL)
        		->where('is_organ_topic', '=', 1)
        		->where('depth', '<=', $depth)
        		->orderBy('tree_order')
        		->get();
    }
    
    /*public function topic() {
    
    	return $this->hasOne('Topic', 'topic_id', 'topic_id');
    }*/

}
