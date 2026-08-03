<?php

/*
 * infrawrench/sdk v0.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.28.0).
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

final class CostAccountStatus implements \JsonSerializable
{
    /**
     * @param list<'service'|'region'|'resource'|'tag'> $dimensions
     * @param array{message: string, helpLink: array{label: string, url: string}|null}|null $costPollError Last cost-collection failure for this account, cleared on the next success. `helpLink` points at the provider page that fixes a setup problem when the plugin can identify one (e.g. GCP's billing export console).
     * @param array{firstDay: string, lastDay: string}|null $coverage
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $displayName,
        public readonly bool $supportsCosts,
        public readonly bool $periodNative,
        public readonly array $dimensions,
        public readonly ?string $costLastPolledAt,
        public readonly ?string $costBackfilledAt,
        public readonly int $costPollFailureCount,
        public readonly ?array $costPollError,
        public readonly ?array $coverage,
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
            supportsCosts: Coerce::toBool($data['supportsCosts'] ?? null),
            periodNative: Coerce::toBool($data['periodNative'] ?? null),
            dimensions: Coerce::mapList($data['dimensions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            costLastPolledAt: Coerce::toStringOrNull($data['costLastPolledAt'] ?? null),
            costBackfilledAt: Coerce::toStringOrNull($data['costBackfilledAt'] ?? null),
            costPollFailureCount: Coerce::toInt($data['costPollFailureCount'] ?? null),
            costPollError: Coerce::toArrayOrNull($data['costPollError'] ?? null),
            coverage: Coerce::toArrayOrNull($data['coverage'] ?? null),
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
            'supportsCosts' => $this->supportsCosts,
            'periodNative' => $this->periodNative,
            'dimensions' => $this->dimensions,
            'costLastPolledAt' => $this->costLastPolledAt,
            'costBackfilledAt' => $this->costBackfilledAt,
            'costPollFailureCount' => $this->costPollFailureCount,
            'costPollError' => $this->costPollError,
            'coverage' => $this->coverage,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
