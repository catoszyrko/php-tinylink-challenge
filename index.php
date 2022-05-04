<?php include_once('inc/dbconfig.php');?>
<?php 
    include_once('inc/class.crud.clic.php');

    $clic = new CLIC();

    // I use GET method instead POST just to dev mode.

    if(!empty($_GET)){
        $url = $_GET['url'];
        $newUrl = $_GET['newUrl'];
        $result =$clic->find($link,$url);
        
        if(!empty($result)){
            $clic->update($link, $url);
        }else{
            $page = file_get_contents('http://'.$url);
            if($page==true){
                $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;
            }else{
                $page = file_get_contents('https://'.$url);
                $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;
            }
            
            $clic->create($link, $url, $title);
            
        };
        if($newUrl){
            header("Location: http://".$url);    
        }
        $url = $_GET['url'];
        
    }

    $results = $clic->read($link);
    
?>
<?php include_once('includes/head.php');?>

<body>

    <?php include_once('includes/header.php');?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th><b>Title</b></th>
                            <th><b>URL</b></th>
                            <th><b>Clics</b></th>
                            <th><b>NewUrl</b></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while($result= mysqli_fetch_array($results)){
                        ?>
                        <tr>
                            <td><?=$result['title']?></td>
                            <td><?=$result['url']?></td>
                            <td><?=$result['clics']?></td>
                            <td>
                                <a href="?url=<?=$result['url']?>&newUrl=<?=$result['id']?>" target="_blank">
                                    <?=$result['id']?>
                                </a>
                            </td>

                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include_once('includes/footer.php');?>

</body>
</html>
