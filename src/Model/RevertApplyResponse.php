<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

final class RevertApplyResponse implements \JsonSerializable
{
    /**
     * @param list<string> $appliedFields The fields written, in plan order. Empty on a reconciliation.
     * @param bool|null $reconciled True when this request wrote nothing and instead recorded an *earlier* interrupted attempt's write — the resource was already back, and the event is now marked reverted. Nothing was sent to the provider by this request.
     * @param bool|null $auditRecorded Present and `false` only when the audit entry could not be written. The provider change still happened; its attribution did not reach the audit table and was written to the server log instead. Attribution is best-effort — nothing transactional spans a third-party cloud API and Infrawrench's database.
     */
    public function __construct(
        public readonly string $changeId,
        public readonly string $resourceId,
        public readonly array $appliedFields,
        public readonly RevertPlan $plan,
        public readonly string $revertedAt,
        public readonly ?bool $reconciled = null,
        public readonly ?bool $auditRecorded = null,
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
            changeId: Coerce::toString($data['changeId'] ?? null),
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            appliedFields: Coerce::mapList($data['appliedFields'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            plan: RevertPlan::fromArray(Coerce::toArray($data['plan'] ?? null)),
            revertedAt: Coerce::toString($data['revertedAt'] ?? null),
            reconciled: Coerce::toBoolOrNull($data['reconciled'] ?? null),
            auditRecorded: Coerce::toBoolOrNull($data['auditRecorded'] ?? null),
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
            'changeId' => $this->changeId,
            'resourceId' => $this->resourceId,
            'appliedFields' => $this->appliedFields,
            'plan' => $this->plan->toArray(),
            'revertedAt' => $this->revertedAt,
        ];
        if ($this->reconciled !== null) {
            $payload['reconciled'] = $this->reconciled;
        }
        if ($this->auditRecorded !== null) {
            $payload['auditRecorded'] = $this->auditRecorded;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
