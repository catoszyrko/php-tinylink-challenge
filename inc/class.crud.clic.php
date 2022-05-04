<?php
	class CLIC{
		
		public function read($link){
			$sql = "SELECT title, clics, url, newUrl, id FROM tracking order by clics desc LIMIT 100";
			$sq = mysqli_query($link,$sql);
    		return $sq;
    	}

        public function find($link, $url){
			$sql = "SELECT * FROM tracking where url = '$url'";
            $sq = mysqli_query($link,$sql);
            return mysqli_num_rows($sq);
    	}

        public function update($link, $url){
			$sql = "UPDATE tracking SET clics = clics+1 WHERE url = '$url' ";
            $sq = mysqli_query($link,$sql);
		}            

		public function create($link, $url,$title){
			$url = mysqli_real_escape_string($link, $url);
			$title = mysqli_real_escape_string($link, $title);
            $sql = "INSERT INTO tracking (url, clicDate, newUrl, clics, title) values ('$url', now(), '$newUrl', 1, '$title') ";
            $sq = mysqli_query($link,$sql);
		}



	}
?>