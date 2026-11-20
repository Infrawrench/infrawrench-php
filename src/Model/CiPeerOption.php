<?php

/*
 * infrawrench/sdk v1.123.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.123.0).
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

final class CiPeerOption implements \JsonSerializable
{
    /**
     * @param array{description: string, shortLived: bool, namespaces: bool}|null $credential
     * @param array{kinds: list<array<string, mixed>>, helpLink: array{label: string, url: string}|null}|null $executor
     * @param string $lends The credential a job is lent, as the resource's provider declares it.
     * @param string $reach What that credential reaches beyond the resource.
     * @param string $lifetime How long it lasts once lent.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly ?array $credential,
        public readonly ?array $executor,
        public readonly string $lends,
        public readonly string $reach,
        public readonly string $lifetime,
        public readonly ?string $unavailable,
        public readonly ?string $unreachable,
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
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            credential: Coerce::toArrayOrNull($data['credential'] ?? null),
            executor: Coerce::toArrayOrNull($data['executor'] ?? null),
            lends: Coerce::toString($data['lends'] ?? null),
            reach: Coerce::toString($data['reach'] ?? null),
            lifetime: Coerce::toString($data['lifetime'] ?? null),
            unavailable: Coerce::toStringOrNull($data['unavailable'] ?? null),
            unreachable: Coerce::toStringOrNull($data['unreachable'] ?? null),
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
            'pluginName' => $this->pluginName,
            'credential' => $this->credential,
            'executor' => $this->executor,
            'lends' => $this->lends,
            'reach' => $this->reach,
            'lifetime' => $this->lifetime,
            'unavailable' => $this->unavailable,
            'unreachable' => $this->unreachable,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
