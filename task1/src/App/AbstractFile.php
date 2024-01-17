<?php

namespace App;

abstract class AbstractFile {

    /**
     * @var string
     * path to file
     */
    protected string $filePath;

    /**
     * @var string
     * separator, could be custom
     */
    protected string $separator = ",";

    /**
     * @var string
     * enclosure, could be custom
     */
    protected string $enclosure = "\"";
    /**
     * @var string
     * escape, could be custom
     */
    protected string $escape = "\\";

    /**
     * @param string $filePath
     */
    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    /**
     * @param string $separator
     * setter for $separator
     * @return void
     */
    public function setSeparator(string $separator): void {
        if (strlen($separator) !== 1) {
            throw new \InvalidArgumentException('Separator must be a single character.');
        }
        $this->separator = $separator;
    }


    /**
     * @param string $enclosure
     * setter for $enclosure
     * @return void
     */
    public function setEnclosure(string $enclosure): void {
        if (strlen($enclosure) !== 1) {
            throw new \InvalidArgumentException('Enclosure must be a single character.');
        }
        $this->enclosure = $enclosure;
    }

    /**
     * @param string $escape
     * setter for $escape
     * @return void
     */
    public function setEscape(string $escape): void {
        if (strlen($escape) !== 1) {
            throw new \InvalidArgumentException('Escape must be a single character.');
        }
        $this->escape = $escape;
    }

    /**
     * @param $filename
     * @param $mode
     * open file with specific mode
     * @return resource
     */
    protected function openFile($filename, $mode) {
        $file = fopen($filename, $mode);

        if ($file === false) {
            die("Error opening file");
        }

        return $file;
    }

    /**
     * @return mixed
     */
    abstract protected function convert();

}