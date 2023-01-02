<?php

class Members_model
{
    private $table = 'members';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMembers()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMember($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addMember($data)
    {
        try {
            $query = "INSERT INTO members VALUES ('',:first_name,:last_name,:email,:gender,:ip_address)";
            $this->db->query($query);
            $this->db->bind('first_name', $data['first_name']);
            $this->db->bind('last_name', $data['last_name']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('gender', $data['gender']);
            $this->db->bind('ip_address', $data['ip_address']);
            $this->db->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $this->db->rowCount();
    }

    public function deleteMember($id)
    {
        try {
            $query = 'DELETE FROM members WHERE id=:id';
            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateMember($data)
    {
        try {
            $query = "UPDATE members SET
            first_name = :first_name,
            last_name = :last_name,
            email = :email,
            gender = :gender,
            ip_address = :ip_address
            WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('first_name', $data['first_name']);
            $this->db->bind('last_name', $data['last_name']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('gender', $data['gender']);
            $this->db->bind('ip_address', $data['ip_address']);
            $this->db->bind('id', $data['id']);
            $this->db->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $this->db->rowCount();
    }

    public function searchMembers()
    {
        $keyword = $_POST['keyword'];
        $query = 'SELECT * FROM members WHERE first_name LIKE :keyword';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
