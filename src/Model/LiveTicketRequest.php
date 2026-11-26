<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Model;

use Infrawrench\Sdk\Internal\Coerce;

final class LiveTicketRequest implements \JsonSerializable
{
    /**
     * @param 'jit-requests'|'access-requests'|'workflow-approvals'|'change-freezes'|'account-resources'|'resource'|'ci-runs' $topic What to watch. `jit-requests` and `access-requests` need `access:read`, `workflow-approvals` `workflows:read`, `change-freezes` `freezes:read`, `account-resources` (with `accountId`) and `resource` (with `resourceId`) `resources:read`, and `ci-runs` `ci:read`.
     * @param string|null $accountId The account, for `account-resources`.
     * @param string|null $resourceId The resource, for `resource`.
     * @param string|null $workflowId Narrow `workflow-approvals` to one workflow's pending approvals.
     */
    public function __construct(
        public readonly string $topic,
        public readonly ?string $accountId = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $workflowId = null,
    ) {
    }

    /**
     * Build one from a decoded JSON object.
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            topic: Coerce::toString($data['topic'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            workflowId: Coerce::toStringOrNull($data['workflowId'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'topic' => $this->topic,
        ];
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->workflowId !== null) {
            $payload['workflowId'] = $this->workflowId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
