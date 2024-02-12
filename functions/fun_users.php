<?php
function insert_user($name,$phone,$username,$password,$power,$hadia,$donation,$volunteering,$users)
{
    global $connection;
    $sql_insert = "INSERT INTO
    users(name,phone,username,password,power,del)
    VALUES
    ('$name','$phone','$username','$password','$power',0)";

    if(mysqli_query($connection,$sql_insert))
    {
        $id_user = mysqli_insert_id($connection);
        insert_user_permissions($id_user,$hadia,$donation,$volunteering,$users);
        return $id_user;
    }
    else
    {
        return false;
    }
}
function insert_user_permissions($id_user,$hadia,$donation,$volunteering,$users)
{
    global $connection;
    $sql_insert = "INSERT INTO
    user_permissions(id_user,hadia,donation,volunteering,users)
    VALUES
    ('$id_user','$hadia','$donation','$volunteering','$users')";
    if(mysqli_query($connection,$sql_insert))
    {
        $id_user = mysqli_insert_id($connection);
        return $id_user;
    }
    else
    {
        return false;
    }
}
function get_user_permissions($id_user)
{
    global $connection;
    $sql_view = "SELECT * FROM user_permissions WHERE id_user = '$id_user' ";
    $query_view = mysqli_query($connection, $sql_view);
    if($user =  mysqli_fetch_object ( $query_view ) )
    {
        return $user;
    }
    else
    {
        return false;
    }
}
function get_users($del)
{
    global $connection;
    $sql_view = "SELECT * FROM users WHERE del = '$del' ORDER BY ID_user DESC";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $users[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $users );
    return $users;
}

function get_search_users($username,$name)
{
    global $connection;
    $sql_view = "SELECT * FROM users WHERE
    del = '0'
    AND
    name LIKE '%$name%'
    AND
    username LIKE '%$username%'
    ORDER BY username DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $users[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $users );
    return $users;
}
function get_user($id_user)
{
    global $connection;
    $sql_view = "SELECT name,username,phone,power FROM users WHERE ID_user = '$id_user'  ";
    $query_view = mysqli_query($connection, $sql_view);
    if($user =  mysqli_fetch_object ( $query_view ) )
    {
        return $user;
    }
    else
    {
        return false;
    }
}
function have_username($username)
{
    global $connection;
    $sql_view = "SELECT ID_user FROM users WHERE username = '$username'  ";
    $query_view = mysqli_query($connection, $sql_view);
    if($user =  mysqli_fetch_object ( $query_view ) )
    {
        return $user;
    }
    else
    {
        return false;
    }
}
?>