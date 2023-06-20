<?php

    trait UsersModel{
        public function modelRead($recordPerPage){
            $page = isset($_GET["p"]) && $_GET["p"] >0 ? $_GET["p"] -1 : 0;
            //lấy tổng số bản ghi
            $from = $page * $recordPerPage;
            //lấy biến kết nối csdl
            $conn = Connection::getInstance();
            $query = $conn->query("select * from users order by id desc limit $from, $recordPerPage");
            //lấy tất cả các bản ghi
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            //trả về kết quả
            return $result;

        }
        //lấy tổng số bản ghi
            public function modelTotalRecord(){
                //lấy biến kết nối csdl
                $conn = Connection::getInstance();
                $query = $conn->query("select *from users");
                //trả về tổng số bản ghi
                return $query->rowCount();
            }
            // xóa bản ghi
            public function modelDelete(){
            $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
            //lấy biến kết nối csdl
            $conn = Connection::getInstance();
            $query = $conn->prepare("delete from users where id=:var_id");
            $query->execute(["var_id"=>$id]);
        }
        //lấy 1 bản ghi tương ứng vs id truyền vào
        public function modelGetRecord($id){
            $conn = Connection::getInstance();
            //thực hiện truy vấn -> vì có biến truyền vào từ url vào nên thực hiện prepare để truyền tham số
            $query = $conn->prepare("select *from users where id=:var_id");
            //thực hiện truy vấn, có truyền tham só vào câu lệnh sql
            $query->execute(["var_id"=>$id]);
            //trả về 1 bản ghi
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function modelUpdate($id){
            $name = $_POST['name'];
            $password = $_POST['password'];
            //update name
            //lấy biến kết nối csdl
            $conn = Connection::getInstance();
            //thực thi truy vấn, truyền tham số
            $query = $conn->prepare("update users set name=:var_name where id=:var_id");
            $query->execute(["var_id"=>$id,"var_name"=>$name]);
            //nếu pw ko rỗng thì update
            if($password != ""){
                $password = md5($password);
                $query = $conn->prepare("update users set password=:var_password where id=:var_id");
                $query->execute(["var_id"=>$id,"var_password"=>$password]);
            }
        }
        public function modelCreate(){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            //ma hoa password
            $password = md5($password);
            //update name, email, password
            //lay bien ket noi csdl
            $conn = Connection::getInstance();
            $query = $conn->prepare("insert into users set name=:var_name,email=:var_email,password=:var_password");
            //thuc thi truy van, truyen tham so
            $query->execute(["var_name"=>$name,"var_email"=>$email,"var_password"=>$password]);         
        }
    }
?>