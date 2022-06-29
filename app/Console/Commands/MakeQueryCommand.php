<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeQueryCommand extends Command
{
    /**
     * Filesystem instance
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Base folder path for dropping new files
     *
     * @var string
     */
    protected $base;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:query {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Query Command';

    /**
     * Create a new command instance.
     *
     * @param  Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
        $this->base = base_path('app/Queries');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->makeDirectory();

        $path = $this->getSourceFilePath();

        if ($this->files->exists($path)) {
            $this->info("File : {$path} already exits");
        } else {
            $this->files->put($path, $this->getSourceFile());
            $this->info("File : {$path} created");
        }
    }

    /**
     * Return the stub file path
     *
     * @return string
     */
    public function getStubPath()
    {
        return __DIR__.'/../../../stubs/query.stub';
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @return void
     */
    protected function makeDirectory()
    {
        if (! $this->files->isDirectory($this->base)) {
            $this->files->makeDirectory($this->base, 0777, true, true);
        }
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * Map the stub variables present in stub to its value
     *
     * @return array
     */
    public function getStubVariables()
    {
        return [
            'CLASS_NAME' => $this->argument('name'),
        ];
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param    $stub
     * @param  array  $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$'.$search.'$', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        return $this->base.'/'.$this->argument('name').'.php';
    }
}
