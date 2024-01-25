<?php
require '../../models/messages/Message.php';

class MessageController extends Message{

    public function setData(string $data, int $userId, string $chat_name){
        $this->insertData($data,$userId,$chat_name);
    }

    public function getData(){
        $this->selectAllData();
    }

    public function delete($ids){
        $this->deleteData($ids);
    }

    // public function update(){
        
    // }
    
}

?>