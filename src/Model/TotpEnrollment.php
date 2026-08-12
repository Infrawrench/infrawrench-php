<?php

/*
 * infrawrench/sdk v1.22.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.22.0).
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

final class TotpEnrollment implements \JsonSerializable
{
    /**
     * @param string|null $qrCode Data-URI image of the enrolment QR code
     * @param string|null $secret Base32 secret, for manual entry
     * @param string|null $uri `otpauth://` URI
     */
    public function __construct(
        public readonly string $factorId,
        public readonly string $challengeId,
        public readonly ?string $qrCode,
        public readonly ?string $secret,
        public readonly ?string $uri,
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
            factorId: Coerce::toString($data['factorId'] ?? null),
            challengeId: Coerce::toString($data['challengeId'] ?? null),
            qrCode: Coerce::toStringOrNull($data['qrCode'] ?? null),
            secret: Coerce::toStringOrNull($data['secret'] ?? null),
            uri: Coerce::toStringOrNull($data['uri'] ?? null),
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
            'factorId' => $this->factorId,
            'challengeId' => $this->challengeId,
            'qrCode' => $this->qrCode,
            'secret' => $this->secret,
            'uri' => $this->uri,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
