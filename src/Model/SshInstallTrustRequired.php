<?php

/*
 * infrawrench/sdk v1.76.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.76.0).
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

final class SshInstallTrustRequired implements \JsonSerializable
{
    /**
     * @param 'ssh_host_key_trust_required' $error
     * @param 'unknown'|'mismatch' $kind
     */
    public function __construct(
        public readonly string $error,
        public readonly string $message,
        public readonly string $kind,
        public readonly string $host,
        public readonly int $port,
        public readonly string $presentedFingerprint,
        public readonly ?string $storedFingerprint,
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
            error: Coerce::toString($data['error'] ?? null),
            message: Coerce::toString($data['message'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            host: Coerce::toString($data['host'] ?? null),
            port: Coerce::toInt($data['port'] ?? null),
            presentedFingerprint: Coerce::toString($data['presentedFingerprint'] ?? null),
            storedFingerprint: Coerce::toStringOrNull($data['storedFingerprint'] ?? null),
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
            'error' => $this->error,
            'message' => $this->message,
            'kind' => $this->kind,
            'host' => $this->host,
            'port' => $this->port,
            'presentedFingerprint' => $this->presentedFingerprint,
            'storedFingerprint' => $this->storedFingerprint,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
