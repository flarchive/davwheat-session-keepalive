<?php

namespace Davwheat\SessionKeepalive\Api\Controller;

use Davwheat\SessionKeepalive\Api\Serializer\CsrfTokenSerializer;
use Flarum\Api\Controller\AbstractShowController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class RefreshCsrfToken extends AbstractShowController
{
    /**
     * {@inheritdoc}
     */
    public $serializer = CsrfTokenSerializer::class;

    /**
     * {@inheritdoc}
     */
    public function data(ServerRequestInterface $request, Document $document)
    {
        /** @var \Illuminate\Session\Store */
        $session = $request->getAttribute('session');
        $csrfToken = $session->token();

        return [
            'token' => $csrfToken,
        ];
    }
}
