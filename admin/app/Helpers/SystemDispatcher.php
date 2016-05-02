<?php

namespace App\Helpers;

class SystemDispatcher {

    private $params = [];

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initSystemParams();
    }

    /**
     * Get all params.
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Initialization of system params.
     */
    private function initSystemParams($proc_file = NULL)
    {
        if (!isset($proc_file)) {
            $proc_file = '/proc/meminfo';
        }

        $fh = fopen($proc_file,'r');
        while ($line = fgets($fh)) {
            $pieces = array();
            if (preg_match('/^([\s\S]*):\s+(\d+)\skB$/', $line, $pieces)) {
                if (isset($pieces[1], $pieces[2]) && is_numeric($pieces[2])) {
                    $this->params[$pieces[1]] = $pieces[2];
                }
            }
        }
        fclose($fh);

        // Prepare params about filesystem.
        $total_space = disk_total_space('/');
        $free_space = disk_free_space('/');

        if (isset($total_space)) {
            $this->params['DiskTotalSpace'] = $total_space;
        }

        if (isset($free_space)) {
            $this->params['DiskFreeSpace'] = $free_space;
        }
    }

    /**
     *
     */
    public function initStoresParams() {}

    /**
     *
     */
    public function initCacheParams() {}

    /**
     *
     */
    public function cacheInstancesStatus() {}

    /**
     *
     */
    public function storesInstancesStatus() {}
}
