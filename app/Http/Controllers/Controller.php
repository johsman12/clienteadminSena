<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function apiUrl(string $endpoint): string
    {
        return rtrim((string) env('URL_SERVER_API'), '/') . '/' . ltrim($endpoint, '/');
    }

    protected function apiGet(string $endpoint): array
    {
        try {
            $response = Http::acceptJson()->connectTimeout(5)->timeout(15)->get($this->apiUrl($endpoint));
        } catch (ConnectionException $exception) {
            $this->throwApiError('No se pudo conectar con el servidor de datos.');
        }

        return $this->decodeApiResponse($response);
    }

    protected function apiWrite(string $method, string $endpoint, array $data = []): array
    {
        try {
            $response = Http::acceptJson()->asJson()->connectTimeout(5)->timeout(15)
                ->send($method, $this->apiUrl($endpoint), ['json' => $data]);
        } catch (ConnectionException $exception) {
            $this->throwApiError('No se pudo conectar con el servidor de datos.');
        }

        return $this->decodeApiResponse($response);
    }

    protected function apiWriteMultipart(string $method, string $endpoint, Request $request): array
    {
        $data = $request->except(array_keys($request->allFiles()));
        $multipart = array_map(
            static fn ($value, $key) => [
                'name' => $key,
                'contents' => (string) $value,
            ],
            $data,
            array_keys($data)
        );

        foreach ($request->allFiles() as $field => $file) {
            if (is_array($file)) {
                continue;
            }

            $multipart[] = [
                'name' => $field,
                'contents' => fopen($file->getRealPath(), 'r'),
                'filename' => $file->getClientOriginalName(),
            ];
        }

        try {
            $response = Http::acceptJson()->asMultipart()->connectTimeout(5)->timeout(30)
                ->send($method, $this->apiUrl($endpoint), ['multipart' => $multipart]);
        } catch (ConnectionException $exception) {
            $this->throwApiError('No se pudo conectar con el servidor de datos.');
        }

        return $this->decodeApiResponse($response);
    }

    private function decodeApiResponse(Response $response): array
    {
        if ($response->failed()) {
            $this->throwApiError(
                (string) ($response->json('message') ?: 'El servidor de datos rechazó la operación.'),
                $response->status()
            );
        }

        $payload = $response->json();
        return is_array($payload) ? $payload : [];
    }

    private function throwApiError(string $message, int $status = 502): never
    {
        throw new HttpResponseException(response()->json(['message' => $message], $status));
    }
}
