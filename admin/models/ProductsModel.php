<?php 
	trait ProductsModel{
		public function modelRead($recordPerPage){
			$page = isset($_GET["p"])&&$_GET["p"] > 0 ? $_GET["p"] - 1 : 0;
			$from = $page * $recordPerPage;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by id desc limit $from, $recordPerPage");
			//lay tat ca cac ban ghi
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			//tra ve ket qua
			return $result;
		}
		//lay tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products");
			//tra ve tong so ban ghi
			return $query->rowCount();
		}
		//xoa ban ghi
		public function modelDelete(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("delete from products where id=:var_id");
			$query->execute(["var_id"=>$id]);
		}
		//lay mot ban ghi tuong ung voi id truyen vao
		public function modelGetRecord($id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van -> vi co bien truyen tu url vao nen thuc hien prepare de truyen tham so
			$query = $conn->prepare("select * from products where id=:var_id");
			//thuc hien truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function modelUpdate($id){
			$name = $_POST['name'];
			$description = $_POST['description'];
			$content = $_POST['content'];
			$hot = isset($_POST['hot']) ? 1 : 0;
			$category_id = $_POST['category_id'];
			$discount = $_POST['discount'];
			//update name
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("update products set name=:var_name,description=:var_description,content=:var_content,hot=:var_hot,category_id=:var_category_id,discount=:var_discount where id=:var_id");
			//thuc thi truy van, truyen tham so
			$query->execute(["var_id"=>$id,"var_name"=>$name,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot,"var_category_id"=>$category_id,"var_discount"=>$discount]);
			//neu user chon anh de upload thi tien hanh upload anh
			if($_FILES['photo']['name'] != ""){
				//lay ten anh
				$photo = time()."_".$_FILES['photo']['name'];
				//upload anh
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/IMG/$photo");
				//update cot photo trong table users
				$query = $conn->prepare("update products set photo=:var_photo where id=:var_id");
				//thuc thi truy van, truyen tham so
				$query->execute(["var_id"=>$id,"var_photo"=>$photo]);
			}		
		}
		public function modelCreate(){
			$name = $_POST['name'];
			$description = $_POST['description'];
			$content = $_POST['content'];
			$hot = isset($_POST['hot']) ? 1 : 0;
			$category_id = $_POST['category_id'];
			$discount = $_POST['discount'];
			$photo = "";
			//neu user chon anh de upload thi tien hanh upload anh
			if($_FILES['photo']['name'] != ""){
				//lay ten anh
				$photo = $_FILES['photo']['name'];
				//upload anh
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/IMG/$photo");
			}
			//update name
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into products set photo=:var_photo,name=:var_name,description=:var_description,content=:var_content,hot=:var_hot,category_id=:var_category_id,discount=:var_discount");
			//thuc thi truy van, truyen tham so
			$query->execute(["var_photo"=>$photo,"var_name"=>$name,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot,"var_category_id"=>$category_id,"var_discount"=>$discount]);	
		}
	}
 ?>