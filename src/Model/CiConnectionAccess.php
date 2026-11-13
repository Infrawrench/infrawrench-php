<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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

final class CiConnectionAccess implements \JsonSerializable
{
    /**
     * @param array{kinds: list<array<string, mixed>>, helpLink: array{label: string, url: string}|null}|null $executor
     * @param array{description: string, shortLived: bool, namespaces: bool}|null $credential
     * @param array<string, CiPreflightRecord> $preflight
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly ?array $executor,
        public readonly ?array $credential,
        public readonly CiConnectionAccessSettings $settings,
        public readonly array $preflight,
        public readonly ?string $updatedAt,
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
            executor: Coerce::toArrayOrNull($data['executor'] ?? null),
            credential: Coerce::toArrayOrNull($data['credential'] ?? null),
            settings: CiConnectionAccessSettings::fromArray(Coerce::toArray($data['settings'] ?? null)),
            preflight: Coerce::mapValues($data['preflight'] ?? null, static fn (mixed $item): CiPreflightRecord => CiPreflightRecord::fromArray(Coerce::toArray($item))),
            updatedAt: Coerce::toStringOrNull($data['updatedAt'] ?? null),
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
            'executor' => $this->executor,
            'credential' => $this->credential,
            'settings' => $this->settings->toArray(),
            'preflight' => array_map(static fn (CiPreflightRecord $item): array => $item->toArray(), $this->preflight),
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
