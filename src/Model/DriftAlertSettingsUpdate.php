<?php

/*
 * infrawrench/sdk v0.43.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.43.0).
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

final class DriftAlertSettingsUpdate implements \JsonSerializable
{
    /** @param list<string>|null $accountIds */
    public function __construct(
        public readonly ?bool $notifyCreated = null,
        public readonly ?bool $notifyUpdated = null,
        public readonly ?bool $notifyDeleted = null,
        public readonly ?int $cooldownMinutes = null,
        public readonly ?int $minChanges = null,
        public readonly ?array $accountIds = null,
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
            notifyCreated: Coerce::toBoolOrNull($data['notifyCreated'] ?? null),
            notifyUpdated: Coerce::toBoolOrNull($data['notifyUpdated'] ?? null),
            notifyDeleted: Coerce::toBoolOrNull($data['notifyDeleted'] ?? null),
            cooldownMinutes: Coerce::toIntOrNull($data['cooldownMinutes'] ?? null),
            minChanges: Coerce::toIntOrNull($data['minChanges'] ?? null),
            accountIds: Coerce::nullable($data['accountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
        ];
        if ($this->notifyCreated !== null) {
            $payload['notifyCreated'] = $this->notifyCreated;
        }
        if ($this->notifyUpdated !== null) {
            $payload['notifyUpdated'] = $this->notifyUpdated;
        }
        if ($this->notifyDeleted !== null) {
            $payload['notifyDeleted'] = $this->notifyDeleted;
        }
        if ($this->cooldownMinutes !== null) {
            $payload['cooldownMinutes'] = $this->cooldownMinutes;
        }
        if ($this->minChanges !== null) {
            $payload['minChanges'] = $this->minChanges;
        }
        if ($this->accountIds !== null) {
            $payload['accountIds'] = $this->accountIds;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
