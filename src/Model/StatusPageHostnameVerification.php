<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

/** The API may send `null` in place of this object. */
final class StatusPageHostnameVerification implements \JsonSerializable
{
    /**
     * @param string $cnameTarget Target of the customer's CNAME (e.g. statuspages.infrawrench.com).
     * @param string|null $txtName Ownership TXT name, when Cloudflare asked for one.
     * @param string|null $txtValue Ownership TXT value, when Cloudflare asked for one.
     */
    public function __construct(
        public readonly string $cnameTarget,
        public readonly ?string $txtName = null,
        public readonly ?string $txtValue = null,
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
            cnameTarget: Coerce::toString($data['cnameTarget'] ?? null),
            txtName: Coerce::toStringOrNull($data['txtName'] ?? null),
            txtValue: Coerce::toStringOrNull($data['txtValue'] ?? null),
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
            'cnameTarget' => $this->cnameTarget,
        ];
        if ($this->txtName !== null) {
            $payload['txtName'] = $this->txtName;
        }
        if ($this->txtValue !== null) {
            $payload['txtValue'] = $this->txtValue;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
