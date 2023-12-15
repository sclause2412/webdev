# webdev
> Small bash script for setting up docker containers for web development.

This script is used to create automatically docker containers for a full stack web development environment. The environment runs total of 4 containers:
* Apache Server with PHP, Composer, NPM
* Mailhog server for testing mails
* MariaDB (MySQL) server
* PHPMyAdmin

All your project files are still on your local machine and are linked into the containers. Therefore, the containers are reset every time they are started and you always have a fresh environment. Additionally, you can use your favorite IDE directly on your machine without transferring files back and forth to the containers.

It is even possible to debug with XDebug directly. I recommend to use Visual Studio Code.

The containers are set up in a way that only one development can run at one time. So the current development can be easily reached by http://localhost without having to change the hosts files.

All settings and also the database for the development are stored in a .docker folder in your project directory.

# Installation

On your machine you need just docker and docker-compose. Read the docker manuals to see how this is done for your operating system.

Here is an example for Arch Linux:
```
sudo pacman -Sy docker docker-compose
sudo systemctl enable docker.socket
sudo systemctl start docker.socket
sudo usermod -aG docker <username>
sudo reboot
```

To use this script just copy it to any folder (if you want to use it globally you can copy it to /usr/local/bin or some similar folder) and make it executable with `chmod +x webdev`

# Usage

Create an empty folder for your project. Then run `/path/to/webdev` and it will explain all options by itself. If you installed it globally you can just use `webdev`.

It is also possible to use it on an existing project folder. You will get a warning message to prevent data loss.

# License

This script is licensed to GPLv3.

