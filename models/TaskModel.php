<?php

namespace Models;

class TaskModel extends AbstractModel
{

    public $name;
    public $email;
    public $content;
    public $status;

    public function validate()
    {
        $errors = [];
        if (empty($this->name)) {
            $errors[] = 'Name is empty';
        }

        if (empty($this->email)) {
            $errors[] = 'Email is empty';
        }

        if (!preg_match("/[0-9a-z]+@[a-z]/", $this->email)) {
            $errors[] = 'Email format not correct';
        }

        if (empty($this->content)) {
            $errors[] = 'Content is empty';
        }

        return $errors;
    }

    public function save()
    {
        $stmt = $this->dbConnection->getConnection()->prepare(
            "INSERT INTO tasks(name, email, content, status) VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param('sssi', $this->name, $this->email, $this->content, $this->status);
        if (!$stmt->execute()) {
            throw new Exception("Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error);
        }
    }

    public function update()
    {
        $stmt = $this->dbConnection->getConnection()->prepare("UPDATE tasks SET content = ?, status = ? WHERE id = ?");
        $stmt->bind_param('sii', $this->content, $this->status, $this->id);
        if (!$stmt->execute()) {
            throw new Exception("Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error);
        }
    }

}