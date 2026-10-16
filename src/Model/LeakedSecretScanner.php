<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class LeakedSecretScanner implements \JsonSerializable
{
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $label,
        public readonly bool $canResolve,
        public readonly bool $returnsSecretValue,
        public readonly ?string $lastScannedAt,
        public readonly ?string $lastError,
        public readonly ?int $lastCount,
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
            label: Coerce::toString($data['label'] ?? null),
            canResolve: Coerce::toBool($data['canResolve'] ?? null),
            returnsSecretValue: Coerce::toBool($data['returnsSecretValue'] ?? null),
            lastScannedAt: Coerce::toStringOrNull($data['lastScannedAt'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            lastCount: Coerce::toIntOrNull($data['lastCount'] ?? null),
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
            'label' => $this->label,
            'canResolve' => $this->canResolve,
            'returnsSecretValue' => $this->returnsSecretValue,
            'lastScannedAt' => $this->lastScannedAt,
            'lastError' => $this->lastError,
            'lastCount' => $this->lastCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
