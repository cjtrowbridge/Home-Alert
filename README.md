# PHP-TTS-Webhooks
This PHP script allows you to create TTS webhooks.
  
## Requirements
You will need to have GNU say installed. 
`apt-get install say`

You will also need to allow the www-data user to do audio output.
`sudo adduser www-data audio`

## IMPORTANT
You should not run this script without locking down the virtualhost with a htpasswd file. Create a very strong username and password like so;
  
`sudo htpasswd -c /etc/apache2/.htpasswd [Username]`
  
You will be prompted to enter a password.
  
Then add this to the virtualhost;
  
`<Directory "/var/www/html/say">
  AuthType Basic
  AuthName "Restricted Content"
  AuthUserFile /etc/apache2/.htpasswd
  Require valid-user
</Directory>`
  
I am assuming you clone this repository into /var/www/say. Change this path as needed. It will require the username and password you set up for anyone trying to access that directory.
  
##Setup
  
Edit the say.php file and enter the username and password you chose in the previous step where prompted. Now navigate to the file in a browser using the public FQDN. It's fine if this is an IP, as long as it's publicly accessible. Open the say.php file and play around with the test page. It will help you create a webhook which includes the uersname and password as well as the string you would like it to say. 
  
Use this webhook for IFTTT or other services which you want to be able to play TTS messages on your device!
