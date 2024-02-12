<?php
function insert_volunteering($type,$title,$date,$img,$note,$id_user)
{
    global $connection;
    $sql_insert = "INSERT INTO
    volunteering(type,title,date,img,note,date_create,del,id_user)
    VALUES
    ('$type','$title',$date,'$img','$note',CURRENT_TIMESTAMP,'0','$id_user')";
    //  echo $sql_insert;die();
    if(mysqli_query($connection,$sql_insert))
    {
        $id_volunteering = mysqli_insert_id($connection);
        return $id_volunteering;
    }
    else
    {
        return false;
    }
}
function delete_volunteering($id_volunteering)
{
    global $connection;
    $sql_insert = "DELETE FROM volunteering WHERE id_volunteering = '$id_volunteering'";
    //  echo $sql_insert;die();
    if(mysqli_query($connection,$sql_insert))
    {
        return $id_volunteering;
    }
    else
    {
        return false;
    }
}
function get_volunteering($type,$del)
{
    global $connection;
    $sql_view = "SELECT * FROM volunteering WHERE  type = '$type' AND del = '$del' ORDER BY date_create DESC";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $volunteering[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $volunteering );
    return $volunteering;
}
function get_volunteering_id($id_volunteering,$del)
{
    global $connection;
    $sql_view = "SELECT * FROM volunteering WHERE  id_volunteering = '$id_volunteering' AND del = '$del'";
    $query_view = mysqli_query($connection, $sql_view);
    $volunteering = mysqli_fetch_object ( $query_view ) ;
    return $volunteering;
}

function get_medias()
{
    global $connection;
    $medias = array();
    $sql_view = "SELECT * FROM media  ORDER BY id_media DESC";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $media = mysqli_fetch_object ( $query_view ) )
    {
        $images = get_images($media->id_media);
        $medias[]=["media"=>$media,"images"=>$images];
    }
    // array_pop ( $medias );
    return $medias;
}

function get_images($id_media )
{
    global $connection;
    $sql_view = "SELECT * FROM media_images WHERE  id_media = '$id_media' ";
    $query_view = mysqli_query($connection, $sql_view);
    if ( $images = mysqli_fetch_object ( $query_view ) )
    {
        return $images;
    }
    else
    {
        return false;
    }


}
function upload_img_to_folder($name,$FOLDER)
{
    $fileName = basename($_FILES[$name]["name"]);
    $targetFilePath =$FOLDER.$fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $fileType = strtolower($fileType);
    if(!empty($_FILES[$name]["name"]))
    {
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        print_r($_FILES);
        echo '<br>$_FILES[$name]["name"] = '.$_FILES[$name]["name"];
        echo '<br>$_FILES[$name]["tmp_name"] = '.$_FILES[$name]["tmp_name"];
        echo '<br>targetFilePath = '.$targetFilePath;
        echo '<br>FOLDER = '.$FOLDER;
        echo '<br>fileName = '.$fileName;
        echo '<br>fileType = '.$fileType;

        die();
        if(in_array($fileType, $allowTypes))
        {
            // Upload file to server
            if(move_uploaded_file($_FILES[$name]["tmp_name"], $targetFilePath))
            {
                // Insert image file name into database
                $statusMsg = $_FILES[$name]["name"];
            }
            else
            {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
        else
        {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }
    else
    {
        $statusMsg = 'Please select a file to upload.';
    }
    return $statusMsg;
}


function insert_donation($name,$phone_number,$type,$physically,$amount,$type_amount,$credit,$phone_credit,$address,$receipt)
{
    global $connection;
    $sql_insert = "INSERT INTO
    donation(name,phone_number,type,physically,amount,type_amount,credit,phone_credit,address,receipt,date_create,state)
    VALUES
    ('$name','$phone_number','$type','$physically',$amount,'$type_amount',$credit,'$phone_credit','$address','$receipt',CURRENT_TIMESTAMP,1)";

    if(mysqli_query($connection,$sql_insert))
    {
        $id_donation = mysqli_insert_id($connection);
        return $id_donation;
    }
    else
    {
        return false;
    }
}

function delete_donation($id_donation)
{
    global $connection;
    $sql_del= "DELETE FROM
    donation
    WHERE id_donation = '$id_donation'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_donation;
    }
    else
    {
        return false;
    }
}
function get_donation($state)
{
    global $connection;
    $sql_view = "SELECT * FROM  donation WHERE state = '$state' ORDER BY date_create DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $donation[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $donation );
    return $donation;
}

function insert_hadia($name,$phone,$name_to,$phone_to,$tag,$amount,$receipt)
{
    global $connection;
    $sql_insert = "INSERT INTO
    hadia(name,phone,name_to,phone_to,tag,amount,receipt)
    VALUES
    ('$name','$phone','$name_to','$phone_to',$tag,'$amount','$receipt')";

    if(mysqli_query($connection,$sql_insert))
    {
        $id_hadia = mysqli_insert_id($connection);
        return $id_hadia;
    }
    else
    {
        return false;
    }
}
function delete_hadia($id_hadia)
{
    global $connection;
    $sql_del= "DELETE FROM
    hadia
    WHERE id_hadia = '$id_hadia'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_hadia;
    }
    else
    {
        return false;
    }
}
function get_hadia()
{
    global $connection;
    $sql_view = "SELECT * FROM  hadia   ORDER BY date_create DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $hadia[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $hadia );
    return $hadia;
}

function insert_needy($name,$phone,$family_number,$bank_number,$living,$address,$source_income,$by_whom,$family_needs,$department)
{
    global $connection;
    $sql_insert = "INSERT INTO
    needy(name,phone,family_number,bank_number,living,address,source_income,by_whom,family_needs,department)
    VALUES
    ('$name','$phone','$family_number','$bank_number','$living','$address','$source_income','$by_whom','$family_needs','$department')";

    if(mysqli_query($connection,$sql_insert))
    {
        $id_needy = mysqli_insert_id($connection);
        return $id_needy;
    }
    else
    {
        return false;
    }
}
function delete_needy($id_needy)
{
    global $connection;
    $sql_del= "DELETE FROM
    needy
    WHERE id_needy = '$id_needy'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_needy;
    }
    else
    {
        return false;
    }
}
function get_needy()
{
    global $connection;
    $sql_view = "SELECT * FROM  needy   ORDER BY id_needy DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $needys[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $needys );
    return $needys;
}


function insert_delivery($name,$phone,$company,$type)
{
    global $connection;
    $sql_insert = "INSERT INTO
    delivery(name,phone,company,type)
    VALUES
    ('$name','$phone','$company','$type')";

    if(mysqli_query($connection,$sql_insert))
    {
        $id_delivery = mysqli_insert_id($connection);
        return $id_delivery;
    }
    else
    {
        return false;
    }
}
function delete_delivery($id_delivery)
{
    global $connection;
    $sql_del= "DELETE FROM
    delivery
    WHERE id_delivery = '$id_delivery'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_delivery;
    }
    else
    {
        return false;
    }
}
function get_delivery()
{
    global $connection;
    $sql_view = "SELECT * FROM  delivery   ORDER BY id_delivery DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $delivery[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $delivery );
    return $delivery;
}








function insert_donation_family($id_donation,$family_number)
{
    global $connection;
    $sql_insert = "INSERT INTO
    donation_family(id_donation,family_number,date_create)
    VALUES
    ('$id_donation','$family_number',CURRENT_TIMESTAMP)";
    if(mysqli_query($connection,$sql_insert))
    {
        return $id_donation;
    }
    else
    {
        return false;
    }
}
function get_family_donation()
{
    global $connection;
    $sql_view = "SELECT * FROM donation_family df,orphans_family f,donation d
    WHERE
    df.id_donation  = d.id_donation
    AND
    df.family_number  = f.family_number
    ORDER BY df.date_create DESC";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $donation_family[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $donation_family );
    return $donation_family;
}
function get_family_not_id_donation($id_donation,$type)
{
    global $connection;
    $sql_view = "SELECT * FROM orphans_family
    WHERE
    donation_type = '$type'
    AND
    family_number  NOT IN
    (
        SELECT family_number FROM donation_family
        WHERE  id_donation = '$id_donation'
    )
    ORDER BY date_create DESC";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $orphans_family[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $orphans_family );
    return $orphans_family;
}
?>