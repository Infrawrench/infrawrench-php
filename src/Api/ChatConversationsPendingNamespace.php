<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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
use Infrawrench\Sdk\Model\ChatAskQuestionInput;
use Infrawrench\Sdk\Model\ChatAskQuestionResult;
use Infrawrench\Sdk\RequestOptions;

/** `$client->chat->conversations->pending` */
final class ChatConversationsPendingNamespace extends ApiNamespace
{
    /**
     * Answer an agent question
     *
     * Submit answers to a chat-only `ask_question` pending action (selection with an Other field,
     * or a textarea). Not used for destructive-tool approval.
     *
     * _Requires permission: `chat:write`._
     *
     * POST /api/org/{orgId}/chat/conversations/{conversationId}/pending/{pendingId}/answer
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * Raises on 404: Not found
     *
     * Raises on 409: Conflict
     *
     * @param string $conversationId Chat conversation id
     * @param string $pendingId Pending ask_question action id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function answer(string $conversationId, string $pendingId, ChatAskQuestionInput $body, ?string $orgId = null, ?RequestOptions $options = null): ChatAskQuestionResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/chat/conversations/{conversationId}/pending/{pendingId}/answer',
                pathParams: ['orgId' => $orgId, 'conversationId' => $conversationId, 'pendingId' => $pendingId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ChatAskQuestionResult::fromArray(Coerce::toArray($data));
    }
}
