<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class CostForecastInput implements \JsonSerializable
{
    /**
     * @param list<string> $scenarioModelIds Scenario models to apply, **in priority order**. Each model is applied to the line the previous ones produced, so an org-wide percentage in a later model also scales amounts an earlier one added. Deleting a model a forecast names is refused.
     * @param string|null $driverMetricId A business metric whose forecasted values drive the baseline: projected unit cost (the report's spend per unit, trended) times the forecasted value. Null keeps the trend.
     * @param bool|null $isDefault Make this the report's default forecast, clearing any other. On update, absent keeps the current setting and false makes the report fall back to the automatic forecast.
     */
    public function __construct(
        public readonly string $name,
        public readonly array $scenarioModelIds,
        public readonly ?string $description = null,
        public readonly ?string $driverMetricId = null,
        public readonly ?bool $isDefault = null,
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
            name: Coerce::toString($data['name'] ?? null),
            scenarioModelIds: Coerce::mapList($data['scenarioModelIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            driverMetricId: Coerce::toStringOrNull($data['driverMetricId'] ?? null),
            isDefault: Coerce::toBoolOrNull($data['isDefault'] ?? null),
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
            'name' => $this->name,
            'scenarioModelIds' => $this->scenarioModelIds,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->driverMetricId !== null) {
            $payload['driverMetricId'] = $this->driverMetricId;
        }
        if ($this->isDefault !== null) {
            $payload['isDefault'] = $this->isDefault;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
