<?php 
try {
    $db = new PDO('mysql:host=localhost;dbname=cafesadettin_yenidb', 'cafesadettin_user', 'Mwb&=RRryfCq');
} catch ( PDOException $e ){
    print $e->getMessage();
}

$login_ad = $_POST['ad'];
$login_soyad = $_POST['soyad'];
$username = $_POST['user'];
$password = $_POST['pass'];
$password_again = $_POST['pass_again'];

if(!$login_ad){
    echo "Lütfen Adınızı Giriniz";
}
elseif(!$login_soyad){
    echo "Lütfen Soyadınızı Giriniz";
}
elseif(!$username){
    echo "Lütfen Kullanıcı Adınızı Giriniz";
}
elseif(!$password || !$password_again){
    echo "Lütfen Şifrenizi Giriniz";
}
elseif($password != $password_again){
    echo "Girdiğiniz Şifreler Birbirleriyle Aynı Değil";
}
else{
    $login = $db->prepare('INSERT INTO tbl_user SET login_ad=? , login_soyad=?, kullanici_adi=? , sifre =?');
    $login->execute(array($login_ad, $login_soyad , $username , $password));
    if ($login->rowCount())
    {
        echo "<script> alert('Kayıt Başarılı , Yönlendiriliyorsunuz.');</script>";
        header('Refresh:2; login.html');
    }
    else{
        echo "<script> alert('HATA.');</script>";
        header('Refresh:2; register.html');
    }
}

?>