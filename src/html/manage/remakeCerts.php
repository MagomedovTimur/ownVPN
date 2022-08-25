<?php

$jsonString = file_get_contents('/opt/ownVPN/config.json');
$data = json_decode($jsonString, true);

$externalIP = $data['externalIP'];



$ipsecConf = 'config setup\n  charondebug=\"ike 1, knl 1, cfg 0\"\n  uniqueids=no\nconn ikev2-vpn\n  auto=add\n  compress=no\n  type=tunnel\n  keyexchange=ikev2\n  fragmentation=yes\n  forceencaps=yes\n  dpdaction=clear\n  dpddelay=300s\n  rekey=no\n  left=%%any\n  leftid='. $externalIP .'\n  leftcert=server-cert.pem\n  leftsendcert=always\n  leftsubnet=0.0.0.0/0\n  right=%%any\n  rightid=%%any\n  rightauth=eap-mschapv2\n  rightsourceip=10.10.10.0/24\n  rightdns=8.8.8.8,8.8.4.4\n  rightsendcert=never\n  eap_identity=%%identity\n  ike=chacha20poly1305-sha512-curve25519-prfsha512,aes256gcm16-sha384-prfsha384-ecp384,aes256-sha1-modp1024,aes128-sha1-modp1024,3des-sha1-modp1024!\n  esp=chacha20poly1305-sha512,aes256gcm16-ecp384,aes256-sha256,aes256-sha1,3des-sha1!\n';

echo($ipsecConf);

$command = '
rm -R /opt/ownVPN/pki/;
rm /etc/ipsec.conf;
touch /etc/ipsec.conf;

mkdir -p /opt/ownVPN/pki/cacerts;
mkdir -p /opt/ownVPN/pki/certs;
mkdir -p /opt/ownVPN/pki/private;

pki --gen --type rsa --size 4096 --outform pem > /opt/ownVPN/pki/private/ca-key.pem;
pki --self --ca --lifetime 3650 --in /opt/ownVPN/pki/private/ca-key.pem --type rsa --dn "CN=VPN root CA" --outform pem > /opt/ownVPN/pki/cacerts/ca-cert.pem;
pki --gen --type rsa --size 4096 --outform pem > /opt/ownVPN/pki/private/server-key.pem;
pki --pub --in /opt/ownVPN/pki/private/server-key.pem --type rsa | pki --issue --lifetime 1825 --cacert /opt/ownVPN/pki/cacerts/ca-cert.pem --cakey /opt/ownVPN/pki/private/ca-key.pem --dn "CN=' . $externalIP . '" --san @' . $externalIP . ' --san ' . $externalIP . ' --flag serverAuth --flag ikeIntermediate --outform pem >/opt/ownVPN/pki/certs/server-cert.pem;

cp -r /opt/ownVPN/pki/* /etc/ipsec.d/;

printf "'.$ipsecConf.'" > /etc/ipsec.conf;
systemctl restart strongswan-starter;
';

exec($command);

echo "sosals";

?>