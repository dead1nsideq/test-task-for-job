<?php

namespace App;


class Json extends AbstractFile {

    /**
     * Csv constructor.
     *
     * @param string $filePath The path to the CSV file.
     */
    public function __construct(string $filePath) {
        parent::__construct($filePath);
    }

    /**
     * Converts CSV data to JSON format.
     *
     * @return string JSON representation of the CSV data.
     */
    public function convert(): string {
        $file = $this->openFile($this->filePath, 'r');

        $headers = $this->readHeaders($file);
        $data = $this->readData($file, $headers);

        fclose($file);

        return json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * Reads and returns the headers from the CSV file.
     *
     * @param resource $file The file resource.
     * @return array The headers.
     */
    private function readHeaders($file): array {
        return fgetcsv($file, separator: $this->separator, enclosure: $this->enclosure, escape: $this->escape);
    }

    /**
     * Reads and returns the data from the CSV file, converting it to an associative array.
     *
     * @param resource $file The file resource.
     * @param array $headers The headers.
     * @return array The data as an associative array.
     */
    private function readData($file, array $headers): array {
        $data = [];

        while (($row = fgetcsv($file, separator: $this->separator, enclosure: $this->enclosure, escape: $this->escape)) !== false) {
            $row = $this->adjustRowToHeaders($row, $headers);
            $data[] = array_combine($headers, $row);
        }

        return $data;
    }

    /**
     * Adjusts the row to match the number of headers.
     *
     * @param array $row The row data.
     * @param array $headers The headers.
     * @return array Adjusted row.
     */
    private function adjustRowToHeaders(array $row, array $headers): array {
        if (count($headers) < count($row)) {
            return array_slice($row, 0, count($headers));
        } elseif (count($headers) > count($row)) {
            return array_pad($row, count($headers), null);
        }

        return $row;
    }
}

