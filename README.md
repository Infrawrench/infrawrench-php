# infrawrench/sdk

Generated PHP client for the Infrawrench API (API version `1.16.0`).

**Do not edit this package by hand** — it is regenerated from `openapi.json` and
is not checked into the repository. Run
`pnpm --filter @infrawrench/web generate:sdk` to rebuild it; the generator lives
in [`app/packages/web/scripts/sdk`](https://github.com/Infrawrench/Infrawrench/tree/main/app/packages/web/scripts/sdk).

Requires PHP 8.1+. No Composer dependencies: `ext-curl` is used when it is
loaded, and a stream-wrapper fallback when it is not.

## Versioning

There is no `version` field in `composer.json`, because Composer takes a
package's version from the git tag it was published under. The API version each
build was generated from is the one in the heading above, and it is repeated at
the top of every emitted file — tag releases to match it.

## Install

```sh
composer require infrawrench/sdk
```

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Infrawrench\Sdk\APIV1Client;
use Infrawrench\Sdk\ApiException;

$client = new APIV1Client(
    apiKey: getenv('INFRAWRENCH_API_KEY') ?: null,
    orgId: getenv('INFRAWRENCH_ORG_ID') ?: null,
);

try {
    foreach ($client->accounts->list() as $account) {
        echo $account->id, "\n";
    }
} catch (ApiException $e) {
    echo $e->status, ' ', $e->errorCode ?? '(no code)', "\n";
}
```

Calls are namespaced to mirror the URL structure, so
`POST /api/org/{orgId}/accounts/{id}/sync` is `$client->accounts->sync(id: $id)`
and `POST …/secret-versions/add` is `$client->resources->secretVersions->add(…)`.

Set `orgId` once on the client and every org-scoped call can omit it; pass
`orgId:` on an individual call to override it. Omitting both raises
`MissingParameterException` before anything is sent.

### Named arguments, not an options array

Every call takes named arguments. An `array $params` would have been shorter to
generate, but it erases every argument's type, hides typos until runtime, and
gives an editor nothing to complete. Required arguments are declared first
because PHP requires it — with named arguments that ordering never shows up at a
call site.

Each method also takes a trailing `RequestOptions` for per-call headers and
timeouts:

```php
$client->accounts->list(options: new RequestOptions(timeout: 5.0));
```

## Models

Response bodies come back as classes under `Infrawrench\Sdk\Model`, with
readonly properties, `fromArray()`, `toArray()` and `JsonSerializable`.

Schemas that are a fixed set of strings — plugin ids, permissions, resource
statuses — are classes of constants rather than PHP enums, so that a value added
by a newer API version still deserializes instead of raising. PHPDoc still pins
the exact set via `PluginId::*`, so static analysis loses nothing.

## Errors

Non-2xx responses throw `ApiException`, carrying `status`, the decoded `body`,
and `errorCode` — the API's machine-readable `code` field — when the response
has one. Branch on `errorCode`, never on the message.

Network failures and malformed payloads throw `TransportException`, which is
usually worth retrying where an `ApiException` is not.

## Testing

`Infrawrench\Sdk\Http\HttpSender` is the only seam between this client and the
network. Pass an implementation as `sender:` and every call runs through it with
path interpolation, query serialization, multipart encoding and error mapping
still applied:

```php
$client = new APIV1Client(orgId: 'org_1', sender: $recordingSender);
```

## Scope

This package covers the published API surface only: 441 operations across
596 schemas. Operations marked `x-internal` in the spec — the admin surface,
webhook receivers, desktop sync, push registration, and the browser auth
redirects — are not generated.

## License

MIT — see [`LICENSE`](./LICENSE). Copyright (c) 2026 Infrawrench LLC.

Note that this client is more permissively licensed than the service it talks
to: the Infrawrench source is BUSL-1.1, but the generated clients are MIT so you
can link one into your own software without inheriting those terms.

Issues: <https://github.com/Infrawrench/Infrawrench/issues>
