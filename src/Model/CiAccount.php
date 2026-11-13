<?php

/*
 * infrawrench/sdk v1.106.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.106.0).
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

final class CiAccount implements \JsonSerializable
{
    public function __construct(
        public readonly int $installationId,
        public readonly string $accountLogin,
        public readonly ?string $accountType,
        public readonly bool $ciEnabled,
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
            installationId: Coerce::toInt($data['installationId'] ?? null),
            accountLogin: Coerce::toString($data['accountLogin'] ?? null),
            accountType: Coerce::toStringOrNull($data['accountType'] ?? null),
            ciEnabled: Coerce::toBool($data['ciEnabled'] ?? null),
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
            'installationId' => $this->installationId,
            'accountLogin' => $this->accountLogin,
            'accountType' => $this->accountType,
            'ciEnabled' => $this->ciEnabled,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
