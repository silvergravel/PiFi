# READ ME: PiFi

The PiFi has been built on top of the open source code provided by The Piratebox Project— A self contained mobile communication and file sharing system. Users can wirelessly connect to the piratebox and share or access images, videos, audio, documents and other digital content.

You can find more details about the original Piratebox project <a href="https://piratebox.cc/" target="_blank">here</a>.

The PiFi is an ongoing project that uses the Piratebox code as it’s starting point. The goal with this project is to design a device that addresses the information sharing needs of the people in rural India, where internet generally tends to be poor, or sometimes non-existent.

As we add newer features and functionalities to PiFi, we shall keep updating this readme file to appropriately guide any reader to be able to source the required hardware, software, and replicate the PiFi to whatever level of sophistication it stands at, at our end.


### PiFi v 1.0

Currently the PiFi has been configured as a self-standing wifi hotspot, which is NOT connected to the internet. Users can connect to the PiFi, and through the browser they can access the PiFi webpage. Here, they can share or view video content.

### Who is this Read Me for?

This readme has been written with the intention that even someone with little to no knowledge of the UNIX command line interface (and code in general), can follow, and successfully configure PiFi v 1.0. If this is still not comprehensive, or if at all, too detailed, then please let us know! Any and all kinds of feedback are welcome.




## 1.0// Components Needed

### Hardware
1. **Raspberry Pi 3 or higher**<br>
You could use an older version of the Raspberry Pi as well, but for that, you will need an additional component: **A USB Wifi Adapter** like this <a href="https://www.amazon.in/Edimax-EW-7811Un-Wi-Fi-Adapter-Black/dp/B003MTTJOY/ref=sr_1_1_sspa?ie=UTF8&qid=1541314937&sr=8-1-spons&keywords=edimax+wifi+adapter&psc=1" target="_blank">one</a>. You’ll have to do this since the Pi versions before 3 do not have inbuilt wifi card.
2. **USB Stick - 16 GB - formatted to FAT32** like this <a href="https://www.amazon.in/SanDisk-Cruzer-Blade-SDCZ50-016G-135-Drive/dp/B002U1ZBG0/ref=sr_1_3?ie=UTF8&qid=1541834486&sr=8-3&keywords=sandisk+usb+16" target="_blank">one</a>.
3. **SD Card - 16 GB** like this <a href="https://www.amazon.in/Sandisk-MicroSD-UHS-A1-Adapter-SDSQUAR-016G-GO61A/dp/B07D2JS5WN/ref=sr_1_2?ie=UTF8&qid=1541834327&sr=8-2&keywords=sandisk+ultra+micro+sd+16+gb" target="_blank">one</a>.
4. **Power adapter for the Raspberry Pi.**
Alternately, you could also use a **power bank** to power up the PiFi. We have tested it using <a href="https://www.amazon.in/Mi-20000mAH-Li-Polymer-Power-White/dp/B077RV8CCZ/ref=sr_1_2?s=electronics&ie=UTF8&qid=1541315097&sr=1-2&keywords=mi+power+bank" target="_blank">this power bank</a>, and it works well.

Note: I usually buy <a href="https://www.amazon.in/Raspberry-Pi-3B-Motherboard-Combo/dp/B07BZY16SL/ref=sr_1_4?ie=UTF8&qid=1543384796&sr=8-4&keywords=raspberry+pi+3+b%2B+pibox" target="_blank">this combo kit</a>. It contains the Pi 3B+, an original casing for it, a power adapter for it & one 8GB MicroSD card. That just leaves the USB stick, which I buy separately (like the one in the link above.

### Software
1. **Piratebox image file.**<br>
This is essentially the core Piratebox ‘software’ that enables all the features and functionalities of the Piratebox. We need to ‘install’ this software as the base, after which we will be making some tweaks to the code to enable our simplistic video sharing and viewing functionality.<br>
For downloading this image file, you will need a torrent client like Deluge (available for windows, linux and macOS). You can use any other torrent client also. Doesn’t really matter.<br> 
Go to the following <a href="https://piratebox.cc/raspberry_pi:diy" target="_blank">website</a> and under the installation section, click on the appropriate download link (depending on your Raspberry Pi version), and your download should start automatically.<br>
Once you have downloaded the Piratebox image file, we are ready to move on and start configuring the Pifi.



## 2.0// Steps to configure and setup PiFi v 1.0

### 1// Burn piratebox image file onto SD Card. 
First you need to ‘burn’ your downloaded piratebox image file onto your SD card. Use a software like <a href="https://www.balena.io/etcher/" target="_blank">Etcher</a> to burn the file onto the SD card.

Etcher is available for Windows, MacOS and Linux.<br>
<br>
<img src="https://i.imgur.com/4RW3D7D.jpg">

### 2// Insert SD card, USB drive and power up the PiFi.
Once you have finished copying the piratebox image to your SD card, insert it into the Raspberry Pi. Insert your USB drive as well into the Pi. Now, connect the Pi to power. 

Note: Be sure that your USB drive is formatted to FAT32. Here is how you do it in <a href="https://turbofuture.com/computers/How-To-Format-a-USB-Drive" target="_blank">Windows</a> | <a href="https://www.garron.me/en/go2linux/format-usb-drive-fat32-file-system-ubuntu-linux.html" target="_blank">Linux</a> | <a href="https://www.admfactory.com/how-to-format-usb-flash-drive-to-fat32-in-mac-os/" target="_blank">MacOS</a>

### 3// Connect to the PiFi via command line.
Once you connect the PiFi to power, wait for 2-3 minutes till it fully boots up. Technically, you have already turned your Pi into a wifi hotspot.

However, before we start viewing/uploading videos on it, we need to make some basic settings. To do this we need to wirelessly connect to the PiFi, then access it via the command line and play around with some settings. So to do this:
- First, go to your wireless networks (the place where you usually go to connect to a wifi network). <br>
There you shall find a new network listed called ‘Pirate Box - Share Freely’. Go ahead and connect to that network, as you would with any other wifi network.
- Once connected, you now need to ‘SSH’ into the PiFi. (in other words, you need to access the files in the PiFi wirelessly). 

To do this:<br>

**On Windows**
- Install and open <a href="https://www.putty.org/" target="_blank">PuTTY</a>.
- A dialogbox such as this will pop up:<br>
<img src="https://i.imgur.com/udG1u6U.png"><br>
- In the field called 'hostname', type in `alarm@192.168.77.1`
- Then hit open.
- The PuTTY terminal window will show up, asking you for the password. The password is 'alarm'.

**On MacOS or Linux** 
- Open the application called ‘Terminal’. 
- Once the application is open, type the following into the command line: `ssh alarm@192.168.77.1`
- And hit enter.
- You will be prompted for a password. The password is ‘alarm’

That’s it. By now you should have successfully ‘SSH’ed into the PiFi.<br>
In your terminal, you should arrive on a screen something like this:<br>
<br>
<img src="https://i.imgur.com/BN8BjL1.png">

### 4// Change your password.
Once you have 'ssh'ed in, change your password (to something you'll remember!) by typing the command:
`passwd` 
You will be prompted to enter a new password and then confirm it.

### 5// Activate the USB stick (remember, FAT32 only)
By activating the USB stick, your uploaded videos, as well as some of your core html and css files will be stored on the USB drive. This way, it would be very convinient for you to plug out the USB stick, plug it into your PC, and add or delete files, even modify some of the html and css if you choose to do so.

To activate the USB, just type in the following command in the terminal:
`sudo /opt/piratebox/rpi/bin/usb_share.sh`

### 6// Activate the Kareha Image and Discussion Board (optional)
The original piratebox contains a forum like functionality for discussion and media sharing amongst the people connected to the piratebox network. In order to enable this funnctiionality, you have to activate the Kareha Image and Discussion Board. However, in PiFi v1.0, we havn't used any such functionality, so activating this is totally optional, in case you plan on enabling and using such a forum like functoinality in the future.

Use the following command:
`sudo /opt/piratebox/bin/board-autoconf.sh`

### 7// Activate the timesave functionality (optional)
What this does is, enables the PiFi to remember the actual time, even when the device is powered off. This is sort of like how your PC manages to fetch the actual time everytime you turn it on. Again, this functionality is used in the original piratebox project to display the actual time in certain cases. We havn't used this in PiFi v1.0, so activating this is also optional.

Use the following command:
`sudo /opt/piratebox/bin/timesave.sh /opt/piratebox/conf/piratebox.conf install
sudo systemctl enable timesave`

### 8// Activate the UPnP Media Server by copying over the config file:
The UPnP Media Server enables you to connect to 'stream' content from the PiFi, without having to actually download that content on your device. In the PiFi, we want to be able to stream video content off the webpage, so we very much want to enable this funcationlity.

Use the following command:<br>
`sudo cp /etc/minidlna.conf /etc/minidlna.conf.bkp`<br>
`sudo cp /opt/piratebox/src/linux.example.minidlna.conf /etc/minidlna.conf`

### 9// Start the UPnP Media Server with:
Now that you have activated the UPnP Media Server functioinality, you also need to 'start' it. 

For that, use the following command:
`sudo systemctl start minidlna`<br>
`sudo systemctl enable minidlna`

### 10// Change the SSID
The SSID is the name that is displayed for the PiFi in the list of wireless networks. Currently, you might have noticed that the name is 'Pirate Box: Share Freely'. In order to change this name, you need to edit some configuration files. 

To do so:
- Open up the following file by using the command:<br>
`sudo nano /opt/piratebox/conf/hostapd.conf`
- In this file you will find a line saying **ssid=Pirate Box: Share Freely**<br>
Change this line to whatever name you want. For example, we changed it to **ssid=PiFi**<br>
Once you have changed the name, save the changes by typing `ctrl + o` on Mac or `ctrl + o` on Windows and Linux. Then hit `enter`. Then close the file by typing `ctrl + x` on Mac or `ctrl + x` on Windows and Linux.

### 11// Change the base website URL
To access the video content on the PiFi, you need to open up the browser on your device and visit a website URL in order to access this content. Currently, this URL is set to **piratebox.lan**. We probably want to change that as well. 

To do so:
- Open up the following file by using the command:<br>
`sudo nano /opt/piratebox/conf/piratebox.conf`
- In this file you will find something like:<br>
**#HOST<br>
piratebox.lan**
- Change the **piratebox.lan** bit, to whatever you like. We changed it to **pifi.in**
- Save and exit the file as mentioned in the above step.
- Then open up another file using the following command:<br>
`sudo nano /opt/piratebox/www/index.html`
- In this file you will find some html code. Under the `<head>` tag, look for some text like **href="piratebox.lan/content/"**<br>
Change the **piratebox.lan** bit to whatever you named the **#HOST** in the previous step.
- Save and exit the file as mentioned in the above step.
 
### 12// Activate PHP
We are going to need PHP for the video upload functionality to work. 

To activate PHP:
- Open up the following file:<br>
`sudo nano /opt/piratebox/conf/lighttpd/lighttpd.conf` 
- Navigate to the last line in the file and remove the **#** in front of the line:<br>
`#include “/opt/piratebox/conf/lighttpd/fastcgi-php.conf”`
- Save and exit the file as mentioned earlier.
 
### 13// Copy base files from assets folder.
One last step before PiFi v1.0 is up and running. 

We need to copy some of the base php, html and css files which render our basic video playlist page, video upload page and some sample videos as well.

So:
- Switch off the power to your Raspberry Pi. 
- Remove the USB stick from it and insert it into your PC.
- Now, in the assets folder provided in this repository, you will find three folders: **board**, **content** and **Shared**
- Copy the contents inside each of these folders and paste them inside the equivalently named folders on the USB stick.
- Last thing to do— in the **content** folder on the pendrive, rename the **index.html** file to **inactive.html**.

### 14// Test your PiFi!
Power up your Pi once again. Give it 2-3 minutes, then go to your wireless networks list.

Here you will find a new network named **PiFi** (or whatever else you changed the SSID name to). Connect to it.

Then go to your browser, and type in the URL **pifi.in** (or whatever else you changed the URL to).

Thats it! You should have landed on a video playlist page with some sample Nat Geo and Planet Earth videos. :D

**To Upload Videos**: Simply go to the URL **pifi.in/board/** Here you will find a media upload functionality. Be sure to upload only **.mp4** videos, because that is the only file format we have activated as of now.

**To Delete Videos**: Simply plug out the USB Stick. Remember, always turn off the Pi before plugging out or plugging in the USB Stick. Anyway, connect the USB to your PC, and delete, copy, paste .mp4 video files into the **Shared** folder, as you would on any other USB stick. When you reconnect the USB stick to the Pi, the changes made will show on the webpage.

Thats that for now! Remember all this code is open source, and the base code also comes from the open source Pirate Box project. Hence, if you want, you ca easily modify the PiFi code and enable all sorts of functionalities. In order to get some more insight into that, I would suggest visiting the <a href="https://forum.piratebox.cc/list.php?7" target="_blank">Pirate Box Forum</a> and diving deeper into this. 

In the meantime, this repo will keep getting updated in the future as we make some more progress with the PiFi project.

Have fun!
