<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class SshFanoutHostResult implements \JsonSerializable
{
    /**
     * @param 'account'|'resource' $kind
     * @param 'done'|'error'|'blocked' $status
     * @param array{kind: 'unknown'|'mismatch', host: string, port: int, presentedFingerprint: string, storedFingerprint: string|null}|null $hostKeyTrust
     */
    public function __construct(
        public readonly string $kind,
        public readonly string $targetId,
        public readonly string $label,
        public readonly string $status,
        public readonly ?int $exitCode,
        public readonly string $stdout,
        public readonly string $stderr,
        public readonly float $durationMs,
        public readonly ?string $error = null,
        public readonly ?array $hostKeyTrust = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            targetId: Coerce::toString($data['targetId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            exitCode: Coerce::toIntOrNull($data['exitCode'] ?? null),
            stdout: Coerce::toString($data['stdout'] ?? null),
            stderr: Coerce::toString($data['stderr'] ?? null),
            durationMs: Coerce::toFloat($data['durationMs'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            hostKeyTrust: Coerce::toArrayOrNull($data['hostKeyTrust'] ?? null),
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
            'kind' => $this->kind,
            'targetId' => $this->targetId,
            'label' => $this->label,
            'status' => $this->status,
            'exitCode' => $this->exitCode,
            'stdout' => $this->stdout,
            'stderr' => $this->stderr,
            'durationMs' => $this->durationMs,
        ];
        if ($this->error !== null) {
            $payload['error'] = $this->error;
        }
        if ($this->hostKeyTrust !== null) {
            $payload['hostKeyTrust'] = $this->hostKeyTrust;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
