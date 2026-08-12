<?php

/*
 * infrawrench/sdk v1.21.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.21.0).
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

final class IncidentTimelineEntry implements \JsonSerializable
{
    /**
     * @param 'incident'|'note'|'artifact'|'moment'|'probe'|'metric-alert' $source `moment` covers everything the moment union already indexes — resource changes, deployments, cost anomalies, provider status incidents, audit entries, change freezes and workflow runs. Nothing is copied into the incident's own tables; the timeline is a join, so re-reading it reflects the record as it stands today.
     * @param string $kind `<noun>.<verb>`. Open set — render unknown kinds generically.
     * @param 'info'|'warning'|'critical' $severity
     * @param array{kind: string, id?: string|null, parentId?: string|null, url?: string|null}|null $link
     */
    public function __construct(
        public readonly string $id,
        public readonly string $source,
        public readonly string $kind,
        public readonly string $at,
        public readonly string $title,
        public readonly string $severity,
        public readonly ?string $detail = null,
        public readonly ?string $authorName = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $resourceName = null,
        public readonly ?string $pluginId = null,
        public readonly ?string $accountId = null,
        public readonly ?array $link = null,
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
            source: Coerce::toString($data['source'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            at: Coerce::toString($data['at'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            detail: Coerce::toStringOrNull($data['detail'] ?? null),
            authorName: Coerce::toStringOrNull($data['authorName'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            resourceName: Coerce::toStringOrNull($data['resourceName'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            link: Coerce::toArrayOrNull($data['link'] ?? null),
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
            'source' => $this->source,
            'kind' => $this->kind,
            'at' => $this->at,
            'title' => $this->title,
            'severity' => $this->severity,
        ];
        if ($this->detail !== null) {
            $payload['detail'] = $this->detail;
        }
        if ($this->authorName !== null) {
            $payload['authorName'] = $this->authorName;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->resourceName !== null) {
            $payload['resourceName'] = $this->resourceName;
        }
        if ($this->pluginId !== null) {
            $payload['pluginId'] = $this->pluginId;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->link !== null) {
            $payload['link'] = $this->link;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
