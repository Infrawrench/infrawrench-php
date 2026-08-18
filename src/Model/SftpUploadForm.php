<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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

use Infrawrench\Sdk\FileUpload;
use Infrawrench\Sdk\Internal\Coerce;

final class SftpUploadForm implements \JsonSerializable
{
    public function __construct(
        public readonly string $accountId,
        public readonly string $remotePath,
        public readonly FileUpload|string $file,
        public readonly ?string $sshKeyId = null,
        public readonly ?string $sshHost = null,
        public readonly ?string $sshUsername = null,
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
            remotePath: Coerce::toString($data['remotePath'] ?? null),
            file: Coerce::toBytes($data['file'] ?? null),
            sshKeyId: Coerce::toStringOrNull($data['sshKeyId'] ?? null),
            sshHost: Coerce::toStringOrNull($data['sshHost'] ?? null),
            sshUsername: Coerce::toStringOrNull($data['sshUsername'] ?? null),
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
            'accountId' => $this->accountId,
            'remotePath' => $this->remotePath,
            'file' => $this->file,
        ];
        if ($this->sshKeyId !== null) {
            $payload['sshKeyId'] = $this->sshKeyId;
        }
        if ($this->sshHost !== null) {
            $payload['sshHost'] = $this->sshHost;
        }
        if ($this->sshUsername !== null) {
            $payload['sshUsername'] = $this->sshUsername;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
