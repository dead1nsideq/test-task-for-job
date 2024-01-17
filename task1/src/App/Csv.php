<?php

namespace App;


class Csv extends AbstractFile {
    /**
     * @var array $data The data to be written to the CSV file.
     */
    private array $data;

    /**
     * @var array|null $customHeaders Custom headers for the CSV file. If null, headers will be derived from the data.
     */
    protected ?array $customHeaders;

    /**
     * Csv constructor.
     *
     * @param string $filePath The path to the CSV file.
     * @param array $data The data to be written to the CSV file.
     * @param array|null $customHeaders Custom headers for the CSV file. If null, headers will be derived from the data.
     */
    public function __construct(string $filePath, array $data, array $customHeaders = null) {
        parent::__construct($filePath);
        $this->data = $data;
        $this->customHeaders = $customHeaders;
    }

    /**
     * Converts the provided data to CSV format and writes it to the file.
     *
     * @return void
     */
    public function convert(): void {

        $file = $this->openFile($this->filePath,'w');

        $headers = $this->customHeaders ?? array_keys($this->data[0]);

        fputcsv($file, $headers,
            separator: $this->separator,
            enclosure: $this->enclosure,
            escape: $this->escape);

        foreach ($this->data as $row) {
            fputcsv($file, $row,
                separator: $this->separator,
                enclosure: $this->enclosure,
                escape: $this->escape);
        }
    }

    /**
     * @param array $customHeaders
     *
     * Sets custom headers for the CSV file.
     *
     * @return void
     */
    public function setCustomHeaders(array $customHeaders): void {
        $this->customHeaders = $customHeaders;
    }

    /**
     * @param array $data
     *
     * Sets data to be written to the CSV file.
     *
     * @return void
     */
    public function setData(array $data): void {
        $this->data = $data;
    }
}