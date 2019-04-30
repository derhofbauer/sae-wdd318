<?php

class Abo {
    protected $topic;
    protected $users = [];

    public function __construct (Topic $topic, array $users) {
        $this->topic = $topic;
        $this->users = $users;
    }

    public function setTopic (Topic $topic) {
        $this->topic = $topic;
    }

    public function getTopic () {
        return $this->topic;
    }

    public function setUsers (array $users) {
        $this->users = $users;
    }

    public function getUsers () {
        return $this->users;
    }
};

?>