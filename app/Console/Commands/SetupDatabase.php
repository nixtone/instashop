<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SetupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Interactive database configuration setup';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        \Log::info('SetupDatabase command started');



        $this->components->info('🎯 Laravel 12 Database Setup Wizard');

        // Проверяем существование .env файла
        $envPath = base_path('.env');

        if (!File::exists($envPath)) {
            $this->components->error('.env file not found!');

            if (File::exists(base_path('.env.example'))) {
                File::copy(base_path('.env.example'), $envPath);
                $this->components->info('✅ .env file created from .env.example');
            } else {
                $this->components->error('❌ .env.example file not found!');
                return;
            }
        }

        // Получаем данные от пользователя
        $dbConnection = $this->choice(
            'Select database driver',
            ['mysql', 'pgsql', 'sqlite', 'sqlsrv'],
            'mysql'
        );

        $dbHost = $this->ask('Database host', '127.0.0.1');
        $dbPort = $this->ask('Database port', $dbConnection === 'mysql' ? '3306' : '5432');
        $dbName = $this->ask('Database name', 'laravel');
        $dbUsername = $this->ask('Database username', 'root');
        $dbPassword = $this->secret('Database password') ?? '';

        // Обновляем .env файл
        $this->updateEnvFile([
            'DB_CONNECTION' => $dbConnection,
            'DB_HOST' => $dbHost,
            'DB_PORT' => $dbPort,
            'DB_DATABASE' => $dbName,
            'DB_USERNAME' => $dbUsername,
            'DB_PASSWORD' => $dbPassword,
        ]);

        $this->components->info('✅ Database configuration updated!');

        // Тестируем подключение
        $this->testDatabaseConnection();
    }

    /**
     * Обновление .env файла
     */
    private function updateEnvFile(array $config): void
    {
        $envPath = base_path('.env');
        $envContent = File::get($envPath);

        foreach ($config as $key => $value) {
            $pattern = "/^{$key}=.*/m";
            $replacement = "{$key}=\"{$value}\"";

            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, $replacement, $envContent);
            } else {
                $envContent .= PHP_EOL . $replacement;
            }
        }

        File::put($envPath, $envContent);
    }

    /**
     * Тестирование подключения к БД
     */
    private function testDatabaseConnection(): void
    {
        $this->components->info('Testing database connection...');

        // Очищаем кэш конфигурации
        $this->callSilently('config:clear');

        // Даем время для применения изменений
        sleep(2);

        try {
            \Illuminate\Support\Facades\DB::connection()->getPdo();
            $this->components->info('✅ Database connection successful!');
        } catch (\Exception $e) {
            $this->components->error('❌ Database connection failed: ' . $e->getMessage());
            $this->components->warn('Please check your credentials and ensure database server is running.');
        }
    }
}
