<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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

final class NetworkFlowSource implements \JsonSerializable
{
    /**
     * @param string $target What the flow log is attached to — a VPC id, a network.
     * @param string|null $unusableReason Why the source cannot be read, in terms that name the fix.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $target,
        public readonly ?string $region,
        public readonly string $destinationType,
        public readonly bool $usable,
        public readonly ?string $unusableReason,
        public readonly ?string $helpUrl,
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
            id: Coerce::toString($data['id'] ?? null),
            target: Coerce::toString($data['target'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            destinationType: Coerce::toString($data['destinationType'] ?? null),
            usable: Coerce::toBool($data['usable'] ?? null),
            unusableReason: Coerce::toStringOrNull($data['unusableReason'] ?? null),
            helpUrl: Coerce::toStringOrNull($data['helpUrl'] ?? null),
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
            'id' => $this->id,
            'target' => $this->target,
            'region' => $this->region,
            'destinationType' => $this->destinationType,
            'usable' => $this->usable,
            'unusableReason' => $this->unusableReason,
            'helpUrl' => $this->helpUrl,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
