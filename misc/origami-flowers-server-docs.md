# Flower Games Server Documentation
## 2018-2019 ROllerozxa


## Introduction
This document is aimed to document the main structure of the now defunct flower games server to help reviving efforts and to preserve all information that has been collected.

This document won’t give you a complete alternate server directly, but it will show the things you need to do to get the app to start, along with info that the app sends to the server.

Here’s a brief list of all URLs that the flower app uses.

- **chat.jsp** - In-game chat menu entrypoint.
- **choseflower.jsp** - Flower Selection.
- **flowerschool.jsp** - Flower School entrypoint.
- **iphoneflower.jsp** - Flower menu entrypoint.
- **retrieveflower.jsp** - Retrieving flower data for the app.

All of these URLs are by default pointed at 00adam.com, which no longer exists. To be able to redirect all traffic from 00adam.com to your own server adress, you may do the following:

- Edit the android hosts file. (Root required?)
- Run a proxy that redirects all traffic from 00adam.com to your own server adress.
- Decompile the app using apktool, change all records of 00adam.com to your
server adress, and compile it again. (Good news, the app [5.18 at least] is not
obfuscated!)

## Choosing a flower (choseflower.jsp)
At the flower selection, pressing the button opens up the page **choseflower.jsp** , with the arguments being the player’s UID and game version.

To make the game open up a flower, make a form with a hidden argument by the name “a” and make the value “chose[flower]”. i.e. something like this to select your daisy. (Code taken from flower-web)

```html
<form action="">
<input type="hidden" name="a" value="chosedaisy"/>
<input type="image" src="img/DaisyIcon.png" width=86 alt="Daisy" />
</form>
```

It will then retrieve some data of the chosen flower from retrieveflower.jsp.

### Arguments

| Argument name | Example value   | Description                                                                   |
| ------------- | --------------- | ----------------------------------------------------------------------------- |
| uid           | 123456789101112 | Unique ID for the phone. Most of the time it is the IMEI number of the phone. |
| ver           | 518             | Version of the flower app.                                                    |

## Retrieving flowers (retrieveflower.jsp)
This is a binary file that the app requests to get information about the flower or to send certain information to the server. At the moment, not much is known about the format, but you can use a network dump to ake it work again.

1. In a hex editor (I used HxD to make this work), take the content sent by the server and copy that into retrieveflower.jsp (or your alternative to it). Save the file and close the hex editor.
2. In a text editor (Notepad++ preferred), set the line endings to Unix LF in the bottom right corner.
3. Insert: `<?php header(“Content-Type: application/octet-stream”) ?>` At the beginning of the file. This is something that is required to make it work.
4. Open up the app on a phone with a proxy to redirect all traffc of 00adam.com to your computer’s local IP adress. (use ipconfg on a command line to get it)

## Flower menu (iphoneflower.jsp)
This is essentially just a webpage.

### Arguments

| Argument name | Example value   | Description                                                                   |
| ------------- | --------------- | ----------------------------------------------------------------------------- |
| uid           | 123456789101112 | Unique ID for the phone. Most of the time it is the IMEI number of the phone. |
| gid           | Daisy           | Currently selected flower.                                                    |
| device        | Android         | What device the flower is on. (Originally just android/iphone)                |
| show          | 1               | Selected page.                                                                |
| menu          | false           | Originally for whether there is a menu bar on the top.                        |
| justshortcuts | true            | Toggle for the “Menu” button to just show the menu items.                     |
| android_id    | (blah)          | Some sort of an Android advertising ID.                                       |
| ver           | 518             | Version of the flower app.                                                    |

### Argument examples and variations
Arguments of “Items” button:

`?uid=(R)&gid=(R)&device=android&show=1&menu=false&android_id=(R)&ver=`

Arguments of “Menu” button:

`?uid=(R)&gid=(R)&device=android&show=1&menu=false&justshortcuts=true&android_id=(R)&ver=`

### Quirks
- show=14 redirects you to the in-game change nickname and flag menu.
- In the legacy flower apps, various page numbers are hardcoded in a dropdown list in the in-game chatterbox.

## Misc.
### HTTPD (Apache) rewriting from JSP to PHP
This is a snippet of code to rewrite requests suffixed with .jsp from the app to a .php file equivalent on the server.

Put it in the root of your website code in a file called .htaccess. ([Can't create a .htaccess file under Windows?](https://stackoverflow.com/questions/5004633/how-do-i-manually-create-a-file-with-a-dot-prefix-in-windows-for-example/38425947#38425947))

```
RewriteEngine On

RewriteRule ^chat.jsp$ chat.php
RewriteRule ^choseflower.jsp$ choseflower.php
RewriteRule ^flowerschool.jsp$ flowerschool.php
RewriteRule ^iphoneflower.jsp$ iphoneflower.php
RewriteRule ^retrieveflower.jsp$ retrieveflower.php
```
