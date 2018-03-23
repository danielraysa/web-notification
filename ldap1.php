 <?php
$ldap['user'] = "cn=admin,dc=emka,dc=web,dc=id";
$ldap['pass'] = "abcdefghij";
$ldap['host']   = 'ldap.emka.web.id';
$ldap['port']   = 389;
 
$ldap['conn'] = ldap_connect( $ldap['host'], $ldap['port'] )
    or die("Could not conenct to {$ldap['host']}" );
 
ldap_set_option($ldap['conn'], LDAP_OPT_PROTOCOL_VERSION, 3);
$ldap['bind'] = ldap_bind($ldap['conn'], $ldap['user'], $ldap['pass']);
 
if( !$ldap['bind'] )
{
    echo ldap_error( $ldap['conn'] );
    exit;
}
 
echo ($ldap['bind'])? "Valid Login" : "Login Failed";
 
ldap_close( $ldap['conn'] );
?>