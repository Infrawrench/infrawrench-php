<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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

final class HygieneFinding implements \JsonSerializable
{
    /**
     * @param string $id Stable across runs, so a client can remember what has been reviewed.
     * @param 'api_key_never_used'|'api_key_idle'|'api_key_expired_not_revoked'|'api_key_wildcard_scope'|'api_key_unused_scopes'|'ssh_key_never_used'|'ssh_key_idle'|'member_unused_permissions' $kind
     * @param 'high'|'medium'|'low' $severity
     * @param string $detail The evidence behind the finding.
     * @param 'api-key'|'ssh-key'|'member' $entityType
     * @param array<string, string|float|bool|null> $facts Structured detail for table columns and reports.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $kind,
        public readonly string $severity,
        public readonly string $title,
        public readonly string $detail,
        public readonly string $recommendation,
        public readonly string $entityType,
        public readonly string $entityId,
        public readonly string $entityName,
        public readonly array $facts,
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
            id: Coerce::toString($data['id'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            detail: Coerce::toString($data['detail'] ?? null),
            recommendation: Coerce::toString($data['recommendation'] ?? null),
            entityType: Coerce::toString($data['entityType'] ?? null),
            entityId: Coerce::toString($data['entityId'] ?? null),
            entityName: Coerce::toString($data['entityName'] ?? null),
            facts: Coerce::toArray($data['facts'] ?? null),
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
            'id' => $this->id,
            'kind' => $this->kind,
            'severity' => $this->severity,
            'title' => $this->title,
            'detail' => $this->detail,
            'recommendation' => $this->recommendation,
            'entityType' => $this->entityType,
            'entityId' => $this->entityId,
            'entityName' => $this->entityName,
            'facts' => $this->facts,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
