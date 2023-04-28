<?php

namespace App\Console\Commands\Generators;

use Illuminate\Console\GeneratorCommand;

class MakeDTOCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:dto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new DTO';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'DTO';

    protected function getStub(): string
    {
        $stub = '/stubs/dto.stub';
        return $this->laravel->basePath(trim($stub, '/'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\DTO';
    }
}
