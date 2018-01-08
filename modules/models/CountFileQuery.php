<?php
/**
 * CountFileQuery Class.
 * @author Jauhari Khairul Kawistara <jkawistara@gmail.com>
 * Date: 2018-01-08
 */

class CountFileQuery
{
    public $db;

    public function truncateTable()
    {
        $sql = 'truncate table contents';
        $this->db->query($sql);
    }
    
    public function insert($content)
    {
        $sql = 'insert into contents(content) values("' . $content . '")';
        $this->db->query($sql);
        return mysqli_insert_id($this->db);
    }

    public function update($id, $column, $value)
    {
        $sql = 'update contents set '. $column . ' = ' . $value . ' where id = '. $id;
        $result = $this->db->query($sql);
        return $result;
    }

    public function select($id = null, $content = null)
    {
        $sql = 'select id, content, totalCount, status from contents';
        if ($id) {
            $sql .= ' where id = ' . $id . ' limit 1';
        } elseif ($content) {
            $sql .= ' where content = "' . $content . '" limit 1';
        }

        $result = $this->db->query($sql);
        if ($result && $id || $result && $content) {
            return mysqli_fetch_assoc($result);
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}