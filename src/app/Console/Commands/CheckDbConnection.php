<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Make sure to use your User model namespace correctly

class CheckDbConnection extends Command
{
    protected $signature = 'check:db {name}';
    protected $description = 'Check database connection and display database name. Also, checks for an existing user by name.';

    public function handle()
    {
        $name = $this->argument('name'); // Retrieve the name argument

        try {
            $pdo = DB::connection()->getPdo();
            $driver = DB::connection()->getPDO()->getAttribute(\PDO::ATTR_DRIVER_NAME);

            if ($driver == 'mysql') {
                $databaseName = DB::connection()->getDatabaseName();
            } elseif ($driver == 'pgsql') {
                $databaseName = $pdo->query('SELECT current_database()')->fetchColumn();
            } else {
                $databaseName = 'Unknown Database Type';
            }

            $this->info("Successfully connected to the database: {$databaseName}");

            // Check for an existing user by name
            $user = User::where('name', $name)->first();

            if ($user) {
                $this->info("User with name {$name} exists.");
            } else {
                $this->info("No user found with name {$name}.");
            }

        } catch (\Exception $e) {
            $this->error('Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage());
        }
    }
}
