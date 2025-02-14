<?php

namespace Junges\ACL\Http\Models;

use Junges\ACL\Events\GroupSaving;
use Junges\ACL\Traits\GroupsTrait;
use Illuminate\Database\Eloquent\Model;
use Junges\ACL\Traits\ACLWildcardsTrait;

class Group extends Model
{
    use GroupsTrait;
    use ACLWildcardsTrait;

    protected $dates = ['deleted_at'];
    protected $table;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    protected $dispatchesEvents = [
      'creating' => GroupSaving::class,
    ];

    /**
     * Group constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('acl.tables.groups'));
    }
}
