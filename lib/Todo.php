<?php
class Todo
{
    private $db;
    
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function todos()
    {
        $this->db->query("SELECT * FROM items WHERE status = 0 ORDER BY id DESC" );
        $this->db->execute();
        $result = $this->db->resulSet();
        return $result;

    }

    public function completed()
    {
        $this->db->query("SELECT * FROM items WHERE status = 1");
        $this->db->execute();
        $result = $this->db->resulSet();
        return $result;

    }

    public function create($data)
    {
        $this->db->query("INSERT INTO items(item) VALUES(:item)");
        $this->db->bind(':item', $data['item']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function finished($todo_id)
    {
        $this->db->query("UPDATE items SET status = 1 WHERE id = $todo_id");
       if( $this->db->execute()){
        return true;
       }else{
        return false;
       }

    }

    public function delete($todo_id)
    {
        $this->db->query("DELETE FROM items WHERE id = :todo_id");
        $this->db->bind(':todo_id', $todo_id);
        if( $this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function todo($todo_id)
    {
        $this->db->query(" SELECT * FROM items WHERE id = :todo_id");
        $this->db->bind(':todo_id', $todo_id);
        $this->db->execute();
        $row = $this->db->single();
        return $row;

    }


    public function update($todo_id, $data)
    {
        $this->db->query("UPDATE items SET item = :item WHERE id = $todo_id");
        $this->db->bind(':item', $data['item']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    
}
