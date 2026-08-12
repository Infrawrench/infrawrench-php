<?php

/*
 * infrawrench/sdk v1.14.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.14.0).
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

final class PreflightReport implements \JsonSerializable
{
    /**
     * @param string|null $identity Provider-side identity the credential resolved to (ARN, service account…).
     * @param list<PreflightCheck> $checks
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly bool $supported,
        public readonly ?string $identity,
        public readonly array $checks,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            supported: Coerce::toBool($data['supported'] ?? null),
            identity: Coerce::toStringOrNull($data['identity'] ?? null),
            checks: Coerce::mapList($data['checks'] ?? null, static fn (mixed $item): PreflightCheck => PreflightCheck::fromArray(Coerce::toArray($item))),
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
            'pluginId' => $this->pluginId,
            'supported' => $this->supported,
            'identity' => $this->identity,
            'checks' => array_map(static fn (PreflightCheck $item): array => $item->toArray(), $this->checks),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
