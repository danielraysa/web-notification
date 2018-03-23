 <?php
 $ldap_host = '123.456.7.89'; //Host LDAP
 $ldap_domain = 'jasuindo.co.id'; // LDAP Domain
 $ldap_dn = 'dc=jasuindo,dc=co,dc=id'; // Domain Component
 // Jika $ldap_domain = 'mazhters.co.id'; 
 // maka $ldap_dn = 'dc=mazhters,dc=co,dc=id';
 $ldap_user = 'userlogin';
 $ldap_pass = 'userpass';
 
 $ldap_conn = ldap_connect($ldap_host);
 if($ldap_conn) 
 {
  // menyatukan aplikasi dengan server LDAP
  $ldapbind = ldap_bind($ldap_conn, $ldap_user, $ldap_pass);
  // verify binding
  if (!$ldapbind){
   die('Login gagal, userlogin or userpass salah');
  }
 }
 else
 {
  die('Koneksi ke LDAP Gagal');
 }
 
 //Ada beberapa server yang mesti minta set_option ini dulu
 ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
 ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);
 
 //Mencari nilai-nilai dari atribut LDAP sesuai filter yang di inginkan.
 //Sample yg ane pake ini untuk mencari nilai-nilai atribut berdasarkan userlogin
 $result = ldap_search($ldap_conn, $ldap_dn, "(samaccountname=".$ldap_user.")");
 
 //Nah ini untuk narik nilai atributnya.
 $entries = ldap_get_entries($ldap_conn, $result);
 
 //Ini untuk munculin, tinggal dipilih-dipilih value mana yang mau diambil
 echo "<pre>";
 print_r($entries);
 echo "</pre>";
 die();
 ?>
 