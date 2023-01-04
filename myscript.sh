#!/bin/bash

echo "install docker & docker-compose"

sudo apt update
sudo apt install apt-transport-https ca-certificates curl software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
apt-cache policy docker-ce
sudo apt install docker-ce
sudo apt install docker-compose-plugin

echo "create folder & get content from git"

mkdir /home/makar/Documents/docker_content
cd /home/makar/Documents/docker_content
git clone http://github.com/mojoym/simple_app
cd /home/makar/Documents/docker_content/simple_app

echo "build images and run containers"

sudo docker compose build
sudo docker compose up -d
