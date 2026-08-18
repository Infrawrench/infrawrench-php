<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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

final class SignSshKeyRequest implements \JsonSerializable
{
    /**
     * @param string $data The exact bytes SSH wants signed (a publickey-auth challenge), base64-encoded.
     * @param SshSignAlgorithm::* $algorithm
     * @param array{host?: string, username?: string}|null $context Recorded in the audit log entry for this signature.
     */
    public function __construct(
        public readonly string $data,
        public readonly string $algorithm,
        public readonly ?array $context = null,
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
            data: Coerce::toString($data['data'] ?? null),
            algorithm: Coerce::toString($data['algorithm'] ?? null),
            context: Coerce::toArrayOrNull($data['context'] ?? null),
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
            'data' => $this->data,
            'algorithm' => $this->algorithm,
        ];
        if ($this->context !== null) {
            $payload['context'] = $this->context;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
