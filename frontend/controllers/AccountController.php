<?php 
	//load file model
	include "models/AccountModel.php";
	class AccountController extends Controller{
		//ke thua class AccountModel
		use AccountModel;
		//dang ky
		public function register(){
			$this->loadView("AccountView.php");
		}
		//dang ky pos
		public function registerPost(){
			$this->modelRegister();
			header("location:index.php?controller=account&action=login");
		}
		//dang nhap
		public function login(){
			$this->loadView("AccountView.php");
		}
		//dang nhap post
		public function loginPost(){
			$this->modelLogin();
		}
		//dang xuat
		public function logout(){
			//huy bien session
			unset($_SESSION["customer_email"]);
			unset($_SESSION["customer_id"]);
			header("location:index.php?controller=account&action=login");
		}
		
	}
 ?>