<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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

final class QuotaAccountStatus implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param int $quotaCount Quota rows currently stored for this account.
     * @param string|null $lastPolledAt Last successful collection; null if never.
     * @param string|null $lastError Last collection failure, or null when the last pass succeeded.
     * @param string|null $lastErrorHelpUrl Set when the failure was a fixable permission gap rather than an outage.
     * @param bool $partial The plugin reports a representative subset of the provider's quotas, not all of them. True for AWS and DigitalOcean.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly int $quotaCount,
        public readonly ?string $lastPolledAt,
        public readonly ?string $lastError,
        public readonly ?string $lastErrorHelpLabel,
        public readonly ?string $lastErrorHelpUrl,
        public readonly bool $partial,
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
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            quotaCount: Coerce::toInt($data['quotaCount'] ?? null),
            lastPolledAt: Coerce::toStringOrNull($data['lastPolledAt'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            lastErrorHelpLabel: Coerce::toStringOrNull($data['lastErrorHelpLabel'] ?? null),
            lastErrorHelpUrl: Coerce::toStringOrNull($data['lastErrorHelpUrl'] ?? null),
            partial: Coerce::toBool($data['partial'] ?? null),
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
            'quotaCount' => $this->quotaCount,
            'lastPolledAt' => $this->lastPolledAt,
            'lastError' => $this->lastError,
            'lastErrorHelpLabel' => $this->lastErrorHelpLabel,
            'lastErrorHelpUrl' => $this->lastErrorHelpUrl,
            'partial' => $this->partial,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
