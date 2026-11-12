<?php

/*
 * infrawrench/sdk v1.103.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.103.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Api;

use Infrawrench\Sdk\Internal\ApiNamespace;
use Infrawrench\Sdk\Internal\Coerce;
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\ChatSpendStatus;
use Infrawrench\Sdk\RequestOptions;

/** `$client->chat` */
final class ChatNamespace extends ApiNamespace
{
    /** `$client->chat->conversations` */
    public readonly ChatConversationsNamespace $conversations;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->conversations = new ChatConversationsNamespace($this->transport);
    }

    /**
     * Month-to-date chat spend and cap
     *
     * _Requires permission: `chat:read`._
     *
     * GET /api/org/{orgId}/chat/spend
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function spend(?string $orgId = null, ?RequestOptions $options = null): ChatSpendStatus
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/chat/spend',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ChatSpendStatus::fromArray(Coerce::toArray($data));
    }
}
