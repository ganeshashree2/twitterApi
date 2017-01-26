<html>
<head>
<title> Tweets Page </title>
</head>
<?php
$user = escapeshellarg($_POST[userId]);
$userId = trim($user, "'");
$url = '"api.twitter.com" "/1.1/statuses/user_timeline.json?screen_name='.$userId.'"';
$data = exec('twurl '.$url);
$jsonData = json_decode($data,true);
echo '<body bgcolor="#ffe6f0">';
echo '<center><img src='.$jsonData[0]["user"]["profile_image_url"].' alt="Profile Picture" style="width:230px;height:228px;"></center><br/>';
echo '<center><h3>'.$jsonData[0]["user"]["name"].'</h3></center><br/><center>Screen Name: <b>'.$jsonData[0]["user"]["screen_name"].'</b></center><br/>';
echo '<center>id: <b>'.$jsonData[0]["user"]["id"].'</b></center><br/>';
echo '<center>description: '.$jsonData[0]["user"]["description"].'</b></center><br/><br/>';
echo '<br/><br/><table align="center" style="width:90%"><tr>';
echo "<th>id</th><th>Screen Name</th><th>Name</th><th>Description</th><th>Tweet</th><th>TimeStamp</th><th>Source</th><th>See Tweet</th></tr>";
foreach($jsonData as $items)
    {
        echo "<tr><td>".$items['id']."</td>";
        echo "<td>". $items['user']['screen_name']."</td>";
        echo "<td>". $items['user']['name']."</td>";
        echo "<td>". $items['user']['description']."</td>"; 
        echo "<td>". $items['text']."</td>";
        echo "<td>". $items['created_at']."</td>";
        echo "<td>". $items['source']."</td>"; 
        echo "<td><a href=https://twitter.com/".$items['user']['screen_name']."/status/". $items['id_str'].">Click to see this Tweet</a></td></tr>";
    }

?>
</table>
<br/><br/>
<a href = "http://localhost/home.php"> Search tweets of another user </a>
<br/><br/>
<center>
<a class="twitter-share-button"
  href="https://twitter.com/intent/tweet">
Tweet</a>
</center>
</body>
</html>
