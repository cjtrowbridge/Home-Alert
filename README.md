# PHP-TTS-Webhooks
This PHP script allows you to create TTS webhooks. Want your Raspberry Pi to say something? No problem!
  
## Requirements
You will need to have GNU say installed. 
`apt-get install say`

You will also need to allow the www-data user to do audio output.
`sudo adduser www-data audio`

You will need to forward port 80 from your router to the server the script is running on, such as a Raspberry Pi.

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
  
I am assuming you clone this repository into /var/www/say. Change this path as needed. It will require the username and password you set up for anyone trying to access that directory. If you choose a different path, you should also update the hyperlink in the say.php file so it reflects your chosen hierarchy and creates valid webhooks.
  
## Setup
  
Edit the say.php file and enter the username and password you chose in the previous step where prompted. Now navigate to the file in a browser using the public FQDN. It's fine if this is an IP, as long as it's publicly accessible. Open the say.php file and play around with the test page. It will help you create a webhook which includes the uersname and password as well as the string you would like it to say. 
  
Use this webhook for IFTTT or other services which you want to be able to play TTS messages on your device!


## Future Plans
I plan to add support for playing local media files from the server as well as casting TTS and media files to devices such as a Google Home, rather than playing them on the local machine. I actually already have this working but it is very hacky, so I will try to clean it up and make it more reliable before releasing it. If you want to play around with that functionality now, there is a great project on github called [CastV2inPHP](https://github.com/ChrisRidings/CastV2inPHP). You will just need to use a cli tool to create a tts mp3 which you can cast. The trickiest part is getting Google Home to play the file. It's very easy to get a TV Chromecast to play the file, but the audio-only cast devices use a completely different system which doesn't seem to be documented very well. Stay tuned!
