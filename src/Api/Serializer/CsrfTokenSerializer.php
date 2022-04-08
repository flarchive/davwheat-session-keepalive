<?php

namespace Davwheat\SessionKeepalive\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;
use InvalidArgumentException;

class CsrfTokenSerializer extends AbstractSerializer
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'csrf-keepalive-response';

    /**
     * {@inheritdoc}
     */
    public function getId($model)
    {
        return 1;
    }

    /**
     * {@inheritdoc}
     *
     * @param CsrfAutoRefresh $model
     * @throws InvalidArgumentException
     */
    protected function getDefaultAttributes($model)
    {
        return $model;
    }
}
