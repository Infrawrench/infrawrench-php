<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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

final class IacStateUploadRequest implements \JsonSerializable
{
    /**
     * @param string $document The state document, as text: a raw `.tfstate` (format version 4) or the output of `terraform show -json` (format_version 1.x). Limited to 8 MiB.
     */
    public function __construct(
        public readonly string $label,
        public readonly string $document,
        public readonly ?string $accountId = null,
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
            label: Coerce::toString($data['label'] ?? null),
            document: Coerce::toString($data['document'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
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
            'label' => $this->label,
            'document' => $this->document,
        ];
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
