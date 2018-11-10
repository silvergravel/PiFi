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
2. (need to continue formatting from here.) **USB Stick - 16 GB - formatted to FAT32** like this <a href="https://www.amazon.in/SanDisk-Cruzer-Blade-SDCZ50-016G-135-Drive/dp/B002U1ZBG0/ref=sr_1_3?ie=UTF8&qid=1541834486&sr=8-3&keywords=sandisk+usb+16" target="_blank">one</a>.
3. **SD Card - 16 GB** like this<a href="https://www.amazon.in/Sandisk-MicroSD-UHS-A1-Adapter-SDSQUAR-016G-GO61A/dp/B07D2JS5WN/ref=sr_1_2?ie=UTF8&qid=1541834327&sr=8-2&keywords=sandisk+ultra+micro+sd+16+gb" target="_blank">one</a>.
4. **Power adapter for the Raspberry Pi.**
Alternately, you could also use a **power bank** to power up the PiFi. We have tested it using <a href="https://www.amazon.in/Mi-20000mAH-Li-Polymer-Power-White/dp/B077RV8CCZ/ref=sr_1_2?s=electronics&ie=UTF8&qid=1541315097&sr=1-2&keywords=mi+power+bank" target="_blank">this power bank</a>, and it works well.

### Software
1. **Piratebox image file.**<br>
This is essentially the core Piratebox ‘software’ that enables all the features and functionalities of the Piratebox. We need to ‘install’ this software as the base, after which we will be making some tweaks to the code to enable our simplistic video sharing and viewing functionality.<br>
For downloading this image file, you will need a torrent client like Deluge (available for windows, linux and macOS). You can use any other torrent client also. Doesn’t really matter.<br> 
Go to the following <a href="https://piratebox.cc/raspberry_pi:diy" target="_blank">website</a> and under the installation section, click on the appropriate download link (depending on your Raspberry Pi version), and your download should start automatically.<br>
Once you have downloaded the Piratebox image file, we are ready to move on and start configuring the Pifi.
