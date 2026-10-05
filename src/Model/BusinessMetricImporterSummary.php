<?php

/*
 * infrawrench/sdk v1.66.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.66.0).
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

/**
 * The scheduled importer feeding this metric, or null when its values are only pushed.
 *
 * The API may send `null` in place of this object.
 */
final class BusinessMetricImporterSummary implements \JsonSerializable
{
    /**
     * @param string|null $sourceLabel The source plugin's name for itself, e.g. "CloudWatch metric".
     * @param 'success'|'error'|null $lastStatus
     */
    public function __construct(
        public readonly string $accountId,
        public readonly ?string $accountName,
        public readonly ?string $pluginId,
        public readonly ?string $sourceLabel,
        public readonly bool $enabled,
        public readonly ?string $lastRunAt,
        public readonly ?string $lastStatus,
        public readonly ?string $lastError,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            sourceLabel: Coerce::toStringOrNull($data['sourceLabel'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
            lastStatus: Coerce::toStringOrNull($data['lastStatus'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
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
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'sourceLabel' => $this->sourceLabel,
            'enabled' => $this->enabled,
            'lastRunAt' => $this->lastRunAt,
            'lastStatus' => $this->lastStatus,
            'lastError' => $this->lastError,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
