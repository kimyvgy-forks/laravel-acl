<?php

namespace Junges\ACL\Tests;

use Junges\ACL\Events\GroupSaving;
use Junges\ACL\Traits\GroupsTrait;
use Illuminate\Database\Eloquent\Model;
use Junges\ACL\Traits\ACLWildcardsTrait;

class Group extends Model
{
    use GroupsTrait;
    use ACLWildcardsTrait;

    protected $dates = ['deleted_at'];
    protected $table = 'test_groups';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    protected $dispatchesEvents = [
      'creating' => GroupSaving::class,
    ];
}
