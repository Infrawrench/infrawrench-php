<?php

/*
 * infrawrench/sdk v1.74.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.1).
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

/**
 * Somebody's explanation of this firing. Null while there is none.
 *
 * The API may send `null` in place of this object.
 */
final class BudgetAlertNote implements \JsonSerializable
{
    /**
     * @param string $notedAt When the note as it now reads was written; a rewrite restamps it.
     * @param string|null $notedByName The author's display name, or email when they have none.
     * @param string|null $annotationId The org-wide cost annotation the note drew on the charts at the day the alert fired (see /cost-annotations). Null once that marker is deleted; the note itself stays.
     */
    public function __construct(
        public readonly string $text,
        public readonly string $notedAt,
        public readonly ?string $notedByUserId,
        public readonly ?string $notedByName,
        public readonly ?string $annotationId,
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
            text: Coerce::toString($data['text'] ?? null),
            notedAt: Coerce::toString($data['notedAt'] ?? null),
            notedByUserId: Coerce::toStringOrNull($data['notedByUserId'] ?? null),
            notedByName: Coerce::toStringOrNull($data['notedByName'] ?? null),
            annotationId: Coerce::toStringOrNull($data['annotationId'] ?? null),
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
            'text' => $this->text,
            'notedAt' => $this->notedAt,
            'notedByUserId' => $this->notedByUserId,
            'notedByName' => $this->notedByName,
            'annotationId' => $this->annotationId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
