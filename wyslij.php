<?php
$myfile = fopen("vars.yml", "w") or die("Unable to open file!");
$mywolfile = fopen("wol.yml", "a") or die("WOLUnable to open file!");



$servername="localhost";
$username = "root";
$password = "ZAQ!2wsx";
$dbname = "kompy";


$conn = new mysqli($servername, $username, $password, $dbname);

$boot_var = "Boot_Type:";
$boot_radio = $_POST['boot'];
$BootType[0] = "/srv/dvd/autoyast/default";
$BootType[1] = "/srv/dvd/autoyast/grub.cfg";

if (isset($_POST['wyslij']))
  {
    if(!empty($boot_radio))
    {
        fwrite($myfile, $boot_var);
        if ($boot_radio == "legacy") 
        {
            
            fwrite($myfile, " '$BootType[0]'");
        }
        elseif($boot_radio == "UEFI")
        {
            fwrite($myfile, " '$BootType[1]'");
        }
    }
    else{
        echo 'no value';
    }
}

$workPlaceNumber = $_POST['workplace'];
$komp = $_POST['komp'];
 

if (isset($_POST['wyslij']))
{
    for ($i = 0; $i < count($workPlaceNumber); $i++)
    {
        if ($komp == "gora") {
            $query = "SELECT * FROM kompy WHERE nr_stanowiska = '$workPlaceNumber[$i]' AND miejsce = 'gora'";
        }
        elseif($komp == "dol"){
            $query = "SELECT * FROM kompy WHERE nr_stanowiska = '$workPlaceNumber[$i]' AND miejsce = 'dol'";
        }
        $result = $conn->query ($query);
        $wynik = mysqli_fetch_assoc($result);

        if($workPlaceNumber[$i] == "1")
        {
            
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");

        }
        if($workPlaceNumber[$i] == "2")
        {

            fwrite($mywolfile, '        - ' . $wynik['MAC'] . "\n");
        }
        if($workPlaceNumber[$i] == "3")
        {   
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "4")
        {   
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "5")
        {   
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "6")
        {   
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "7")
        {   
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "8")
        {   
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "9")
        {   
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "10")
        {   ;
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "11")
        {   ;
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "12")
        {   ;
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "13")
        {   ;
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "14")
        {   ;
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "15")
        {   ;
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "16")
        {   ;
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "17")
        {   ;
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
        if($workPlaceNumber[$i] == "18")
        {   ;
            fwrite($mywolfile, '        - '.$wynik['MAC']."\n");
        }
    }
}

$suma = count($_POST['workplace']);

fwrite($myfile, "\nNumber_of_Copms: $suma");


$Computer_Environment = "\nEnviroment:";
$type = $_POST['Enviroment'];

if (isset($_POST['wyslij'])) {
    if (!empty($type)) {
        fwrite($myfile, $Computer_Environment);
        if ($type == "CLI" && $boot_radio == "legacy" && $komp == "gora") {
            fwrite($myfile, " /dvd/autoyast/autoLegacyGora.xml");
        } elseif ($type == "GUI" && $boot_radio == "UEFI" && $komp == "dol") {
            fwrite($myfile, " /dvd/autoyast/autoEFIDol.xml");
        }
	  elseif ($type == "GUI" && $boot_radio == "legacy" && $komp == "dol") {
            fwrite($myfile, " /dvd/autoyast/autoLegacyDol.xml");
        }
	  elseif ($type == "GUI" && $boot_radio == "UEFI" && $komp == "gora") {
            fwrite($myfile, " /dvd/autoyast/autoEFIGora.xml");
        }
	  elseif ($type == "GUI" && $boot_radio == "legacy" && $komp == "gora") {
            fwrite($myfile, " /dvd/autoyast/autoLegacyGora.xml");
        }
	  elseif ($type == "CLI" && $boot_radio == "legacy" && $komp == "dol") {
            fwrite($myfile, " /dvd/autoyast/autoLegacyDol.xml");
        }
          elseif ($type == "CLI" && $boot_radio == "UEFI" && $komp == "gora") {
            fwrite($myfile, " /dvd/autoyast/autoEFIGora.xml");
        }
          elseif ($type == "CLI" && $boot_radio == "UEFI" && $komp == "dol") {
            fwrite($myfile, " /dvd/autoyast/autoEFIDol.xml");
        }
    }
}


$speed_var = "\nSpeed: ";
$speed = $_POST['speed'];

if(isset($_POST['wyslij']))
{
    fwrite($myfile, $speed_var);
    if (!empty($speed)) {
        $int_speed = (int) $speed;
        $int_speed *= 1048576;
        fwrite($myfile,$int_speed);
    }

}
$vm_name = "\nCopy_VM:";
$vm = $_POST['vm'];
$vm_command = "";

if(isset($_POST['wyslij']))
{
    if(!empty($vm))
    {
        fwrite($myfile, $vm_name);
        if($vm == "tak")
        {
            fwrite($myfile, " 'sudo ansible-playbook uftpd.yml' ");
        }
        elseif($vm == "nie")
        {
            fwrite($myfile, " \"echo 'Pomijamy wysyłanie wirtualek'\"");
        }
    }
}

fclose($myfile);
fclose($mywolfile);


$final = shell_exec('sudo ansible-playbook ./cos.yml');
//$playbook = new Ansible('cos.yml');

if (isset($_POST['wyslij'])) {

    //$playbook->run();
    echo $final;
}
//header('Location: install.php');
?>

