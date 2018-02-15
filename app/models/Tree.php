<?php 

class Tree extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'topic_nest';
    protected $primaryKey = 'nest_id';

    public function parent() {

        return $this->hasOne('Tree', 'parent_id');

    }

    public function children() {

        //return $this->hasMany('Tree', 'topic_id', 'parent_id');
		//return $this->belongsTo('Tree', 'topic_id');
		return $this->belongsTo('Tree');
		
    }  
    
    public function topic() {
    
    	return $this->hasOne('Topic', 'topic_id', 'topic_id');
    }

    public static function getTree() {

        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', NULL)->orderBy('nest_order')->get();

    }

}