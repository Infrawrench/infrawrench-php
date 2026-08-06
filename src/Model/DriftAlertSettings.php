<?php

/*
 * infrawrench/sdk v0.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.36.0).
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

final class DriftAlertSettings implements \JsonSerializable
{
    /**
     * @param bool $notifyCreated Alert on resources that appeared.
     * @param bool $notifyUpdated Alert on field-level updates. Defaults to false — updates are the bulk of the volume and are usually a provider restating a value.
     * @param bool $notifyDeleted Alert on resources that disappeared.
     * @param int $cooldownMinutes Least time between drift notifications for this organization. One notification per window, no matter how many changes or accounts it covers.
     * @param int $minChanges Fewest matching changes in a window worth notifying about.
     * @param list<string> $accountIds Accounts to alert on. An empty array means every account.
     * @param string|null $lastNotifiedAt When this organization last had a drift digest delivered.
     */
    public function __construct(
        public readonly bool $notifyCreated,
        public readonly bool $notifyUpdated,
        public readonly bool $notifyDeleted,
        public readonly int $cooldownMinutes,
        public readonly int $minChanges,
        public readonly array $accountIds,
        public readonly ?string $lastNotifiedAt,
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
            notifyCreated: Coerce::toBool($data['notifyCreated'] ?? null),
            notifyUpdated: Coerce::toBool($data['notifyUpdated'] ?? null),
            notifyDeleted: Coerce::toBool($data['notifyDeleted'] ?? null),
            cooldownMinutes: Coerce::toInt($data['cooldownMinutes'] ?? null),
            minChanges: Coerce::toInt($data['minChanges'] ?? null),
            accountIds: Coerce::mapList($data['accountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            lastNotifiedAt: Coerce::toStringOrNull($data['lastNotifiedAt'] ?? null),
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
            'notifyCreated' => $this->notifyCreated,
            'notifyUpdated' => $this->notifyUpdated,
            'notifyDeleted' => $this->notifyDeleted,
            'cooldownMinutes' => $this->cooldownMinutes,
            'minChanges' => $this->minChanges,
            'accountIds' => $this->accountIds,
            'lastNotifiedAt' => $this->lastNotifiedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
