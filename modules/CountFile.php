<?php
/**
 * CountFile Class.
 * @author Jauhari Khairul Kawistara <jkawistara@gmail.com>
 * Date: 2018-01-08
 */

namespace modules;

include_once('models/CountFileQuery.php');
use CountFileQuery as Query;

class CountFile
{
    /**
     * Default File
     * @var string
     */
    public $defaultFile;

    /**
     * Status of file
     * @var boolean
     */
    public $status;

    /**
     * Files id.
     * @var string[]
     */
    public $files = [];

    /**
     * Default database.
     * @var string
     */
    public $db;

    /**
     * @var Query
     */
    private $_query;

    /**
     * CountFile constructor.
     * @param mixed $db The database paramater.
     */
    public function __construct($db) {
        $this->_query = new Query();
        $this->_query->db = $db;
    }

    /**
     * @return Query
     */
    public function getQuery()
    {
        return $this->_query;
    }

    /**
     * Trace data of files.
     */
    public function traceData()
    {
        $this->updateStatusContent();
        $contents = $this->calculateCount();
        if (!empty($contents)) {
            printf($contents['content'] . ' ' . $contents['totalCount']);
        }
    }

    /**
     * Update status content
     */
    private function updateStatusContent()
    {
        if ($this->status) {
            foreach ($this->files as $key => $id) {
                $this->_query->update($id, 'status', $this->status);
            }
        }
    }

    /**
     * @return mixed
     */
    private function calculateCount()
    {
        $counter = [];
        $selectData = $this->_query->select();

        foreach ($selectData as $key => $row) {
            $counter[$key] = $row['totalCount'];
        }
        array_multisort($counter, SORT_DESC, $selectData);
        return $selectData['0'];
    }

    /**
     * @return int|null|string
     */
    public function insertOrUpdateData()
    {
        $content = file_get_contents($this->defaultFile);
        $selectData = $this->_query->select(null, $content);
        if ($selectData == false) {
            return $this->_query->insert($content);
        }

        $this->updateCount($selectData, $content);
        return null;
    }

    /**
     * Update Count based on id selected.
     */
    private function updateCount(array $selectData, string $content)
    {
        if ($selectData['content'] == $content && $selectData['status'] == 0) {
            $this->_query->update($selectData['id'], 'totalCount', $selectData['totalCount'] + 1);
        }
    }
}