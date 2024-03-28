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
function insert_achievements($title,$detiles,$date,$image)
{
    global $connection;
    $sql_insert = "INSERT INTO
    achievements(title,detiles,date,img)
    VALUES
    ('$title','$detiles','$date','$image')";

    if(mysqli_query($connection,$sql_insert))
    {
        $id_achievements = mysqli_insert_id($connection);
        return $id_achievements;
    }
    else
    {
        return false;
    }
}
function delete_achievements($id_achievements)
{
    global $connection;
    $sql_del= "DELETE FROM
    achievements
    WHERE id_achievements = '$id_achievements'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_achievements;
    }
    else
    {
        return false;
    }
}
function get_achievements()
{
    global $connection;
    $sql_view = "SELECT * FROM  achievements   ORDER BY id_achievements DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $achievements[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $achievements );
    return $achievements;
}
function get_achievements_id($id_achievements)
{
    global $connection;
    $sql_view = "SELECT * FROM achievements WHERE  id_achievements = '$id_achievements' ";
    $query_view = mysqli_query($connection, $sql_view);
    $volunteering = mysqli_fetch_object ( $query_view ) ;
    return $volunteering;
}
function insert_activities($name,$link,$detiles,$img)
{
    global $connection;
    $sql_insert = "INSERT INTO
    activities(name,link,detiles,img)
    VALUES
    ('$name','$link','$detiles','$img')";

    if(mysqli_query($connection,$sql_insert))
    {
        $id_activities = mysqli_insert_id($connection);
        return $id_activities;
    }
    else
    {
        return false;
    }
}
function delete_activities($id_activities)
{
    global $connection;
    $sql_del= "DELETE FROM
    activities
    WHERE id_activities = '$id_activities'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_activities;
    }
    else
    {
        return false;
    }
}
function get_activities_id($id_activities,$del)
{
    global $connection;
    $sql_view = "SELECT * FROM activities WHERE  id_activities = '$id_activities' ";
    $query_view = mysqli_query($connection, $sql_view);
    $volunteering = mysqli_fetch_object ( $query_view ) ;
    return $volunteering;
}
function get_activities()
{
    global $connection;
    $sql_view = "SELECT * FROM  activities   ORDER BY id_activities DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $activities[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $activities );
    return $activities;
}
function insert_campaigns($name,$detiles,$img)
{
    global $connection;
    $sql_insert = "INSERT INTO
    campaigns(name,detiles,img)
    VALUES
    ('$name','$detiles','$img')";

    if(mysqli_query($connection,$sql_insert))
    {
        $id_campaigns = mysqli_insert_id($connection);
        return $id_campaigns;
    }
    else
    {
        return false;
    }
}
function delete_campaigns($id_campaigns)
{
    global $connection;
    $sql_del= "DELETE FROM
    campaigns
    WHERE id_campaigns = '$id_campaigns'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_campaigns;
    }
    else
    {
        return false;
    }
}
function get_campaigns()
{
    global $connection;
    $sql_view = "SELECT * FROM  campaigns   ORDER BY id_campaigns DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $campaigns[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $campaigns );
    return $campaigns;
}
function get_campaigns_id($id_campaigns)
{
    global $connection;
    $sql_view = "SELECT * FROM campaigns WHERE  id_campaigns = '$id_campaigns' ";
    $query_view = mysqli_query($connection, $sql_view);
    $volunteering = mysqli_fetch_object ( $query_view ) ;
    return $volunteering;
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


function insert_product($name,$price,$detiles,$image)
{
    global $connection;
    $sql_insert = "INSERT INTO
    product(name,price,detiles,img)
    VALUES
    ('$name','$price','$detiles','$image')";
    if(mysqli_query($connection,$sql_insert))
    {
        $id_product = mysqli_insert_id($connection);
        return $id_product;
    }
    else
    {
        return false;
    }
}
function delete_product($id_product)
{
    global $connection;
    $sql_del= "DELETE FROM
    product
    WHERE id_product = '$id_product'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_product;
    }
    else
    {
        return false;
    }
}
function get_product()
{
    global $connection;
    $sql_view = "SELECT * FROM  product   ORDER BY id_product DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $data[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $data );
    return $data;
}
function get_id_product($id_product)
{
    global $connection;
    $sql_view = "SELECT * FROM  product   WHERE id_product = '$id_product' ";
    $query_view = mysqli_query($connection, $sql_view);
    $data = mysqli_fetch_object ( $query_view );
    return $data;
}

function insert_product_res($id_product,$name,$phone,$address)
{
    global $connection;
    $sql_insert = "INSERT INTO
    product_res(id_product,name,phone,address)
    VALUES
    ('$id_product','$name','$phone','$address')";
    if(mysqli_query($connection,$sql_insert))
    {
        $id_product_res = mysqli_insert_id($connection);
        return $id_product_res;
    }
    else
    {
        return false;
    }
}
function get_product_res($id_product)
{
    global $connection;
    $sql_view = "SELECT * FROM  product_res   WHERE id_product = '$id_product' ";
    $query_view = mysqli_query($connection, $sql_view);
    $data = mysqli_fetch_object ( $query_view );
    return $data;
}
function get_all_product_res()
{
    global $connection;
    $sql_view = "SELECT pd.name,pd.price,pd.img,pdr.name  name_res,pdr.phone,pdr.address
                 FROM  product pd,product_res pdr
                WHERE pd.id_product=pdr.id_product
                ORDER BY id_product_res DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $data[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $data );
    return $data;
}
function get_all_kafala_res()
{
    global $connection;
    $sql_view = "SELECT kf.name,kf.type,kf.img,kfr.name  name_res,kfr.phone,kfr.address
                 FROM  kafala kf,kafala_res kfr
                WHERE kf.id_kafala=kfr.id_kafala
                ORDER BY id_kafala_res DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $data[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $data );
    return $data;
}



function insert_kafala($name,$type,$detiles,$image)
{
    global $connection;
    $sql_insert = "INSERT INTO
    kafala(name,type,detiles,img)
    VALUES
    ('$name','$type','$detiles','$image')";
    if(mysqli_query($connection,$sql_insert))
    {
        $id_kafala = mysqli_insert_id($connection);
        return $id_kafala;
    }
    else
    {
        return false;
    }
}
function delete_kafala($id_kafala)
{
    global $connection;
    $sql_del= "DELETE FROM
    kafala
    WHERE id_kafala = '$id_kafala'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_kafala;
    }
    else
    {
        return false;
    }
}
function get_kafala()
{
    global $connection;
    $sql_view = "SELECT * FROM  kafala   ORDER BY id_kafala DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $data[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $data );
    return $data;
}
function get_id_kafala($id_kafala)
{
    global $connection;
    $sql_view = "SELECT * FROM  kafala   WHERE id_kafala = '$id_kafala' ";
    $query_view = mysqli_query($connection, $sql_view);
    $data = mysqli_fetch_object ( $query_view );
    return $data;
}
function insert_kafala_res($id_kafala,$name,$phone,$address)
{
    global $connection;
    $sql_insert = "INSERT INTO
    kafala_res(id_kafala,name,phone,address)
    VALUES
    ('$id_kafala','$name','$phone','$address')";
    if(mysqli_query($connection,$sql_insert))
    {
        $id_kafala = mysqli_insert_id($connection);
        return $id_kafala;
    }
    else
    {
        return false;
    }
}



function insert_project($name,$detiles,$image)
{
    global $connection;
    $sql_insert = "INSERT INTO
    project(name,detiles,img)
    VALUES
    ('$name','$detiles','$image')";
    if(mysqli_query($connection,$sql_insert))
    {
        $id_project = mysqli_insert_id($connection);
        return $id_project;
    }
    else
    {
        return false;
    }
}
function delete_project($id_project)
{
    global $connection;
    $sql_del= "DELETE FROM
    project
    WHERE id_project = '$id_project'
    ";

    if(mysqli_query($connection,$sql_del))
    {
        return $id_project;
    }
    else
    {
        return false;
    }
}
function get_project()
{
    global $connection;
    $sql_view = "SELECT * FROM  project   ORDER BY id_project DESC ";
    $query_view = mysqli_query($connection, $sql_view);
    while ( $data[] = mysqli_fetch_object ( $query_view ) );
    array_pop ( $data );
    return $data;
}
?>