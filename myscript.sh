#!/bin/bash

echo "install docker & docker-compose"

sudo apt update
sudo apt install apt-transport-https ca-certificates curl software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
apt-cache policy docker-ce
sudo apt install docker.io  -y whatever

echo "get content from git"

git clone http://github.com/mojoym/simple_app

echo "build images and run containers"

sudo docker compose build
sudo docker compose up -d
