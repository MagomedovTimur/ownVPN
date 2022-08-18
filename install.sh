apt install apache2 apache2-utils python3 php libapache2-mod-php ufw git strongswan strongswan-pki libcharon-extra-plugins libcharon-extauth-plugins libstrongswan-extra-plugins --assume-yes
ufw allow 80/tcp
ufw allow 443/tcp
git clone https://github.com/MagomedovTimur/ownVPN
cd ownVPN
rm -r /var/www/html/
mv src/html/ /var/www/
mkdir /opt/ownVPN
mv src/opt/ /opt/ownVPN/
