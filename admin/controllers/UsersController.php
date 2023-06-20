<?php
    //load file model
    include "models/UsersModel.php";
    class UsersController extends Controller{
        //kế thừa class UsersModel
        use UsersModel;
        //hiển thị danh sách
        public function index(){
            //quy định số bản ghi trên 1 trang
            $recordPerPage = 3;
            //lấy tổng số bản ghi
            $totalRecord = $this->modelTotalRecord();
            //tính số trang
            //ceil(so) sẽ lấy tràn. VD: ceil(3.6)=5
            $numPage = ceil($totalRecord/$recordPerPage);
            //lấy dữ liệu
            $data = $this->modelRead($recordPerPage);
            //gọi view, truyền dữ liệu ra view
            $this->loadView("UsersView.php", ["data"=>$data, "numPage"=>$numPage]);
        }
        //sửa bản ghi -GET
        public function update(){
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            $action = "index.php?controller=users&action=updatePost&id=$id";
            $record = $this->modelGetRecord($id);
            $this->loadView("UsersFormView.php", ["action"=>$action, "record"=>$record]);
        }
        //sửa bản ghi -POST
        public function updatePost(){
            //lấy id truyền vào url
            $id=isset($_GET["id"]) ? $_GET['id'] : 0;
            //gọi hàm update để updaye bản ghi
            $this->modelUpdate($id);
            //trở lại trag users
            header("location:index.php?controller=users");
        }
        //thêm bản ghi -GET
        public function create(){
            $action = "index.php?controller=users&action=createPost";
            $this->loadView("UsersFormView.php", ["action"=>$action]);
        }
        //thêm bản ghi -POST
        public function createPost(){
            //gọi hàm update để updaye bản ghi
            $this->modelCreate();
            //trở lại trag users
            header("location:index.php?controller=users");
        }
        //xóa bản ghi -GET
        public function delete(){
        	$this->modelDelete();
        	header("location:index.php?controller=users");
        }
    }
?>