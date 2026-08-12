<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class QuotaListResponse implements \JsonSerializable
{
    /**
     * @param list<QuotaRow> $rows Every quota with a reading, worst first.
     * @param list<QuotaAccountStatus> $accounts Per-account collection status for every account on a quota-capable plugin. Present even when the account has rows: an empty `rows` alone cannot distinguish 'nothing is near a limit' from 'every collection is failing'.
     * @param float $threshold The organization's alert threshold as a fraction, so the page's marker and the alert agree.
     * @param list<PluginId::*> $unsupportedPluginIds Plugins the organization holds accounts with that cannot report quotas at all. Named rather than counted, because the absence is the finding.
     */
    public function __construct(
        public readonly array $rows,
        public readonly array $accounts,
        public readonly float $threshold,
        public readonly array $unsupportedPluginIds,
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
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): QuotaRow => QuotaRow::fromArray(Coerce::toArray($item))),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): QuotaAccountStatus => QuotaAccountStatus::fromArray(Coerce::toArray($item))),
            threshold: Coerce::toFloat($data['threshold'] ?? null),
            unsupportedPluginIds: Coerce::mapList($data['unsupportedPluginIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'rows' => array_map(static fn (QuotaRow $item): array => $item->toArray(), $this->rows),
            'accounts' => array_map(static fn (QuotaAccountStatus $item): array => $item->toArray(), $this->accounts),
            'threshold' => $this->threshold,
            'unsupportedPluginIds' => $this->unsupportedPluginIds,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
