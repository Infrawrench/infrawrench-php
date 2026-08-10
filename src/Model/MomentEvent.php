<?php

/*
 * infrawrench/sdk v1.3.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.3.0).
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

final class MomentEvent implements \JsonSerializable
{
    /**
     * @param string $id Stable synthetic id, unique within a response (`feed:rowId[:phase]`).
     * @param MomentFeedId::* $feed
     * @param string $kind Fine-grained `<noun>.<verb>` kind, e.g. `change.created`, `incident.started`, `workflow-run.failed`, `deployment.finished`, `freeze.started`, `drift-alert.sent`. Open set — render unknown kinds generically.
     * @param string $title One-line headline.
     * @param MomentSeverity::* $severity
     * @param string|null $detail Optional second line — diff summary, actor, error text.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $feed,
        public readonly string $kind,
        public readonly string $timestamp,
        public readonly string $title,
        public readonly string $severity,
        public readonly ?string $detail = null,
        public readonly ?string $pluginId = null,
        public readonly ?string $accountId = null,
        public readonly ?string $accountName = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $resourceTypeId = null,
        public readonly ?string $resourceName = null,
        public readonly ?MomentEventLink $link = null,
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
            feed: Coerce::toString($data['feed'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            timestamp: Coerce::toString($data['timestamp'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            detail: Coerce::toStringOrNull($data['detail'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            resourceName: Coerce::toStringOrNull($data['resourceName'] ?? null),
            link: Coerce::nullable($data['link'] ?? null, static fn (mixed $value): MomentEventLink => MomentEventLink::fromArray(Coerce::toArray($value))),
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
            'id' => $this->id,
            'feed' => $this->feed,
            'kind' => $this->kind,
            'timestamp' => $this->timestamp,
            'title' => $this->title,
            'severity' => $this->severity,
        ];
        if ($this->detail !== null) {
            $payload['detail'] = $this->detail;
        }
        if ($this->pluginId !== null) {
            $payload['pluginId'] = $this->pluginId;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->accountName !== null) {
            $payload['accountName'] = $this->accountName;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->resourceTypeId !== null) {
            $payload['resourceTypeId'] = $this->resourceTypeId;
        }
        if ($this->resourceName !== null) {
            $payload['resourceName'] = $this->resourceName;
        }
        if ($this->link !== null) {
            $payload['link'] = $this->link?->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
