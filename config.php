<?php
$conf->debug = true; # set true during development and use in your code (for instance check if true to send additional message)

# ---- Webapp location
$conf->server_name = '192.168.1.16';   # server address and port
$conf->protocol = 'http';           # http or https
$conf->app_root = '/Strony/Projekt/public';   # project subfolder in domain (relative to main domain)

# ---- Database config - values required by Medoo
$conf->db_type = 'mysql';
$conf->db_server = '192.168.1.16';
$conf->db_name = 'Projekt';
$conf->db_user = 'Projekt';
$conf->db_pass = '123';
$conf->db_charset = 'utf8';

# ---- Database config - optional values
$conf->db_port = '3306';
#$conf->db_prefix = '';
$conf->db_option = [ PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];