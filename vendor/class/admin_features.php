<?
    require './connect.php';
    class Admin_functions{
        private $pdo;
        private $secret_key = 'awpopouewpofwpoefpoew';

        public function add_product($rereofofofeppdpdsegse, $title, $description, $price, $img, $amount){
            if($this->secret_key === $rereofofofeppdpdsegse){
                $sql = 'INSERT INTO `catalog`(`title`,`description`,`price`,`img`,`amount`) VALUES (?,?,?,?,?)';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$title, $description, $price, $img, $amount]);
                http_response_code(202);
            } else {
                http_response_code(400);
            }
        }

        // public function edit_product($title, $description, $price, $img, $amount){
        //     if($this->secret_key === $rereofofofeppdpdsegse){
        //         $sql = 'INSERT INTO `catalog`(`title`,`description`,`price`,`img`,`amount`) VALUES (?,?,?,?,?)';
        //         $stmt = $this->pdo->prepare($sql);
        //         $stmt->execute([$title, $description, $price, $img, $amount]);
        //         http_response_code(202);
        //     } else {
        //         http_response_code(400);
        //     }
        // }

        public function add_event($rereofofofeppdpdsegse, $title, $tiny_description, $description, $img, $date_start, $date_end, $free_space){
            if($this->secret_key === $rereofofofeppdpdsegse){
                $sql = 'INSERT INTO `catalog`(`title`,`tiny_description`,`description`,`img`,`date_start`, `date_end`, `free_space`) VALUES (?,?,?,?,?,?,?)';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$title, $tiny_description, $description, $img, $date_start, $date_end, $free_space]);
                http_response_code(202);
            } else {
                http_response_code(400);
            }  
        }

        public function edit_event($rereofofofeppdpdsegse, $title, $tiny_description, $description, $img, $date_start, $date_end, $free_space){
            if($this->secret_key === $rereofofofeppdpdsegse){
                $sql = 'UPDATE `users` SET `title` = ?, `tiny_description` = ?, `description` = ?, `img` = ?, `date_start` = ?, `date_end` = ?, `free_space` = ? WHERE `id` = ?';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$title, $tiny_description, $description, $img, $date_start, $date_end, $free_space, $id_user]);
                http_response_code(202);
            } else {
                http_response_code(400);
            }  
        }

        public function edit_user($rereofofofeppdpdsegse, $name, $surname, $email, $tel, $bth_day, $password, $rules, $balance, $img){
            if($this->secret_key === $rereofofofeppdpdsegse){
                $sql = 'UPDATE `users` SET `name` = ?, `surname` = ?, `email` = ?, `tel` = ?, `bth_day` = ?, `password` = ?, `rules` = ?, $balance = ?, $img = ? WHERE `id` = ?';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$name, $surname, $email, $tel, $bth_day, $password, $rules, $balance, $img, $id_user]);
                http_response_code(202);
            } else {
                http_response_code(400);
            }  
        }
    }