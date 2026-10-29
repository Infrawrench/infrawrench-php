<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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
 * `data` of a `drift.detected` event, version 1. Resources changed outside Infrawrench since the
 * last drift window.
 *
 * Spec schema: `EventData_drift_detected_v1`.
 */
final class EventDataDriftDetectedV1 implements \JsonSerializable
{
    /**
     * @param string $since Start of the window the changes were observed in.
     * @param int $changeCount Changes in the window.
     * @param int $created Resources that appeared.
     * @param int $updated Resources whose fields changed.
     * @param int $deleted Resources that disappeared.
     * @param list<string> $accountIds Accounts the changes touched.
     */
    public function __construct(
        public readonly string $since,
        public readonly int $changeCount,
        public readonly int $created,
        public readonly int $updated,
        public readonly int $deleted,
        public readonly array $accountIds,
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
            since: Coerce::toString($data['since'] ?? null),
            changeCount: Coerce::toInt($data['changeCount'] ?? null),
            created: Coerce::toInt($data['created'] ?? null),
            updated: Coerce::toInt($data['updated'] ?? null),
            deleted: Coerce::toInt($data['deleted'] ?? null),
            accountIds: Coerce::mapList($data['accountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'since' => $this->since,
            'changeCount' => $this->changeCount,
            'created' => $this->created,
            'updated' => $this->updated,
            'deleted' => $this->deleted,
            'accountIds' => $this->accountIds,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
