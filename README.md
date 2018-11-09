# READ ME: PiFi

The PiFi has been built on top of the open source code provided by The Piratebox Project— A self contained mobile communication and file sharing system. Users can wirelessly connect to the piratebox and share or access images, videos, audio, documents and other digital content.

You can find more details about the original Piratebox project <a href="https://piratebox.cc/" target="_blank">here</a>.

The PiFi is an ongoing project that uses the Piratebox code as it’s starting point. The goal with this project is to design a device that addresses the information sharing needs of the people in rural India, where internet generally tends to be poor, or sometimes non-existent.

As we add newer features and functionalities to PiFi, we shall keep updating this readme file to appropriately guide any reader to be able to source the required hardware, software, and replicate the PiFi to whatever level of sophistication it stands at, at our end.


## PiFi v 1.0

Currently the PiFi has been configured as a self-standing wifi hotspot, which is NOT connected to the internet. Users can connect to the PiFi, and through the browser they can access the PiFi webpage. Here, they can share or view video content.

## Who is this Read Me for?

This readme has been written with the intention that even someone with little to no knowledge of the UNIX command line interface (and code in general), can follow, and successfully configure PiFi v 1.0. If this is still not comprehensive, or if at all, too detailed, then please let us know! Any and all kinds of feedback are welcome.




1.0// Components Needed

Hardware
Raspberry Pi 3 or higher.
You could use an older version of the Raspberry Pi as well, but for that, you will need an additional component: A USB Wifi Adapter like this one. 
You’ll have to do this since the Pi versions before 3 do not have inbuilt wifi card.
USB - 16 GB - formatted to FAT32
SD Card - 8 GB
Power adapter for the Raspberry Pi.
Alternately, you could also use a power bank to power up the PiFi. We have tested it using this power bank, and it works well.

Software
Piratebox image file.
This is essentially the core Piratebox ‘software’ that enables all the features and functionalities of the Piratebox. We need to ‘install’ this software as the base, after which we will be making some tweaks to the code to enable our simplistic video sharing and viewing functionality.
For downloading this image file, you will need a torrent client like Deluge (available for windows, linux and macOS). You can use any other torrent client also. Doesn’t really matter. 
Use the following link to download the Piratebox image file:
For Raspberry Pi 1 A, B, B+, Zero & Zero-W : 
For Rapsberry Pi 2 & 3, Rapsbperry Pi 3+: 
Once you have downloaded the Piratebox image file, we are ready to move on and start configuring the Pifi.
