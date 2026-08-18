<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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

final class IncidentActions implements \JsonSerializable
{
    /**
     * @param bool|null $openFreeze Open an org change freeze for the duration, lifted when the incident resolves. Defaults to false — freezing has blast radius beyond the incident. Needs `freezes:write`; without it the freeze is recorded as a failed artefact naming the permission, and the incident still stands.
     * @param bool|null $pinMoment Pin the moment (a timestamp and a window) so `GET /moment` is one click away. Defaults to true — it cannot fail, and the investigation always wants it.
     * @param bool|null $postSlack Announce through the org's alert routing rules under the `incidentAlerts` trigger, so channels, quiet hours, escalation and the acknowledge button all apply unchanged. Defaults to true. If no rule matches, the artefact fails and says so.
     * @param string|null $statusPageId Post a public update on this status page. Omitted means no public update.
     * @param list<string>|null $statusPageComponentIds Components on that page to mark affected. Empty means the page as a whole.
     */
    public function __construct(
        public readonly ?bool $openFreeze = null,
        public readonly ?bool $pinMoment = null,
        public readonly ?bool $postSlack = null,
        public readonly ?string $statusPageId = null,
        public readonly ?array $statusPageComponentIds = null,
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
            openFreeze: Coerce::toBoolOrNull($data['openFreeze'] ?? null),
            pinMoment: Coerce::toBoolOrNull($data['pinMoment'] ?? null),
            postSlack: Coerce::toBoolOrNull($data['postSlack'] ?? null),
            statusPageId: Coerce::toStringOrNull($data['statusPageId'] ?? null),
            statusPageComponentIds: Coerce::nullable($data['statusPageComponentIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
        if ($this->openFreeze !== null) {
            $payload['openFreeze'] = $this->openFreeze;
        }
        if ($this->pinMoment !== null) {
            $payload['pinMoment'] = $this->pinMoment;
        }
        if ($this->postSlack !== null) {
            $payload['postSlack'] = $this->postSlack;
        }
        if ($this->statusPageId !== null) {
            $payload['statusPageId'] = $this->statusPageId;
        }
        if ($this->statusPageComponentIds !== null) {
            $payload['statusPageComponentIds'] = $this->statusPageComponentIds;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
