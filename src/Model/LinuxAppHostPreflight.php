<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class LinuxAppHostPreflight implements \JsonSerializable
{
    /**
     * @param 'apt-get'|'dnf'|'yum'|'apk'|'pacman'|'zypper'|null $packageManager
     * @param 'root'|'sudo'|'sudo-password'|'none' $privilege
     * @param list<LinuxAppRequirement> $requirements
     * @param bool $staging A writable, exec-capable directory was found to stage the app server in. False means every candidate is missing, unwritable, or mounted noexec — which no package fixes.
     */
    public function __construct(
        public readonly string $arch,
        public readonly string $osId,
        public readonly string $osName,
        public readonly ?string $packageManager,
        public readonly string $privilege,
        public readonly array $requirements,
        public readonly bool $staging,
        public readonly int $appCount,
        public readonly bool $ready,
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
            arch: Coerce::toString($data['arch'] ?? null),
            osId: Coerce::toString($data['osId'] ?? null),
            osName: Coerce::toString($data['osName'] ?? null),
            packageManager: Coerce::toStringOrNull($data['packageManager'] ?? null),
            privilege: Coerce::toString($data['privilege'] ?? null),
            requirements: Coerce::mapList($data['requirements'] ?? null, static fn (mixed $item): LinuxAppRequirement => LinuxAppRequirement::fromArray(Coerce::toArray($item))),
            staging: Coerce::toBool($data['staging'] ?? null),
            appCount: Coerce::toInt($data['appCount'] ?? null),
            ready: Coerce::toBool($data['ready'] ?? null),
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
            'arch' => $this->arch,
            'osId' => $this->osId,
            'osName' => $this->osName,
            'packageManager' => $this->packageManager,
            'privilege' => $this->privilege,
            'requirements' => array_map(static fn (LinuxAppRequirement $item): array => $item->toArray(), $this->requirements),
            'staging' => $this->staging,
            'appCount' => $this->appCount,
            'ready' => $this->ready,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
