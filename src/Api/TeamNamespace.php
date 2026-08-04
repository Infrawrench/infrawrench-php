<?php

/*
 * infrawrench/sdk v0.32.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.32.0).
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
use Infrawrench\Sdk\Model\MeResponse;
use Infrawrench\Sdk\Model\PermissionCatalog;
use Infrawrench\Sdk\RequestOptions;

/** `$client->team` */
final class TeamNamespace extends ApiNamespace
{
    /** `$client->team->invitations` */
    public readonly TeamInvitationsNamespace $invitations;

    /** `$client->team->members` */
    public readonly TeamMembersNamespace $members;

    /** `$client->team->roles` */
    public readonly TeamRolesNamespace $roles;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->invitations = new TeamInvitationsNamespace($this->transport);
        $this->members = new TeamMembersNamespace($this->transport);
        $this->roles = new TeamRolesNamespace($this->transport);
    }

    /**
     * Current user's effective permissions and role
     *
     * GET /api/org/{orgId}/team/me
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function me(?string $orgId = null, ?RequestOptions $options = null): MeResponse
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/team/me',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return MeResponse::fromArray(Coerce::toArray($data));
    }

    /**
     * List all permission strings the server recognises
     *
     * _Requires permission: `team:read`._
     *
     * GET /api/org/{orgId}/team/permissions
     *
     * @param string|null $orgId Organization id. Defaults to the `orgId` the client was constructed with.
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function permissions(?string $orgId = null, ?RequestOptions $options = null): PermissionCatalog
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/org/{orgId}/team/permissions',
                pathParams: ['orgId' => $orgId],
            ),
            $options,
        );

        return PermissionCatalog::fromArray(Coerce::toArray($data));
    }
}
