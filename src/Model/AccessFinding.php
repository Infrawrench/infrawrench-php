<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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

final class AccessFinding implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id the finding is on.
     * @param 'access-review:stale-principal'|'access-review:admin-principal'|'access-review:key-past-rotation'|'access-review:no-recorded-owner'|'access-review:no-mfa' $ruleId Which rule was raised. Half of a dismissal's key, alongside the resource id. The `access-review:` prefix is reserved so these can share the posture dismissal store without colliding with plugin-declared posture rule ids.
     * @param 'critical'|'high'|'medium'|'low' $severity How bad the finding is. `critical` and `high` findings ride the posture alert window; `medium` and `low` are review work surfaced on the access review screen and in the weekly digest only.
     * @param string $reason Why this principal is flagged, in a sentence.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $ruleId,
        public readonly string $title,
        public readonly string $severity,
        public readonly string $reason,
        public readonly AccessPrincipal $principal,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            ruleId: Coerce::toString($data['ruleId'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
            principal: AccessPrincipal::fromArray(Coerce::toArray($data['principal'] ?? null)),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'resourceId' => $this->resourceId,
            'ruleId' => $this->ruleId,
            'title' => $this->title,
            'severity' => $this->severity,
            'reason' => $this->reason,
            'principal' => $this->principal->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
