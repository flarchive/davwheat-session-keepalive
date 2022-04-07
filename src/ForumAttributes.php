<?php

namespace Davwheat\SessionKeepalive;

use Flarum\Api\Serializer\ForumSerializer;
use Illuminate\Contracts\Container\Container;

class ForumAttributes
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function __invoke(ForumSerializer $serializer, $forum, array $attributes)
    {
        // Allow setting to override permission
        $attributes['sessionLifetimeMins'] = $this->container['config']['session.lifetime'];

        return $attributes;
    }
}
