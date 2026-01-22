<?php

namespace App\Subdomains\Init;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class InitController extends Controller
{
    /**
     * @var array<string>
     */
    private array $allowedPaths = [
        'bin/go.sh',
        'bin/ports.sh',
        'stubs/bin/bash.sh',
        'stubs/bin/cache.sh',
        'stubs/bin/fresh.sh',
        'stubs/bin/jobs.sh',
        'stubs/bin/pint.sh',
        'stubs/bin/setup.sh',
        'stubs/bin/stan.sh',
        'stubs/bin/start.sh',
        'stubs/bin/stop.sh',
        'stubs/bin/test.sh',
        'stubs/env.txt',
        'stubs/docker-compose.yml',
        'stubs/Caddyfile',
        'stubs/phpstan.neon.dist',
        'stubs/README.md',
        'stubs/.devcontainer/.devcontainer.json',
        'stubs/.github/workflows/laravel.yml',
        'stubs/app/Models/User.txt',
        'stubs/app/Providers/AppServiceProvider.txt',
        'stubs/app/Providers/FilamentServiceProvider.txt',
        'stubs/bootstrap/providers.txt',
        'stubs/database/migrations/0001_01_01_000000_create_users_table.txt',
        'stubs/resources/views/welcome.blade.txt',
    ];

    public function index(): Response
    {
        return response()->view('subdomains.init.index');
    }

    public function bin(string $path): Response
    {
        $fullPath = 'bin/'.$path;

        return $this->serveFile($fullPath);
    }

    public function stubs(string $path): Response
    {
        $fullPath = 'stubs/'.$path;

        return $this->serveFile($fullPath);
    }

    private function serveFile(string $path): Response
    {
        if (! in_array($path, $this->allowedPaths)) {
            abort(404);
        }

        $filePath = storage_path('app/public/subdomains/init/'.$path);

        if (! file_exists($filePath)) {
            abort(404);
        }

        $mimeType = str_ends_with($path, '.sh') ? 'text/x-shellscript' : 'text/plain';

        return response(file_get_contents($filePath), 200)
            ->header('Content-Type', $mimeType);
    }

    public function asset(string $path): Response
    {
        $filePath = storage_path('app/public/subdomains/init/assets/'.$path);

        if (! file_exists($filePath)) {
            abort(404);
        }

        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $mimeTypes = [
            'woff2' => 'font/woff2',
            'woff' => 'font/woff',
            'ttf' => 'font/ttf',
            'css' => 'text/css',
            'js' => 'application/javascript',
        ];

        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';

        return response(file_get_contents($filePath), 200)
            ->header('Content-Type', $mimeType)
            ->header('Cache-Control', 'public, max-age=31536000');
    }

    public function notFound(): Response
    {
        return response()->view('subdomains.init.404', [], 404);
    }
}
