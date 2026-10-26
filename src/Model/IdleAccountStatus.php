<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class IdleAccountStatus implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param string|null $lastError Last collection failure; null after a success.
     * @param string|null $helpUrl https link to the fix for a permission gap.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly ?string $lastPolledAt,
        public readonly ?string $nextPollAt,
        public readonly ?string $lastError,
        public readonly ?string $helpLabel,
        public readonly ?string $helpUrl,
        public readonly int $findingCount,
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
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            lastPolledAt: Coerce::toStringOrNull($data['lastPolledAt'] ?? null),
            nextPollAt: Coerce::toStringOrNull($data['nextPollAt'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            helpLabel: Coerce::toStringOrNull($data['helpLabel'] ?? null),
            helpUrl: Coerce::toStringOrNull($data['helpUrl'] ?? null),
            findingCount: Coerce::toInt($data['findingCount'] ?? null),
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
            'pluginName' => $this->pluginName,
            'lastPolledAt' => $this->lastPolledAt,
            'nextPollAt' => $this->nextPollAt,
            'lastError' => $this->lastError,
            'helpLabel' => $this->helpLabel,
            'helpUrl' => $this->helpUrl,
            'findingCount' => $this->findingCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
