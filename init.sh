#!/bin/bash

php bin/console import:football:league
echo 'League ok'
sleep 60

php bin/console import:football:round
echo 'Round ok'
sleep 60

php bin/console import:football:team
echo 'Team ok'
sleep 60

php bin/console import:football:teamstat
echo 'Team stat ok'
sleep 60

php bin/console import:football:standing
echo 'Standing ok'
sleep 60

php bin/console import:football:player
echo 'Player ok'
sleep 60

php bin/console import:football:playerstat
echo 'Player stat ok'
sleep 60

php bin/console import:football:round:current
echo 'Current round ok'
sleep 60

php bin/console import:football:game
echo 'Game ok'
sleep 60

php bin/console import:football:gamestat
echo 'Game stat ok'
sleep 60

php bin/console import:football:lineup
echo 'Lineup ok'
sleep 60

php bin/console import:football:playerposition
echo 'Player position ok'
sleep 60

php bin/console import:football:event
echo 'Event ok'
sleep 60
