<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Internal;

use Infrawrench\Sdk\FileUpload;

/**
 * `multipart/form-data` encoding, done by hand.
 *
 * PHP's own `CURLFile` would do this, but only for the cURL sender — encoding
 * the body up front instead keeps {@see \Infrawrench\Sdk\Http\HttpSender} taking
 * a plain string, so the stream fallback and any test double get multipart for
 * free.
 */
final class Multipart
{
    /** Random enough that it cannot occur in the payload by accident. */
    public static function boundary(): string
    {
        return '----InfrawrenchFormBoundary' . bin2hex(random_bytes(16));
    }

    /**
     * @param array<string, mixed> $fields
     */
    public static function encode(array $fields, string $boundary): string
    {
        $out = '';
        foreach ($fields as $name => $value) {
            if ($value === null) {
                continue;
            }
            $out .= "--{$boundary}\r\n";
            if ($value instanceof FileUpload) {
                $filename = str_replace('"', '', $value->filename);
                $out .= "Content-Disposition: form-data; name=\"{$name}\"; filename=\"{$filename}\"\r\n";
                $out .= "Content-Type: {$value->contentType}\r\n\r\n";
                $out .= $value->contents . "\r\n";
                continue;
            }
            $out .= "Content-Disposition: form-data; name=\"{$name}\"\r\n\r\n";
            $out .= self::scalar($value) . "\r\n";
        }

        return $out . "--{$boundary}--\r\n";
    }

    private static function scalar(mixed $value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_scalar($value)) {
            return (string) $value;
        }

        // Arrays and objects have no multipart representation of their own, and
        // every endpoint here that takes one expects it JSON-encoded.
        return json_encode($value) ?: '';
    }
}
