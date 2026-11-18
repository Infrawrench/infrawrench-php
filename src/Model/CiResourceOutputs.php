<?php

/*
 * infrawrench/sdk v1.120.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.120.0).
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

final class CiResourceOutputs implements \JsonSerializable
{
    /**
     * @param list<array{key: string, label: string, sensitive: bool}> $outputs
     * @param list<array{id: string, state: string, createdAt: string|null}>|null $secretVersions
     * @param list<CiPeerOption>|null $peers The plugins it can be lent to CI as, through its type's peer integrations: those that lend a connection or run cloud jobs.
     */
    public function __construct(
        public readonly array $outputs,
        public readonly ?array $secretVersions,
        public readonly ?array $peers = null,
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
            outputs: Coerce::mapList($data['outputs'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            secretVersions: Coerce::nullable($data['secretVersions'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            peers: Coerce::nullable($data['peers'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CiPeerOption => CiPeerOption::fromArray(Coerce::toArray($item)))),
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
            'outputs' => $this->outputs,
            'secretVersions' => $this->secretVersions,
        ];
        if ($this->peers !== null) {
            $payload['peers'] = array_map(static fn (CiPeerOption $item): array => $item->toArray(), $this->peers);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
