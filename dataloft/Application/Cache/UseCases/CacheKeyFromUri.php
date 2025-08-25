<?php

namespace Dataloft\Application\Cache\UseCases;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

final readonly class CacheKeyFromUri
{
    public function __construct(
        private Request $request
    ) {}

    /**
     * @return string|null
     * @throws Exception
     */
    public function fromUri(): ?string
    {
        try {
            $key = Str::replace('/', '-', $this->request->uri()->path());
            Log::channel('cache.redis.access')->debug(__('Ключ: :k', ['k' => $key]));

            return $key;
        } catch (Exception $e) {
            Log::channel('cache.redis.error')->debug(__('Не удалось получить ключ кеша из запроса. exception: :e', [
                'e' => $e->getMessage(),
            ]));
        }

        return null;
    }
}
