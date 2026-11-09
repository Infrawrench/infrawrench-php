<?php

/*
 * infrawrench/sdk v1.101.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.101.0).
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
use Infrawrench\Sdk\Model\ChatConversationCreateInput;
use Infrawrench\Sdk\Model\ChatConversationCreated;
use Infrawrench\Sdk\Model\ChatConversationDetail;
use Infrawrench\Sdk\Model\ChatConversationList;
use Infrawrench\Sdk\Model\ChatConversationModelInput;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\RequestOptions;

/** `$client->chat->conversations` */
final class ChatConversationsNamespace extends ApiNamespace
{
    /** `$client->chat->conversations->pending` */
    public readonly ChatConversationsPendingNamespace $pending;

    /** `$client->chat->conversations->secretRequests` */
    public readonly ChatConversationsSecretRequestsNamespace $secretRequests;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->pending = new ChatConversationsPendingNamespace($this->transport);
        $this->secretRequests = new ChatConversationsSecretRequestsNamespace($this->transport);
    }

    /**
     * Start a chat conversation
     *
     * Creates an empty conversation owned by the caller. Send its first message with `POST
     * /conversations/{conversationId}/messages`.
     *
     * _Requires permission: `chat:write`._
     *
     * POST /api/org/{orgId}/chat/conversations
     *
     * Raises on 400: Bad request
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(ChatConversationCreateInput $body, ?string $orgId = null, ?RequestOptions $options = null): ChatConversationCreated
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/chat/conversations',
                pathParams: ['orgId' => $orgId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ChatConversationCreated::fromArray(Coerce::toArray($data));
    }

    /**
     * Archive a conversation
     *
     * Hides the conversation from the list; its history is kept. Answers `ok` whether or not the
     * conversation was the caller's.
     *
     * _Requires permission: `chat:write`._
     *
     * DELETE /api/org/{orgId}/chat/conversations/{conversationId}
     *
     * @param string $conversationId Chat conversation id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(string $conversationId, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/org/{orgId}/chat/conversations/{conversationId}',
                pathParams: ['orgId' => $orgId, 'conversationId' => $conversationId],
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * List the caller's chat conversations
     *
     * _Requires permission: `chat:read`._
     *
     * GET /api/org/{orgId}/chat/conversations
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?string $orgId = null, ?RequestOptions $options = null): ChatConversationList
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/chat/conversations',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return ChatConversationList::fromArray(Coerce::toArray($data));
    }

    /**
     * A conversation with its messages and pending items
     *
     * _Requires permission: `chat:read`._
     *
     * GET /api/org/{orgId}/chat/conversations/{conversationId}
     *
     * Raises on 404: Not found
     *
     * @param string $conversationId Chat conversation id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function getOrgOrgIdChatConversationsConversationId(string $conversationId, ?string $orgId = null, ?RequestOptions $options = null): ChatConversationDetail
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/chat/conversations/{conversationId}',
                pathParams: ['orgId' => $orgId, 'conversationId' => $conversationId],
            ),
            $options,
        );

        return ChatConversationDetail::fromArray(Coerce::toArray($data));
    }

    /**
     * Switch a conversation's model
     *
     * Takes effect on the conversation's next turn.
     *
     * _Requires permission: `chat:write`._
     *
     * PATCH /api/org/{orgId}/chat/conversations/{conversationId}
     *
     * Raises on 400: Bad request
     *
     * Raises on 404: Not found
     *
     * @param string $conversationId Chat conversation id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(string $conversationId, ChatConversationModelInput $body, ?string $orgId = null, ?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/org/{orgId}/chat/conversations/{conversationId}',
                pathParams: ['orgId' => $orgId, 'conversationId' => $conversationId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }
}
