<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

/** The API may send `null` in place of this object. */
final class LinuxAppInstallPlan implements \JsonSerializable
{
    /**
     * @param 'apt-get'|'dnf'|'yum'|'apk'|'pacman'|'zypper' $packageManager
     * @param 'root'|'sudo'|'sudo-password'|'none' $privilege
     * @param list<LinuxAppRequirementId::*> $requirements
     * @param list<string> $packages
     * @param list<string> $commands Exactly what would run on the host, privilege prefix included.
     */
    public function __construct(
        public readonly string $packageManager,
        public readonly string $privilege,
        public readonly array $requirements,
        public readonly array $packages,
        public readonly array $commands,
        public readonly bool $canInstall,
        public readonly ?string $blockedReason = null,
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
            packageManager: Coerce::toString($data['packageManager'] ?? null),
            privilege: Coerce::toString($data['privilege'] ?? null),
            requirements: Coerce::mapList($data['requirements'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            packages: Coerce::mapList($data['packages'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            commands: Coerce::mapList($data['commands'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            canInstall: Coerce::toBool($data['canInstall'] ?? null),
            blockedReason: Coerce::toStringOrNull($data['blockedReason'] ?? null),
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
            'packageManager' => $this->packageManager,
            'privilege' => $this->privilege,
            'requirements' => $this->requirements,
            'packages' => $this->packages,
            'commands' => $this->commands,
            'canInstall' => $this->canInstall,
        ];
        if ($this->blockedReason !== null) {
            $payload['blockedReason'] = $this->blockedReason;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
