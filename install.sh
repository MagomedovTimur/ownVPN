apt install apache2 apache2-utils python3 php libapache2-mod-php ufw git --assume-yes
ufw allow 80/tcp
ufw allow 443/tcp
git clone https://github.com/MagomedovTimur/ownVPN
cd ownVPN
rm -r /var/www/html/
mv src/html/ /var/www/
