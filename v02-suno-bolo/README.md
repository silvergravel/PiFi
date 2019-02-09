Follow steps 1 to 12 in <a href="https://github.com/silvergravel/PiFi/tree/master/v02-smart_network" target="_blank">PiFi v01 - <strong>Suno Bolo</strong></a><br>

Then...
### 13// Increase maximum file upload limit in php.ini

### 14// Increase maximum file upload limit in lighttpd.conf

### 15// Copy base files from assets folder.
One last step before PiFi v2.0 is up and running. 

We need to copy some of the base php, html and css files which render our little suno-bolo application

So:
- Switch off the power to your Raspberry Pi. 
- Remove the USB stick from it and insert it into your PC.
- Now, in the assets folder provided in this folder, you will find two sub-folders: **content** and **Shared**
- Copy the contents inside each of these folders and paste them inside the equivalently named folders on the USB stick. When the system asks you if you want to replace an existing folder, say **yes**.
- Also, in the case of the **Shared** folder on the USB stick, be sure to delete all the existing files inside it, before you paste the files that have been provided in the assets folder.
- Last thing to do— go to the **content** folder on the USB stick, rename the **index.html** file to **inactive.html**, and then, go to the **board** folder on the USB stick, and rename the **index.html** file to **inactive.html**.
