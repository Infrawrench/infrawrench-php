<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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

final class NetworkFlowAccountStatus implements \JsonSerializable
{
    /**
     * @param bool $supportsFlows False when the account's provider has no flow source we can read. Such accounts are listed and excluded from the totals rather than contributing zero bytes — zero would be a claim about their network, this is a statement about our coverage.
     * @param list<NetworkFlowSource> $sources
     * @param float|null $lastQueryBytesScanned Log data the provider billed this account for the last collection's queries.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $displayName,
        public readonly bool $supportsFlows,
        public readonly ?string $collectedThrough,
        public readonly ?string $lastPolledAt,
        public readonly int $failureCount,
        public readonly ?string $lastError,
        public readonly ?string $lastErrorHelpUrl,
        public readonly array $sources,
        public readonly ?float $lastQueryBytesScanned,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            supportsFlows: Coerce::toBool($data['supportsFlows'] ?? null),
            collectedThrough: Coerce::toStringOrNull($data['collectedThrough'] ?? null),
            lastPolledAt: Coerce::toStringOrNull($data['lastPolledAt'] ?? null),
            failureCount: Coerce::toInt($data['failureCount'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            lastErrorHelpUrl: Coerce::toStringOrNull($data['lastErrorHelpUrl'] ?? null),
            sources: Coerce::mapList($data['sources'] ?? null, static fn (mixed $item): NetworkFlowSource => NetworkFlowSource::fromArray(Coerce::toArray($item))),
            lastQueryBytesScanned: Coerce::toFloatOrNull($data['lastQueryBytesScanned'] ?? null),
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
            'pluginId' => $this->pluginId,
            'displayName' => $this->displayName,
            'supportsFlows' => $this->supportsFlows,
            'collectedThrough' => $this->collectedThrough,
            'lastPolledAt' => $this->lastPolledAt,
            'failureCount' => $this->failureCount,
            'lastError' => $this->lastError,
            'lastErrorHelpUrl' => $this->lastErrorHelpUrl,
            'sources' => array_map(static fn (NetworkFlowSource $item): array => $item->toArray(), $this->sources),
            'lastQueryBytesScanned' => $this->lastQueryBytesScanned,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
