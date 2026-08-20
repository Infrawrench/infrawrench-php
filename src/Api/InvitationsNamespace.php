<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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
use Infrawrench\Sdk\Model\AcceptInvitationRequest;
use Infrawrench\Sdk\Model\AcceptInvitationResponse;
use Infrawrench\Sdk\RequestOptions;

/** `$client->invitations` */
final class InvitationsNamespace extends ApiNamespace
{
    /** `$client->invitations->byToken` */
    public readonly InvitationsByTokenNamespace $byToken;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->byToken = new InvitationsByTokenNamespace($this->transport);
    }

    /**
     * Accept an invitation
     *
     * POST /api/invitations/accept
     *
     * Raises on 400: Bad request
     *
     * Raises on 403: Forbidden
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function accept(AcceptInvitationRequest $body, ?RequestOptions $options = null): AcceptInvitationResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/invitations/accept',
                body: $body->toArray(),
                hasBody: true,
            ),
            $options,
        );

        return AcceptInvitationResponse::fromArray(Coerce::toArray($data));
    }
}
