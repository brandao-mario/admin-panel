<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	/**
	 * The table name
	 */
	protected $table = 'permissions';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 'slug'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }
}
