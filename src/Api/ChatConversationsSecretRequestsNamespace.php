<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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
use Infrawrench\Sdk\Model\ChatSecretRequestResult;
use Infrawrench\Sdk\Model\WorkflowSecretValueWrite;
use Infrawrench\Sdk\RequestOptions;

/** `$client->chat->conversations->secretRequests` */
final class ChatConversationsSecretRequestsNamespace extends ApiNamespace
{
    /**
     * Submit a requested workflow secret
     *
     * Human-only, write-only handoff from the chat password field to encrypted workflow-secret
     * storage. The value is never returned or added to chat history.
     *
     * POST /api/org/{orgId}/chat/conversations/{conversationId}/secret-requests/{requestId}
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
     * @param string $requestId Pending secret request id
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function create(string $conversationId, string $requestId, WorkflowSecretValueWrite $body, ?string $orgId = null, ?RequestOptions $options = null): ChatSecretRequestResult
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/org/{orgId}/chat/conversations/{conversationId}/secret-requests/{requestId}',
                pathParams: ['orgId' => $orgId, 'conversationId' => $conversationId, 'requestId' => $requestId],
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return ChatSecretRequestResult::fromArray(Coerce::toArray($data));
    }
}
