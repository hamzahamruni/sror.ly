<?php
function GET_IP_ADDRESS()
{
    $IP_ADDRESS = '';
	if (getenv('HTTP_CLIENT_IP'))
		$IP_ADDRESS = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$IP_ADDRESS = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$IP_ADDRESS = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$IP_ADDRESS = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
	$IP_ADDRESS = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$IP_ADDRESS = getenv('REMOTE_ADDR');
	else
		$IP_ADDRESS = 'UNKNOWN';
    return $IP_ADDRESS;
}
function we_have_ip($IP_ADDRESS)
{
    global $connection;
    $sql_view = "SELECT * FROM vister_web WHERE  ip_address = '$IP_ADDRESS' ";
    $query_view = mysqli_query($connection, $sql_view);
    if ( $ip = mysqli_fetch_object ( $query_view ) )
    {
        return true;
    }
    else
    {
        return false;
    }


}
function insert_vister()
{
    $IP_ADDRESS = GET_IP_ADDRESS();
    if(!we_have_ip($IP_ADDRESS))
    {
        global $connection;
        $sql_insert = "INSERT INTO
        vister_web(ip_address)
        VALUES
        ('$IP_ADDRESS')";
        if(mysqli_query($connection,$sql_insert))
        {

            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }

}
function count_hadia()
{
    global $connection;
    $sql_view = "SELECT IFNULL(COUNT(id_hadia),0) as count_hadia FROM hadia ";
    $query_view = mysqli_query($connection, $sql_view);
    $count =  mysqli_fetch_object ( $query_view );
    return $count->count_hadia;
}
function count_donation()
{
    global $connection;
    $sql_view = "SELECT IFNULL(COUNT(id_donation),0) as count_donation FROM donation ";
    $query_view = mysqli_query($connection, $sql_view);
    $count =  mysqli_fetch_object ( $query_view );
    return $count->count_donation;
}
function count_vister()
{
    global $connection;
    $sql_view = "SELECT IFNULL(COUNT(ip_address),0) as count_vister FROM vister_web";
    $query_view = mysqli_query($connection, $sql_view);
    $count =  mysqli_fetch_object ( $query_view );
    return $count->count_vister;
}
function count_users()
{
    global $connection;
    $sql_view = "SELECT IFNULL(COUNT(id_user),0) as count_users FROM users ";
    $query_view = mysqli_query($connection, $sql_view);
    $count =  mysqli_fetch_object ( $query_view );
    return $count->count_users;
}
?>