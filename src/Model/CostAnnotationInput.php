<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class CostAnnotationInput implements \JsonSerializable
{
    /**
     * @param string $startDate Inclusive first day (UTC) the note is about. Mapped to whichever bucket holds it at the chart's binning — daily and cumulative use the day itself, weekly the Monday that starts its week, monthly the first of its month.
     * @param string|null $endDate Inclusive last day, or null for a note about a single moment. A deploy is a moment; a migration is a week, and a week spelled as seven notes misstates how many things happened. An end equal to the start is stored as null — the same fact has one spelling.
     * @param string|null $costReportId The report this note is scoped to, or null for **org-wide**. Null is the useful default: an org-wide note is drawn on every cost chart, because "we changed instance types" is not a fact about one report. An id from another org is a 400.
     */
    public function __construct(
        public readonly string $startDate,
        public readonly string $text,
        public readonly ?string $endDate = null,
        public readonly ?string $costReportId = null,
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
            startDate: Coerce::toString($data['startDate'] ?? null),
            text: Coerce::toString($data['text'] ?? null),
            endDate: Coerce::toStringOrNull($data['endDate'] ?? null),
            costReportId: Coerce::toStringOrNull($data['costReportId'] ?? null),
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
            'startDate' => $this->startDate,
            'text' => $this->text,
        ];
        if ($this->endDate !== null) {
            $payload['endDate'] = $this->endDate;
        }
        if ($this->costReportId !== null) {
            $payload['costReportId'] = $this->costReportId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
