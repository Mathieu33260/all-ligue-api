#!/bin/bash

php bin/console import:football:inplay:lineup
echo 'Lineup inplay ok'
sleep 60

php bin/console import:football:inplay:game
echo 'Game inplay ok'
sleep 60
