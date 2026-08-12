<?php

/*
 * infrawrench/sdk v1.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.17.0).
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

final class CreditPollFailure implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param string|null $helpUrl Set when the plugin reported a permission gap rather than an outage.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $error,
        public readonly ?string $helpLabel,
        public readonly ?string $helpUrl,
        public readonly int $failureCount,
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
            error: Coerce::toString($data['error'] ?? null),
            helpLabel: Coerce::toStringOrNull($data['helpLabel'] ?? null),
            helpUrl: Coerce::toStringOrNull($data['helpUrl'] ?? null),
            failureCount: Coerce::toInt($data['failureCount'] ?? null),
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
            'error' => $this->error,
            'helpLabel' => $this->helpLabel,
            'helpUrl' => $this->helpUrl,
            'failureCount' => $this->failureCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
