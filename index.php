<?php 
function db_connect() {
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$dbname = 'test2';
//connection to the database
    $dbcon = @mysqli_connect($hostname, $username, $password, $dbname);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL ";
        exit;
    }

    @mysqli_set_charset($dbcon, 'utf8');

    return $dbcon;
}

include 'ShopStyle/API.php';
include 'ShopStyle/Query/IQuery.php';
include 'ShopStyle/Query/BasicQuery.php';
$limit = isset($_GET['lt']) ? $_GET['lt'] : 50;
$offset = isset($_GET['of']) ? $_GET['of'] : 50;
$tpr = $offset+50;
//$api = new API('uid761-40030819-76');
$api = new API('uid761-40030819-76');
//list:48503667

//uid2676-39956026-1

/* //$url = "http://api.shopstyle.com/api/v2/categories?pid=uid761-40030819-76";
$url = "http://api.shopstyle.com/api/v2/lists/48306750/items?pid=uid761-40030819-76&limit=$limit&offset&$offset";

		$ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_CONNECTTIMEOUT => 20,
            CURLOPT_DNS_USE_GLOBAL_CACHE => 0
        );

        curl_setopt_array($ch, $options);

        $data = curl_exec($ch); */
		
		//$result  = $api->getProducts($limit,$offset);
		//$result  = $api->getlists($limit,$offset);
		$result  = $api->getProducts($limit,$offset);
		//$result = json_decode($data);
		
	//echo "<pre>";print_r($result->products);
$sUrl = array();
$new_arra = array();
 $values = '';
  $db = db_connect();
echo "<pre>";
print_r($result->products);die;
 foreach ($result->products as $product): 
		
		$description = mysqli_real_escape_string($db,$product->description);
		$product_name = mysqli_real_escape_string($db,$product->name);
		$brand = isset($product->brand->name) ? $product->brand->name : '';			
		$currency = mysqli_real_escape_string($db,$product->currency);
		$price = mysqli_real_escape_string($db,$product->price);
		$clickUrl = mysqli_real_escape_string($db,$product->clickUrl);
		$image_url = mysqli_real_escape_string($db,$product->image->sizes->XLarge->url);

	$values .= "('{$product->id}','{$brand}',
	'{$product_name}','{$currency}','{$price}',
	'{$description}','{$clickUrl}','{$image_url}'),";

 endforeach;
 $values = rtrim($values,',');
 $sql = "insert into products (product_id,brand,name,currency,price,description,product_url,image_url) values $values";

 
if(mysqli_query($db,$sql)){
	echo "done";

}
else{
	echo mysqli_error($db);
}
 
?>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	console.log("Hello"); 
	var url = "http://localhost/shop?of=<?php echo $tpr?>";
	setInterval(function(){
		//window.location.href= url;
		}, 3000);
	
	/*jsonUrls = '<?php echo json_encode($sUrl);?>';
	console.log(jsonUrls);
	 var jsonUrls = JSON.parse(jsonUrls);
	var count = 0;
	var temp = 0;
	var mywin = "";
	 $.each(jsonUrls,function(i,url){
		console.log(mywin);
		setTimeout(function() {
			mywin = window.open(url, '_blank');
		  }, 62000*i)
		
		
	});  */
	
	//clearInterval(myVar);
});
</script>																																																																								
																																																																																																	