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

use Infrawrench\Sdk\Internal\Coerce;

final class IncidentArtifact implements \JsonSerializable
{
    /**
     * @param 'freeze'|'moment'|'slack'|'status-page' $kind Which side effect of declaring this artefact records.
     * @param 'created'|'failed'|'closed'|'close_failed' $status `failed` is a stored state, not an error: declaring writes the incident first and attempts each opted-in side effect afterwards, so a Slack outage costs the announcement and never the incident. A failed artefact carries its error and can be retried.

`close_failed` is the other half and is deliberately distinct: the artefact **was** created and resolving could not put it away, so the change freeze is still in force or the public notice still reports an outage. Retrying a `failed` artefact re-creates it; retrying a `close_failed` one re-closes it. Collapsing the two would either strand the incident with a live freeze nothing can lift, or open a second freeze.
     * @param string|null $label Human label — the freeze name, the destination count.
     * @param string|null $refId Freeze id, notice id, Slack channel id…
     * @param string|null $refSecondary Second half of a compound reference — a Slack message ts, a window width.
     * @param string|null $error Why it failed. Null unless `status` is `failed` or `close_failed`.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $kind,
        public readonly string $status,
        public readonly ?string $label,
        public readonly ?string $refId,
        public readonly ?string $refSecondary,
        public readonly ?string $error,
        public readonly ?IncidentArtifactRequest $request,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            label: Coerce::toStringOrNull($data['label'] ?? null),
            refId: $data['refId'] ?? null,
            refSecondary: Coerce::toStringOrNull($data['refSecondary'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            request: Coerce::nullable($data['request'] ?? null, static fn (mixed $value): IncidentArtifactRequest => IncidentArtifactRequest::fromArray(Coerce::toArray($value))),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'id' => $this->id,
            'kind' => $this->kind,
            'status' => $this->status,
            'label' => $this->label,
            'refId' => $this->refId,
            'refSecondary' => $this->refSecondary,
            'error' => $this->error,
            'request' => $this->request?->toArray(),
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
