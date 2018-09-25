<?php

namespace PhpPhantomjs;

/**
 * Created by PhpStorm.
 * User: michelecapicchioni
 * Date: 25/09/18
 * Time: 15:07
 */
class PhpPhantomjs
{
    /**
     * @var string
     */
    protected $phantomjsPath;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var array
     */
    protected $arguments;

    /**
     * PhpPhantomjs constructor.
     * @param string $phantomjsPath
     */
    public function __construct($phantomjsPath)
    {
        $this->phantomjsPath = $phantomjsPath;
        $this->options = [];
        $this->arguments = [];
    }

    public function execute($scriptPath, $data = [])
    {
        $commandParts = [
            '"' . $this->phantomjsPath . '"',
            '"' . $scriptPath . '"',
            "'" . json_encode($data) . "'",
        ];

        $command = implode(" ", $commandParts);

        exec($command, $output);

        return implode("\n", $output);
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return PhpPhantomjs
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param array $arguments
     * @return PhpPhantomjs
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
        return $this;
    }
    

}