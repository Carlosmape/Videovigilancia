<?php
  require_once "config.php";
   /**
    *
    */
   class Sqlconnection {

     var $connection;

     function __construct(){
       $this->connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
       if (!$this->connection) {
         throw new Exception("Error CAMS could not connect to your DATABASE", 1);
       }
     }

     function getAllUsers(){
       return $result = $this->connection->query(" SELECT * FROM USERS;");
     }
     function getAllCategories(){
       return $result = $this->connection->query(" SELECT * FROM CATEGORIES;");
     }
     function getParentCategories(){
       return $result = $this->connection->query(" SELECT * FROM CATEGORIES WHERE PARENTID=0;");
     }
     function getChildCategories(){
       return $result = $this->connection->query(" SELECT * FROM CATEGORIES WHERE PARENTID>0 ORDER BY PARENTID;");
     }
     function getMenuPages(){
       return $result = $this->connection->query(" SELECT * FROM `ARTICLES` WHERE TYPE=0 ORDER BY `DATE` DESC, `ID` DESC;");
     }
     function getAllArticles(){
       return $result = $this->connection->query(" SELECT * FROM `ARTICLES` ORDER BY `DATE` DESC, `ID` DESC;");
     }
     function getRandomArticles(){
       return $result = $this->connection->query(" SELECT TITLE,IMAGEHEADER FROM ARTICLES WHERE TYPE=1 ORDER BY RAND() LIMIT 6;");
     }
     function getArticlesByCategory($category){
       return $result = $this->connection->query(" SELECT ARTICLES.TITLE,ARTICLES.DATE,ARTICLES.IMAGEHEADER FROM ARTICLES, CATEGORIES WHERE ARTICLES.CATEGORIES = CATEGORIES.ID AND CATEGORIES.TITLE = '$category';");
     }
     function getAllArticlesIndex($limit = 0){
			 $limit = $limit*10;
       return $result = $this->connection->query(" SELECT TITLE,DATE,IMAGEHEADER FROM `ARTICLES` WHERE TYPE=1 ORDER BY `DATE` DESC, `ID` DESC LIMIT $limit,10;");
     }
     function getAllArticlesLike($string){
       return $result = $this->connection->query(" SELECT TITLE,DATE,IMAGEHEADER FROM `ARTICLES` WHERE CONTENT LIKE '%$string%' OR TITLE LIKE '%$string%' ORDER BY `DATE` DESC, `ID` DESC;");
     }
     function getArticle($id){
       return $result = $this->connection->query(" SELECT * FROM `ARTICLES` WHERE `ID`=$id;");
     }
     function getArticleByTITLE($title){
       return $result = $this->connection->query(" SELECT TITLE,DATE,IMAGEHEADER,CONTENT,TYPE FROM `ARTICLES` WHERE `TITLE`='$title';");
     }
     function checkLogin($user, $pass){
       $result = $this->connection->query(" SELECT * FROM USERS
                                            WHERE 'USER' = '$user' AND 'PASSWORD' = '$pass';");
        var_dump($result);
        if (!$result) {
          return false;
        }
        else {
          return true;
        }
     }
     function addUser($username, $userpass){
				$result = $this->connection->query("INSERT INTO `USERS`(`ID`, `USER`, `MAIL`, `PASSWORD`, `TYPE`) VALUES (NULL, '$username',NULL ,'$userpass','1')");
				echo mysqli_error($this->connection);
				return $result;
		 }
     function addCategory($title, $parentid){
			 if (empty($parentid)){
					$parentid='NULL';
			 }
			 
				$result = $this->connection->query("INSERT INTO `CATEGORIES`(`ID`, `PARENTID`, `TITLE`) VALUES (NULL, '$parentid','$title');");
				echo mysqli_error($this->connection);
				return $result;
		 }
     function addArticle($tite, $type, $category, $date){
				$result = $this->connection->query("INSERT INTO `ARTICLES`(`ID`, `TITLE`, `TYPE`, `CATEGORIES`, `DATE`) VALUES (NULL, '$title','$type','$category','$date')");
				echo mysqli_error($this->connection);
				return $result;
		 }
     function deleteUser($id){
				$result = $this->connection->query("DELETE FROM `USERS` WHERE `ID`=$id;");
				echo mysqli_error($this->connection);
				return $result;
		 }
     function deleteCategory($id){
				$result = $this->connection->query("DELETE FROM `CATEGORIES` WHERE `ID`=$id;");
				echo mysqli_error($this->connection);
				return $result;
		 }
     function deleteArticle($id){
				$result = $this->connection->query("DELETE FROM `ARTICLES` WHERE `ID`=$id;");
				echo mysqli_error($this->connection);
				return $result;
		 }
     function editUser($id,$username, $mail, $userpass, $type){
				if(empty($userpass)){ //DONT MODIFY PASSWORD
					$result = $this->connection->query("UPDATE `USERS` SET `USER`='$username',`MAIL`='$mail',`TYPE`=$type WHERE `ID`=$id;");
				}else{
					$result = $this->connection->query("UPDATE `USERS` SET `USER`='$username',`MAIL`='$mail',`PASSWORD`='".md5($userpass)."',`TYPE`=$type WHERE `ID`=$id;");
				}
				echo mysqli_error($this->connection);
				return $result;
		 }
     function editCategory($id, $title, $parentid){
				$result = $this->connection->query("UPDATE `CATEGORIES` SET `TITLE`='$title',`PARENTID`='$parentid' WHERE `ID`=$id;");
				echo mysqli_error($this->connection);
				return $result;
		 }
     function saveArticle($id,$title, $type, $category, $date, $text, $imagepath){
				if(!empty($id)){ //modify A NEW ARTICLE
					$result = $this->connection->query("UPDATE `ARTICLES` SET `TITLE`='$title',`TYPE`=$type,`CATEGORIES`='$category',`CONTENT`='$text',`IMAGEHEADER`='$imagepath' WHERE `ID`=$id;");
				}else{	//create ONE
					$result = $this->connection->query("INSERT INTO `ARTICLES`(`ID`, `TITLE`, `TYPE`, `CATEGORIES`, `DATE`, `CONTENT`) VALUES (NULL, '$title','$type','$category','$date','$text')");
				}
				echo mysqli_error($this->connection);
				return $result;
		 }
   }

 ?>
