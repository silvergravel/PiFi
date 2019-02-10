### PiFi v 2.0 - Suno Bolo
Suno Bolo PiFi is a small upgrade to the earlier Smart Netowork version. It is based on an existing use case wherein QR codes were being used to link people to a webpage where they could either consume content (Suno), or they could contribute content (Bolo). So with the PiFi, we have cut out need for QR codes or the internet. People can simply connect to the PiFi network, and in their browser they can consume or contribute content through the inteface. Suno Bolo also has an admin interface, for administrators to upload/delete content or to view content contributed by people.

What follows are the instructions to set up PiFi v 2.0 - Suno Bolo.

To start off, follow steps 1 to 12 in <a href="https://github.com/silvergravel/PiFi/tree/master/v01-smart_network" target="_blank">PiFi v01 - <strong>Smart Network</strong></a><br>

Then SSH into the PiFi. We need to modify a couple of files to make PiFi-v02 work.

## 13// Increase maximum file upload limit in php.ini

- Open up the `php.ini` file using the command:<br>
`sudo nano /etc/php/php.ini`
- Inside this file, find the line:<br>
`upload_max_filesize=2M` (2M means 2 MB)<br>
I changed the 2M to 600M. You could do the same.
- Then find the line:<br>
`post_max_size=8M` (8M means 8 MB)<br>
I changed the 8M to 800M. You could do the same.<br>
Whatever you change it to, make sure that IT IS MORE THAN THE UPLOAD_MAX_FILESIZE.
- Save changes to the file. Then exit it.


## 14// Increase maximum file upload limit in lighttpd.conf

- Now open up the `lighttpd.conf` file using the command:
`sudo nano /opt/piratebox/conf/lighttpd/lighttpd.conf`<br>
- Inside this file, find the line:<br>
`server.max-request-size = 5120` (basically means 5 MB)
- I added a couple of zeroes, so it now lookes like:<br>
`server.max-request-size = 512000` (basically means 500 MB). You could do the same.
- Save changes to the file. Then exit it.


## 15// Copy base files from assets folder.
One last step before PiFi v2.0 is up and running. 

We need to copy some of the base php, html and css files which render our little suno-bolo application

So:
- Switch off the power to your Raspberry Pi. 
- Remove the USB stick from it and insert it into your PC.
- Now, in the assets folder provided in this folder, you will find two sub-folders: **content** and **Shared**
- Copy the contents inside each of these folders and paste them inside the equivalently named folders on the USB stick. When the system asks you if you want to replace an existing folder, say **yes**.
- Also, in the case of the **Shared** folder on the USB stick, be sure to delete all the existing files inside it, before you paste the files that have been provided in the assets folder.
- Last thing to do— go to the **content** folder on the USB stick, rename the **index.html** file to **inactive.html**, and then, go to the **board** folder on the USB stick, and rename the **index.html** file to **inactive.html**.

## 16// Test your PiFi!
Power up your Pi once again. Give it 2-3 minutes, then go to your wireless networks list.

Here you will find a new network named **PiFi** (or whatever else you changed the SSID name to). Connect to it.

Then go to your browser, and type in the URL **pifi.in** (or whatever else you changed the URL to).

Thats it! You should have landed on a home page with two big **'SUNO'** & **'BOLO'** buttons. Play around with it.

Remember, if you want to upload / delete **'SUNO Media'**, or if you want to view **'BOLO submissions'**, you will have to access the admin panel, which you can do by typing the URL:<br> 
`your-pifi-URL/content/admin/`<br>

In my case it looks like:<br>
`pifi.in/content/admin/`<br>

Thats it! Have fun!
